<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [

        'kode',
        'nama',
        'nama_latin',
        'asal',
        'penyiraman',
        'cahaya',
        'suhu',
        'kelembapan',
        'deskripsi'

    ];
}  