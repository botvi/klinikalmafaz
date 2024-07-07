<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;
    public $table = "perawat";

    protected $fillable = [
        "user_id",
        "nama",
        "alamat",
        "no_telp",
        "jenis_kelamin",
        "agama",
        "pendidikan",
        "status",
        "jabatan",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
