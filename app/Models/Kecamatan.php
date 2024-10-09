<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kecamatan',
    ];

    // Relasi dengan tabel Kerjasama
    public function kerjasamas()
    {
        return $this->hasMany(Kerjasama::class);
    }
}
