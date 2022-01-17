<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $req){
        $data = $req->validate([
            'nim' => 'required|size:10|numeric',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' =>  'required|min:8',
            'confimPassword' => 'required|same:password'
        ]);

        $data['password'] = Hash::Create($req->password);

        $user = User::create($data);

        return redirect()->route('login');
    }
}
