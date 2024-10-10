<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraSasaranPivot extends Model
{
    use HasFactory;

    protected $table = 'mitra_sasaran_pivot';

    protected $fillable = [
        'mitra_id',
        'tahun',
        'tepat_sasaran',
        'total_honor'
    ];

    protected $casts = [
        'tahun' => 'integer',
        'tepat_sasaran' => 'boolean',
        'total_honor' => 'integer',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
