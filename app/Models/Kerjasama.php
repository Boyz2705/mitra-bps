<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mitra_id',
        'kecamatan_id',
        'survey_id',
        'subsurvey1_id',
        'subsurvey2_id',
        'jenis_id',
        'date',
        'honor',
        'bulan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function subsurvey1()
    {
        return $this->belongsTo(Subsurvey1::class);
    }

    public function subsurvey2()
    {
        return $this->belongsTo(Subsurvey2::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
