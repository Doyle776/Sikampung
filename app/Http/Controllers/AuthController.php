<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
{
    return view('pages.auth.login'); // Sesuaikan dengan struktur folder
}


public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        $user = Auth::user(); // Panggil fungsi, bukan properti
        
        if ($user->status == 'submitted') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun Anda masih menunggu persetujuan.'
            ]);
        } elseif ($user->status == 'rejected') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun Anda telah ditolak.'
            ]);
        }

        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'Terjadi kesalahan, periksa kembali email atau password Anda.',
    ])->onlyInput('email');
}


public function registerView(){
    return view('pages.auth.register');
}


public function register(Request $request){
    $validated = $request->validate([
        'name' => ['required'],
        'email' => ['required','email'],
        'password' => ['required'],
    ]);

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->role_id = 2; //Penduduk
    $user->saveOrFail();

    return redirect('/')->with('succes','Pendaftaran Berhasil, menunggu persetujuan admin');
}






    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
}
