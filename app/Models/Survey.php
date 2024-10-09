<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    // Tentukan kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = ['nama_survey'];

    // Definisikan relasi one-to-many dengan Subsurvey1
    public function subsurvey1s()
    {
        return $this->hasMany(Subsurvey1::class, 'id_survey');
    }

    // Definisikan relasi one-to-many dengan Subsurvey2 (melalui Subsurvey1)
    public function subsurvey2s()
    {
        return $this->hasManyThrough(Subsurvey2::class, Subsurvey1::class, 'id_survey', 'id_subsurvey1');
    }

    public function kerjasamas()
{
    return $this->hasMany(Kerjasama::class, 'survey_id');
}

}
