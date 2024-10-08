<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    // Tentukan tabel terkait
    protected $table = 'mitras';

    // Tentukan kolom-kolom yang dapat diisi (mass-assignable)
    protected $fillable = [
        'nama_mitra',
        'sobat_id',
        'satker',
        'kecamatan',
        'kelurahan',
        'L, P', // Ingat untuk merapikan nama kolom agar tidak ada masalah dengan nama kolom yang aneh.
        'email',
        'posisi',
    ];
}
