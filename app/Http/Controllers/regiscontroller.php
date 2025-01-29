<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class regiscontroller extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.regis'); 
    }
    public function register(Request $request)
{
    // Validasi input
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|max:225|confirmed',
    ]);

    // Simpan pengguna ke database
   $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password),
    'role_id' => 1, // Pastikan ada nilai role_id
]);

    // if(Auth::attempt(['email' => $user->email, 'password'=>$request->password])){
    //     $request->session()->regenerate();

        
    // };
    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
}
}
