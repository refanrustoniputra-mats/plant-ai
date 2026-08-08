@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Dashboard Admin
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-6 border border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-gray-500 font-medium">
                    Total Tanaman
                </h2>
                <p class="text-4xl font-bold text-green-700 mt-2">
                    {{ $total ?? 0 }}
                </p>
            </div>
            <div class="bg-emerald-100 text-emerald-600 p-4 rounded-xl text-2xl">
                🌱
            </div>
        </div>
    </div>
</div>
@endsection