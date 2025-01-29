<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan</title>
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
            <div class="text-center py-4 bg-gray-200">
                <h2 class="text-xl font-bold">Tambah Modul</h2>
            </div>
            <div class="p-6">
                <a href="/resep" class="block text-center text-blue-500 hover:text-blue-700 mb-4">Kembali</a>

                <form method="post" action="/resep/simpan" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Resep -->
                    <div class="mb-4">
                        <label for="nama_resep" class="block text-gray-700">Nama Resep</label>
                        <input type="text" name="nama_resep" id="nama_resep" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="...">
                        @error('nama_resep')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4">
                        <label for="gambar" class="block text-gray-700">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                        @error('gambar')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="..."></textarea>
                        @error('deskripsi')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bahan Bahan -->
                    <div class="mb-4">
                        <label for="bahan_bahan" class="block text-gray-700">Bahan Utama</label>
                        <textarea name="bahan_bahan" id="bahan_bahan" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="..."></textarea>
                        @error('bahan_bahan')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bumbu Halus -->
                    <div class="mb-4">
                        <label for="bumbu_halus" class="block text-gray-700">Bumbu Halus</label>
                        <textarea name="bumbu_halus" id="bumbu_halus" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="..."></textarea>
                        @error('bumbu_halus')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Cara Masak -->
                    <div class="mb-4">
                        <label for="cara_masak" class="block text-gray-700">Cara Masak</label>
                        <textarea name="cara_masak" id="cara_masak" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="..."></textarea>
                        @error('cara_masak')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
