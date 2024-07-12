<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Admin::whereId(auth('admin')->user()->id)->first();
        if (!$data) {
            // Handle the case where no admin is found, e.g., redirect or show an error
            return redirect()->route('admin.login')->withErrors('Admin not found');
        }
        return view('admin.templates', compact('data'));
        
    }

    public function edit() {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
        
    }

    public function update(request $request, string $id) {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }
        Admin::find($id)->update($admin);

        return redirect()->route('admin.profile.edit')->with('status', 'Profile updated successfully.');

    }
}
