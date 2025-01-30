<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function home() {
        if (auth()->user()->role_id === 1) {
            return redirect('/superadmin');
        } else {
            return redirect('/pegawai');
        }
}
}