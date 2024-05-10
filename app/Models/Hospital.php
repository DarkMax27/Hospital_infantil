<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'id_hospital_origen');
    }

    public function camas()
    {
        return $this->hasMany(Cama::class);
    }

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
