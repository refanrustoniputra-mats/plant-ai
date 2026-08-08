<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Services\GeminiService;
use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class PlantController extends Controller
{
    public function show($kode)
    {
        $plant = Plant::where('kode', $kode)->firstOrFail();

        $gemini = new GeminiService();

        $aiDescription = $gemini->explainPlant($plant);

        return view('plant.show', compact(
            'plant',
            'aiDescription'
        ));
    }

    public function chat(Request $request, $kode)
    {
        $plant = Plant::where('kode', $kode)->firstOrFail();

        $gemini = new GeminiService();

        $answer = $gemini->chatPlant(
            $plant,
            $request->question
        );

        return response()->json([
            'answer' => $answer
        ]);
    }

    public function generateQR($kode)
    {
        $plant = Plant::where('kode', $kode)->firstOrFail();

        $url = url('/plant/' . $plant->kode);

        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $url,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 400,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin
        );

        // PERBAIKAN: Menjalankan (build) QR Code dan mengubahnya menjadi response gambar
        $result = $builder->build();

        return response($result->getString())
            ->header('Content-Type', $result->getMimeType());
    }
}