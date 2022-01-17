<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hobi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HobiController extends Controller
{
    public function create(Request $req) {
        $req->validate([
            'namaHobi' => 'required|string|min:5'
        ]);

        $newHobi = new Hobi();
        $newHobi->nim = Auth::user()->nim;;
        $newHobi->namaHobi = $req->namaHobi;

        $newHobi->save();

        return redirect()->back()->with('hobiSuccess', 'Hobi berhasil di input');
    }

    public function delete($id){
        $hobi = Hobi::find($id);
        $hobi->destroy($id);
        return redirect()->back()->with('hobiSuccess', 'Hobi telah berhasil dihapus');
    }

}
