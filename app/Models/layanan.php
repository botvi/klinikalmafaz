<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    use HasFactory;
    public $table = "layanan";
    protected $fillable = [
        "nama",
        "deskripsi",
        "kategori",
        "status"
    ];
}
