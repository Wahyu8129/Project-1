<?php

namespace App\Http\Controllers;

use App\Models\resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index() {
        Auth::logout();
        $resep = resep::all(); // Inisialisasi variabel $layanan
        return view('user', ['resep' => $resep]);
    }
}
