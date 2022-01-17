<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\MatchedList;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $currentuser = User::where('nim', '=', Auth::id())->first();
        $userdetail = UserDetail::where('nim', '=', Auth::id())->with('alamat', 'contact')->first();
        $usermatcheds = MatchedList::where('nimUser', '=', Auth::id())->get();
        $userhobis = Hobi::where('nim', '=', Auth::id())->get();
        dd($userdetail);

        $curr = 0;
        // dd($users[0]['detail']);
        return view('pages.home', compact('users', 'currentuser', 'curr'));
    }
}
