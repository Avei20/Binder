<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\detailAlamat;
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

    public function index(Request $req)
    {
        $currentuser = User::where('nim', '=', $req->nim)->first();
        $userdetail = UserDetail::where('nim', '=', $req->nim)->with('alamat', 'contact')->first();
        $usermatcheds = MatchedList::where('nimUser', '=', $req->nim)->get();
        $userhobis = Hobi::where('nim', '=', $req->nim)->get();
        $usercontact = contact::where('nim', '=', $req->nim)->first();
        $useralamat = detailAlamat::where('nim', '=', $req->nim)->first();
        $nimQuery = $req->nim; // Get Requested NIM, which will be used to compare against the Authenticated user's NIM
        $authuser = UserDetail::find(Auth::id());
        return view('pages.profileInfo', compact('currentuser', 'userdetail', 'usermatcheds', 'userhobis', 'useralamat', 'nimQuery', 'usercontact', 'authuser'));
    }
}
