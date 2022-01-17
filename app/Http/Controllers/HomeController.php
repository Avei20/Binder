<?php

namespace App\Http\Controllers;

use App\Models\MatchedList;
use App\Models\User;
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
        $requestedmatch = MatchedList::where('nimUser', '=', Auth::id())->get();
        return view('pages.home', compact('users', 'currentuser', 'requestedmatch'));
    }
}
