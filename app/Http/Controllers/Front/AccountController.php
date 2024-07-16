<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('home.account', compact('user', 'orders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'required|string|max:13',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|min:8|required_with:password',
        ]);

        // Siapkan data untuk diperbarui
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password);
        }

        // Perbarui data pengguna
        User::find($user->id)->update($userData);

        return redirect()->route('account')->with('status', 'Profile updated successfully.');
    }
}
