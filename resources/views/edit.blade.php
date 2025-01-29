<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-700">Edit Resep</h1>
        </div>
        <div class="mb-6 text-center">
            <a href="/resep" class="text-blue-500 hover:underline">Kembali</a>
        </div>
        <form method="post" action="/modul/update/{{ $resep->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Nama Resep -->
            <div class="mb-4">
                <label class="block text-gray-700">Nama Resep</label>
                <input type="text" name="nama_resep" placeholder="Nama Resep" value="{{ $resep->nama_resep }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if($errors->has('nama_resep'))
                    <div class="text-red-500 text-sm mt-1">
                        {{$errors->first('nama_resep')}}
                    </div>
                @endif
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                <img src="{{ asset('storage/' . $resep->gambar) }}" alt="Gambar saat ini" class="mt-2 w-32 h-32 object-cover rounded">
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" placeholder="Deskripsi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $resep->deskripsi }}</textarea>
                @if($errors->has('deskripsi'))
                    <div class="text-red-500 text-sm mt-1">
                        {{$errors->first('deskripsi')}}
                    </div>
                @endif
            </div>

            <!-- Bahan-Bahan -->
            <div class="mb-4">
                <label class="block text-gray-700">Bahan-Bahan</label>
                <textarea name="bahan_bahan" placeholder="Bahan-Bahan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $resep->bahan_bahan }}</textarea>
                @if($errors->has('bahan_bahan'))
                    <div class="text-red-500 text-sm mt-1">
                        {{$errors->first('bahan_bahan')}}
                    </div>
                @endif
            </div>

            <!-- Bumbu Halus -->
            <div class="mb-4">
                <label class="block text-gray-700">Bumbu Halus</label>
                <textarea name="bumbu_halus" placeholder="Bumbu Halus" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $resep->bumbu_halus }}</textarea>
                @if($errors->has('bumbu_halus'))
                    <div class="text-red-500 text-sm mt-1">
                        {{$errors->first('bumbu_halus')}}
                    </div>
                @endif
            </div>

            <!-- Cara Masak -->
            <div class="mb-4">
                <label class="block text-gray-700">Cara Masak</label>
                <textarea name="cara_masak" placeholder="Cara Masak" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $resep->cara_masak }}</textarea>
                @if($errors->has('cara_masak'))
                    <div class="text-red-500 text-sm mt-1">
                        {{$errors->first('cara_masak')}}
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" value="Edit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>
        </form>
    </div>
</body>
</html>
