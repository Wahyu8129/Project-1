<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::all();
        return view('resep', ['resep' => $resep]);
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function simpan(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'gambar' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_resep' => 'required',
            'deskripsi' => 'required',
            'bahan_bahan' => 'required',
            'bumbu_halus' => 'required',
            'cara_masak' => 'required',
        ]);

        // Simpan gambar ke dalam folder public/images
        $originalFileName = $request->file('gambar')->getClientOriginalName();
        $filePath = $request->file('gambar')->move(public_path('images'), $originalFileName);

        // Simpan data ke dalam database
        Resep::create([
            'gambar' => 'images/' . $originalFileName,
            'nama_resep' => $request->nama_resep,
            'deskripsi' => $request->deskripsi,
            'bahan_bahan' => $request->bahan_bahan,
            'bumbu_halus' => $request->bumbu_halus,
            'cara_masak' => $request->cara_masak,
        ]);

        // Redirect ke halaman resep setelah data disimpan
        return redirect('/resep')->with('success', 'Resep berhasil disimpan!');
    }

    public function edit($id)
    {
        $resep  = Resep::find($id);
        return view('edit', ['resep' => $resep]);
    }

    public function update($id, Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_resep' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan_bahan' => 'required|string',
            'bumbu_halus' => 'required|string',
            'cara_masak' => 'required|string',
        ]);

        $resep = Resep::findOrFail($id);
        $resep->nama_resep = $request->nama_resep;
        $resep->deskripsi = $request->deskripsi;
        $resep->bahan_bahan = $request->bahan_bahan;
        $resep->bumbu_halus = $request->bumbu_halus;
        $resep->cara_masak = $request->cara_masak;

        // Handle upload gambar jika ada yang baru
        if ($request->hasFile('gambar')) {
            if ($resep->gambar) {
                // Hapus gambar lama
                $oldImagePath = public_path($resep->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru
            $originalFileName = $request->file('gambar')->getClientOriginalName();
            $filePath = $request->file('gambar')->move(public_path('images'), $originalFileName);
            $resep->gambar = 'images/' . $originalFileName;
        }

        // Simpan perubahan
        $resep->save();
        return redirect('/resep')->with('success', 'Resep berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $resep = Resep::findOrFail($id);

        // Hapus gambar terkait dari penyimpanan jika ada
        if ($resep->gambar) {
            $imagePath = public_path($resep->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus entri resep dari basis data
        $resep->delete();
        return redirect('/resep')->with('success', 'Resep berhasil dihapus!');
    }
}
