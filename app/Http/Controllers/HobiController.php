<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hobi;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HobiController extends Controller
{
    public function create(Request $req) {
        $nim = Auth::user()->nim;

        $data = $req->Validate([
            'namaHobi' => 'required|string|min:5'
        ]);

        $data['nim'] = $nim;

        Hobi::create($data);

        return redirect()->back()->with('hobiSuccess', 'Hobi berhasil di input');
    }

    public function delete($id){
        $hobi = Hobi::find($id);
        $hobi->destroy($id);
        return redirect()->back()->with('hobiSuccess', 'Hobi telah berhasil dihapus');
    }

}
