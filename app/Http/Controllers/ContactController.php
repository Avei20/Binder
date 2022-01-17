<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function update(Request $req) {
        $req->validate([
            'line' => 'string',
            'instagram' => 'string',
            'whatsapp' => 'string',
            'facebook' => 'string',
            'twitter' => 'string',
            'snapchat' => 'string',
        ]);

        $updateContact = contact::where('nim', '=', Auth::id())->first();
        $updateContact->line = $req->line;
        $updateContact->instagram = $req->instagram;
        $updateContact->whatsapp = $req->whatsapp;
        $updateContact->facebook = $req->facebook;
        $updateContact->twitter = $req->twitter;
        $updateContact->snapchat = $req->snapchat;

        $updateContact->save();

        return redirect()->back()->with('contactSuccess', 'Contact berhasil di update');
    }
}
