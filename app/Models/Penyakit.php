<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    public $table = "penyakit";

    protected $fillable = [
        "nama",
        "deskripsi",
        "solusi",
        "gambar",
        "kategori",
        "status",
        "penyebab",
        "gejala",
        "pencegahan",
        "obat"
    ];
}
