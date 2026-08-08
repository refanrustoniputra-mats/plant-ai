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

       $url = "https://generativelanguage.googleapis.com/v1/models/gemini-3.5-flash:generateContent?key="
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

Nama :
{$plant->nama}

Nama Latin :
{$plant->nama_latin}

Asal :
{$plant->asal}

Penyiraman :
{$plant->penyiraman}

Cahaya :
{$plant->cahaya}

Suhu :
{$plant->suhu}

Kelembapan :
{$plant->kelembapan}

Deskripsi :
{$plant->deskripsi}

Pertanyaan pengguna:

{$question}

Jawab dengan bahasa Indonesia.

";

        $url =
        "https://generativelanguage.googleapis.com/v1/models/gemini-3.5-flash:generateContent?key="
        . config('services.gemini.api_key');

        $response = Http::post($url, [

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

        return data_get(
            $response->json(),
            'candidates.0.content.parts.0.text'
        );
    }
}