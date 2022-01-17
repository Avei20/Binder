<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hobi;
use App\Models\MatchedList;
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

    public function delete($id){
        $hobi = Hobi::find($id);
        $hobi->destroy($id);
        return redirect()->back()->with('matchSuccess', 'Match telah berhasil dihapus');
    }

}
