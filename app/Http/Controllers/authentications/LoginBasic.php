<?php

namespace App\Http\Controllers\authentications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function proses_login(Request $request){
    // dd($request);
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8'
    ]);

    $data = [
      'email' => $request->email,
      'password' => $request->password
    ];

    // dd(Auth::attempt($data));

    if(Auth::attempt($data)){
      return redirect()->route('dashboard');
    }else{
      return redirect()->route('login')->with('failed', 'Data tidak valid atau belum terdaftar');
    }
  }

  public function logout(){
    // dd('logout');
    Auth::logout();
    return redirect()->route('login')->with('success', "Kamu telah logout, login untuk masuk lagi");
  }
}
