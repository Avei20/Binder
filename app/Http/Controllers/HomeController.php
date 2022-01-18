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
        $pref_gender = Auth::user()->detail->gender;
        if ($pref_gender == 'M') {
            $pref_gender = 'F';
        }
        else if ($pref_gender == 'F') {
            $pref_gender = 'M';
        }

        $users = User::where('nim', '!=', Auth::id())->with('detail')->get();

        $len = count($users);
        for ($i=0; $i<$len; $i++) {
            if ($users[$i]['detail']['gender'] != $pref_gender) {
                unset($users[$i]);
            }
        }

        $currentuser = User::where('nim', '=', Auth::id())->first();
        $requestedmatch = MatchedList::where('nimUser', '=', Auth::id())->get();
        return view('pages.home', compact('users', 'currentuser', 'requestedmatch'));
    }
}
