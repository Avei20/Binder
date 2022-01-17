<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\detailAlamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class detailAlamatController extends Controller
{
    public function update(Request $req) {
        $req->validate([
            'namaJalan' => 'string',
            'kecamatan' => 'string',
            'kota' => 'string',
            'provinsi' => 'string',
        ]);

        $updateAlamat = detailAlamat::where('nim', '=', Auth::id())->first();
        $updateAlamat->namaJalan = $req->namaJalan;
        $updateAlamat->kecamatan = $req->kecamatan;
        $updateAlamat->kota = $req->kota;
        $updateAlamat->provinsi = $req->provinsi;

        $updateAlamat->save();

        return redirect()->back()->with('alamatSuccess', 'Alamat berhasil di update');
    }
}
