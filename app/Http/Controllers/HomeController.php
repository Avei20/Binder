<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('nim', '!=', Auth::id())->with('detail')->get();
        $currentuser = User::where('nim', '=', Auth::id())->first();
        $curr = 0;
        return view('pages.home', compact('users', 'currentuser', 'curr'));
    }
}
