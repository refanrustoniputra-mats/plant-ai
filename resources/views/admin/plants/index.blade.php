@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    
    <!-- Bagian Header & Tombol Tambah -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Kelola Tanaman</h1>
        <a href="{{ route('plants.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-md shadow-emerald-500/30 transition-all duration-300 flex items-center gap-2">
            <span>+</span> Tambah Tanaman
        </a>
    </div>

    <!-- Alert Notifikasi Sukses (jika ada) -->
    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded-r-xl shadow-sm" role="alert">
            <span class="font-medium">Berhasil!</span> {{ session('success') }}
        </div>
    @endif

    <!-- Desain Tabel -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wider font-bold">
                        <th class="py-4 px-6 w-24">Kode</th>
                        <th class="py-4 px-6">Nama Tanaman</th>
                        <th class="py-4 px-6">Deskripsi</th>
                        <th class="py-4 px-6 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-gray-700">
                    @forelse($plants as $plant)
                        <tr class="hover:bg-emerald-50/40 transition-colors duration-200 group">
                            <td class="py-4 px-6 font-semibold text-gray-900">{{ $plant->kode }}</td>
                            <td class="py-4 px-6 font-bold text-emerald-700">{{ $plant->nama }}</td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                <!-- Membatasi karakter deskripsi agar tabel tetap rapi -->
                                {{ \Illuminate\Support\Str::limit($plant->deskripsi, 70, '...') }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-4 opacity-80 group-hover:opacity-100 transition-opacity">
                                    
                                    <!-- Tombol Lihat QR -->
                                    <a href="{{ url('/plant/' . $plant->kode . '/generate-qr') }}" target="_blank" title="Cetak QR Code" class="text-emerald-600 hover:text-emerald-800 font-semibold text-sm transition-colors flex items-center gap-1">
                                        🖨️ QR
                                    </a>
                                    
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('plants.edit', $plant->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition-colors">
                                        Edit
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $plant->nama }} dari daftar?');" class="inline-block m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-400">
                                <span class="text-4xl mb-3 block">🌿</span>
                                Belum ada data tanaman. Yuk, tambah sekarang!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection