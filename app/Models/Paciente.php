<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'id_hospital_origen');
    }
}
