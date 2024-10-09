<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsurvey2 extends Model
{
    use HasFactory;

    protected $table = 'subsurvey2s';

    // Tentukan kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = ['id_survey', 'id_subsurvey1', 'nama_subsurvey2s'];

    // Definisikan relasi many-to-one dengan Survey
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'id_survey');
    }

    // Definisikan relasi many-to-one dengan Subsurvey1
    public function subsurvey1()
    {
        return $this->belongsTo(Subsurvey1::class, 'id_subsurvey1');
    }

    public function kerjasamas()
    {
    return $this->hasMany(Kerjasama::class, 'subsurvey2_id');
    }
}
