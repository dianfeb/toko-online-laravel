<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $data = Auth::guard('admin')->user();
        return view('admin.auth.editProfil', compact('data'));
        
    }

    public function update(request $request) {
       // Dapatkan admin yang sedang login
       $admin = Auth::guard('admin')->user();

       // Log ID admin untuk debugging
       Log::info('Updating profile for admin ID: ' . $admin->id);

       // Validasi data yang diminta
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
           'password' => 'nullable|string|min:8|confirmed',
           'password_confirmation' => 'nullable|min:8|required_with:password'
       ]);

       // Siapkan data untuk diperbarui
       $adminData = [
           'name' => $request->name,
           'email' => $request->email,
       ];
       
       if ($request->filled('password')) {
           $adminData['password'] = bcrypt($request->password);
       }

       // Perbarui data admin menggunakan metode find dan update
       Admin::find($admin->id)->update($adminData);

       // Log update untuk debugging
       Log::info('Admin profile updated for user ID: ' . $admin->id);

       // Redirect ke rute yang diinginkan dengan pesan sukses
       return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
   }
}
