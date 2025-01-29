<?php

namespace App\Http\Controllers;

use App\Models\resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class resepcontroller extends Controller
{
    public function index()
    {
        $resep = resep::all(); // Inisialisasi variabel $layanan
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
            'bahan_bahan'=> 'required',
            'bumbu_halus'=> 'required',
            'cara_masak'=> 'required',
        ]);
    
        // Simpan gambar ke dalam folder public/images
        $imagePath = $request->file('gambar')->store('images', 'public');
    
        // Simpan data ke dalam database
        resep::create([
            'gambar' => $imagePath, 
            'nama_resep' => $request->nama_resep, // Mengambil input nama resep
            'deskripsi' => $request->deskripsi, // Mengambil input deskripsi
            'bahan_bahan' => $request->bahan_bahan, // Mengambil input bahan utama
            'bumbu_halus' => $request->bumbu_halus, // Mengambil input bumbu halus
            'cara_masak' => $request->cara_masak, // Mengambil input cara memasak
        ]);
    
        // Redirect ke halaman resep setelah data disimpan
        return redirect('/resep')->with('success', 'Resep berhasil disimpan!');
    }
    
    public function edit($id)
    {
        $resep  = resep::find($id);
        return view('edit', ['resep' => $resep]);
    }
    public function update($id, Request $request)
    {
        // Validate the input
        $this->validate($request, [
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048', // Optional image with validation for format & size
            'nama_resep' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan_bahan' => 'required|string',
            'bumbu_halus' => 'required|string',
            'cara_masak' => 'required|string',
        ]);
    
        // Find recipe data by ID
        $resep = Resep::findOrFail($id);
    
        // Update recipe data
        $resep->nama_resep = $request->nama_resep;
        $resep->deskripsi = $request->deskripsi;  // Fixed typo from dekripsi to deskripsi
        $resep->bahan_bahan = $request->bahan_bahan;
        $resep->bumbu_halus = $request->bumbu_halus;
        $resep->cara_masak = $request->cara_masak;
    
        // Handle image upload if a new one is provided
        if ($request->hasFile('gambar')) {
            // Delete the old image if it exists
            if ($resep->gambar) {
                Storage::delete('public/' . $resep->gambar); // Delete the old image
            }
    
            // Store the new image in the public folder
            $imagePath = $request->file('gambar')->store('images', 'public');
            $resep->gambar = $imagePath; // Save the new image path
        }
    
        // Save the updated recipe
        $resep->save();
    
        // Redirect to the recipe list page with a success message
        return redirect('/resep')->with('success', 'Resep berhasil diperbarui!');
    }    
        public function hapus($id)
    {
        $resep = resep::find($id);

        // Hapus gambar terkait dari penyimpanan jika ada
        if ($resep->image) {
            Storage::delete('public/' . $resep->image);
        }
        // Hapus entri layanan dari basis data
        $resep->delete();
    
        return redirect('/resep');
    }
}
