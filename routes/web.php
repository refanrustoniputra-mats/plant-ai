<?php

use Illuminate\Support\Facades\Route;
use App\Models\Plant;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PlantController as AdminPlantController;

Route::get('/', function () {
    $plants = Plant::all();
    return view('home', compact('plants'));
});

// =========================
// PUBLIC
// =========================

Route::get('/plant/{kode}', [PlantController::class, 'show']);
Route::post('/plant/{kode}/chat', [PlantController::class, 'chat']);
Route::get('/plant/{kode}/generate-qr', [PlantController::class, 'generateQR']);

// =========================
// ADMIN
// =========================

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // KEMBALIKAN KE SEMULA: Tanpa ->names('admin.plants')
    Route::resource('/admin/plants', AdminPlantController::class);

});

require __DIR__.'/auth.php';