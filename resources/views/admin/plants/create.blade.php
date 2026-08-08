@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Tanaman Baru</h2>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('plants.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="kode">Kode Tanaman</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode') }}" placeholder="Contoh: PLT-001" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nama">Nama Tanaman</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Contoh: Lidah Buaya" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nama_latin">Nama Latin</label>
            <input type="text" name="nama_latin" id="nama_latin" value="{{ old('nama_latin') }}" placeholder="Contoh: Euphorbia tirucalli" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="asal">Asal Tanaman</label>
            <input type="text" name="asal" id="asal" value="{{ old('asal') }}" placeholder="Contoh: Daratan Afrika" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="penyiraman">Penyiraman</label>
            <input type="text" name="penyiraman" id="penyiraman" value="{{ old('penyiraman') }}" placeholder="Contoh: 1-2 kali seminggu" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="cahaya">Cahaya</label>
            <input type="text" name="cahaya" id="cahaya" value="{{ old('cahaya') }}" placeholder="Contoh: Cahaya matahari penuh" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500">
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="suhu">Suhu</label>
                <input type="text" name="suhu" id="suhu" value="{{ old('suhu') }}" placeholder="Contoh: 20-35°C" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="kelembapan">Kelembapan</label>
                <input type="text" name="kelembapan" id="kelembapan" value="{{ old('kelembapan') }}" placeholder="Contoh: 40-60%" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Tuliskan deskripsi tanaman..." 
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-green-500" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('plants.index') }}" class="text-gray-500 hover:text-gray-700 underline">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection