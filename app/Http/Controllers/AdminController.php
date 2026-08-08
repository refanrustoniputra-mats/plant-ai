<?php

namespace App\Http\Controllers;

use App\Models\Plant;

class AdminController extends Controller
{
    public function index()
    {
        $plants = Plant::orderBy('nama')->get();

        return view('admin.dashboard', [
            'plants' => $plants,
            'total' => $plants->count()
        ]);
    }
}