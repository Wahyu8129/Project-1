<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah layanan</title>
    <!-- Tambahkan link CDN untuk Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
            <div class="text-center py-4 bg-gray-200">
                <h2 class="text-xl font-bold">Tambah detail resep</h2>
            </div>
            <div class="p-6">
                <a href="/detail" class="block text-center text-blue-500 hover:text-blue-700 mb-4">Kembali</a>

                <form method="post" action="/detail/simpan" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
            <label for="resep_id" class="form-label">Pilih Resep</label>
            <select name="resep_id" id="resep_id" class="form-control">
                <option value="">-- Pilih Resep --</option>
                @foreach ($resep as $resep)
                    <option value="{{ $resep->id }}">{{ $resep->nama_resep }}</option>
                @endforeach
            </select>
            @error('resep_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    <div class="mb-3">
    <label for="bahan_bahan" class="form-label">bahan utama</label>
    <textarea name="bahan_bahan" id="bahan_bahan" class="form-control" placeholder="..."></textarea>
    @error('bahan_bahan')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
        <label for="bumbu_halus" class="form-label">bumbu</label>
        <textarea name="bumbu_halus" id="bumbu_halus" class="form-control" placeholder="..."></textarea>
        @error('bumbu_halus')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cara_masak" class="form-label">cara masak</label>
        <textarea name="cara_masak" id="cara_masak" class="form-control" placeholder="..."></textarea>
        @error('cara_masak')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
            </div>
        </div>
    </div>
     <!-- Tambahkan link CDN untuk Bootstrap JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>