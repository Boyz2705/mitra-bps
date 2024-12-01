<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsurvey1 extends Model
{
    use HasFactory;

    protected $table = 'subsurvey1s';

    // Tentukan kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = ['id_survey', 'nama_subsurvey'];

    // Definisikan relasi many-to-one dengan Survey
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'id_survey');
    }

    // Definisikan relasi one-to-many dengan Subsurvey2
    public function subsurvey2s()
    {
        return $this->hasMany(Subsurvey2::class, 'id_subsurvey1');
    }

    public function kerjasamas(){
        return $this->hasMany(Kerjasama::class, 'subsurvey1_id');
    }

}
