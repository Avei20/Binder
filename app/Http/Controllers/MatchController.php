<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hobi;
use App\Models\MatchedList;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function create(Request $req) {
        $req->validate([
            'nimMatched' => 'required|min:10|max:10|exists:users,nim',
        ]);

        $newMatch = new MatchedList();
        $newMatch->nimUser = Auth::user()->nim;
        $newMatch->nimMatched = $req->nimMatched;

        $newMatch->save();

        return redirect()->back()->with('matchSuccess', 'Match berhasil di input');
    }

    public function accept(Request $req) {
        $req->validate([
            'id' => 'required|exists:matched_list,id',
            'nimUser' => 'required|min:10|max:10|exists:users,nim',
        ]);

        $user = UserDetail::find(Auth::id());
        $matcheduser = UserDetail::find($req->nimUser);

        $user->matched = 'True';
        $matcheduser->matched = 'True';

        $user->matchedNim = $req->nimUser;
        $matcheduser->matchedNim = Auth::id();

        $user->save();
        $matcheduser->save();

        $match = MatchedList::find($req->id);
        $match->delete();

        return redirect()->back()->with('matchAccept', 'Match berhasil di accept');
    }

    public function delete($id){
        $hobi = Hobi::find($id);
        $hobi->destroy($id);
        return redirect()->back()->with('matchSuccess', 'Match telah berhasil dihapus');
    }

}
