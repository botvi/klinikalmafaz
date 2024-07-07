<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    use HasFactory;
    protected $fillable = [
        "pasien_id",
        "dokter_id",
        "perawat_id",
        "penyakit_id",
        "keterangan"
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function perawat()
    {
        return $this->belongsTo(Perawat::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
