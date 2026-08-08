<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::orderBy('kode')->get();

        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.plants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:plants',
            'nama' => 'required',
            'nama_latin' => 'required',
            'asal' => 'required',
            'penyiraman' => 'nullable',
            'cahaya' => 'nullable',
            'suhu' => 'nullable',
            'kelembapan' => 'nullable',
            'deskripsi' => 'required',
        ]);

        Plant::create($request->all());

        return redirect()->route('plants.index')
            ->with('success', 'Tanaman berhasil ditambahkan');
    }

    public function edit(Plant $plant)
    {
        return view('admin.plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'nama_latin' => 'required',
            'asal' => 'required',
            'penyiraman' => 'nullable',
            'cahaya' => 'nullable',
            'suhu' => 'nullable',
            'kelembapan' => 'nullable',
            'deskripsi' => 'required',
        ]);

        $plant->update($request->all());

        return redirect()->route('plants.index')
            ->with('success', 'Berhasil diupdate');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();

        return back()->with('success', 'Berhasil dihapus');
    }
}   