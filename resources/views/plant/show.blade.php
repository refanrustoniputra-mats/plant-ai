@extends('layouts.plant')

@section('content')
<div class="card" style="padding: 20px; background: #ffffff; border-radius: 16px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
    
    <!-- Judul Tanaman -->
    <div style="text-align: center; margin-bottom: 30px; margin-top: 10px;">
        <h1 style="font-size: 32px; color: #111827; margin-bottom: 5px; font-weight: 800;">
            {{ $plant->nama ?? 'Nama Tanaman' }}
        </h1>
        <p style="font-size: 18px; color: #059669; font-style: italic; margin: 0;">
            {{ $plant->nama_latin ?? 'Nama Latin' }}
        </p>
    </div>

    <!-- Label Spesifikasi -->
    <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 8px; color: #94a3b8; font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: 0.5px;">
        <span style="font-size: 16px;">🌱</span> SPESIFIKASI TANAMAN
    </div>

    <!-- Grid Spesifikasi yang Rapih -->
    <div class="space-y-4" style="display: flex; flex-direction: column; gap: 12px; text-align: left; margin-bottom: 30px;">
        
        <!-- Asal Tanaman -->
        <div style="background: #f0fdf4; padding: 16px; border-radius: 16px; display: flex; align-items: flex-start; gap: 14px;">
            <span style="font-size: 22px; line-height: 1;">📍</span>
            <div>
                <div style="font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 4px;">Asal</div>
                <div style="font-size: 16px; color: #0f172a; font-weight: 600; line-height: 1.4;">
                    {{ $plant->asal ?? '-' }}
                </div>
            </div>
        </div>

        <!-- Penyiraman -->
        <div style="background: #f0fdf4; padding: 16px; border-radius: 16px; display: flex; align-items: flex-start; gap: 14px;">
            <span style="font-size: 22px; line-height: 1;">💧</span>
            <div>
                <div style="font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 4px;">Penyiraman</div>
                <div style="font-size: 16px; color: #0f172a; font-weight: 600; line-height: 1.4;">
                    {{ $plant->penyiraman ?? '-' }}
                </div>
            </div>
        </div>

        <!-- Cahaya -->
        <div style="background: #f0fdf4; padding: 16px; border-radius: 16px; display: flex; align-items: flex-start; gap: 14px;">
            <span style="font-size: 22px; line-height: 1;">☀️</span>
            <div>
                <div style="font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 4px;">Cahaya</div>
                <div style="font-size: 16px; color: #0f172a; font-weight: 600; line-height: 1.4;">
                    {{ $plant->cahaya ?? '-' }}
                </div>
            </div>
        </div>

        <!-- Suhu & Kelembapan (Berjejer ke Samping) -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div style="background: #f0fdf4; padding: 16px; border-radius: 16px; text-align: center;">
                <div style="font-size: 20px; margin-bottom: 6px;">🌡️</div>
                <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">Suhu Ideal</div>
                <div style="font-size: 15px; color: #0f172a; font-weight: 700;">
                    {{ $plant->suhu ?? '-' }}
                </div>
            </div>

            <div style="background: #f0fdf4; padding: 16px; border-radius: 16px; text-align: center;">
                <div style="font-size: 20px; margin-bottom: 6px;">💦</div>
                <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">Kelembapan</div>
                <div style="font-size: 15px; color: #0f172a; font-weight: 700;">
                    {{ $plant->kelembapan ?? '-' }}
                </div>
            </div>
        </div>
    </div>

    <!-- Penjelasan AI -->
    <div style="background: #d1fae5; padding: 20px; border-radius: 16px; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
            <span style="font-size: 24px;">🤖</span>
            <h3 style="font-size: 18px; color: #065f46; margin: 0; font-weight: 800;">Penjelasan AI</h3>
        </div>
        
    <div class="text-gray-700 leading-relaxed text-sm sm:text-base space-y-3">
        {!! nl2br(e($aiDescription)) !!}
    </div>
    
    <!-- Tombol Kembali -->
    <div style="margin-top: 30px;">
        <a href="{{ url('/') }}" style="display: block; text-align: center; width: 100%; box-sizing: border-box; padding: 16px; background: #f1f5f9; color: #475569; text-decoration: none; border-radius: 14px; font-weight: bold; font-size: 16px;">
            ⬅️ Kembali ke Beranda
        </a>
    </div>

</div>
@endsection