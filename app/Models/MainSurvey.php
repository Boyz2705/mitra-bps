<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSurvey extends Model
{
    use HasFactory;

    protected $table = 'mainsurveys';

    // Tentukan kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = ['nama_survey'];

    // Definisikan relasi one-to-many dengan Subsurvey

    public function kerjasamas()
{
    return $this->hasMany(Kerjasama::class, 'mainsurvey_id');
}

}
