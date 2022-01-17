<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req) {
        $data = $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $isAuth = Auth::attempt($data);

        if ($isAuth) return redirect('/');
        else redirect()->route('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function changePassword() {

    }
}
