<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    public function explainPlant($plant)
    {
        $prompt = "
    Anda adalah seorang ahli tanaman.

    Data tanaman:
    Nama: {$plant->nama}
    Nama Latin: {$plant->nama_latin}
    Asal: {$plant->asal}
    Penyiraman: {$plant->penyiraman}
    Cahaya: {$plant->cahaya}
    Suhu: {$plant->suhu}
    Kelembapan: {$plant->kelembapan}
    Deskripsi: {$plant->deskripsi}

    Jelaskan tanaman ini menggunakan bahasa Indonesia yang mudah dipahami.
    Tambahkan tips perawatan.
    Maksimal 3 paragraf.
    ";

        // PERBAIKAN: Menggunakan versi v1 stabil dan model universal gemini-pro
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key="
            . config('services.gemini.api_key');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => $prompt
                        ]
                    ]
                ]
            ]
        ]);

        if (!$response->successful()) {
            return $response->body(); 
        }

        return data_get(
            $response->json(),
            'candidates.0.content.parts.0.text',
            'AI tidak memberikan jawaban.'
        );
    }

    public function chatPlant($plant, $question)
    {
        $prompt = "
Anda adalah ahli tanaman.

Tanaman saat ini:
Nama : {$plant->nama}
Nama Latin : {$plant->nama_latin}
Asal : {$plant->asal}
Penyiraman : {$plant->penyiraman}
Cahaya : {$plant->cahaya}
Suhu : {$plant->suhu}
Kelembapan : {$plant->kelembapan}
Deskripsi : {$plant->deskripsi}

Pertanyaan pengguna:
{$question}

Jawab dengan bahasa Indonesia.
";

        // PERBAIKAN: Menggunakan versi v1 stabil dan model universal gemini-pro
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key="
        . config('services.gemini.api_key');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, [
            "contents"=>[
                [
                    "parts"=>[
                        [
                            "text"=>$prompt
                        ]
                    ]
                ]
            ]
        ]);

        if (!$response->successful()) {
            return "Maaf, AI sedang mengalami gangguan. Silakan coba lagi nanti.";
        }

        return data_get(
            $response->json(),
            'candidates.0.content.parts.0.text',
            'AI tidak memberikan jawaban.'
        );
    }
}