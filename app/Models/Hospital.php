<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitales';
    protected $fillable = ['nombre_del_hospital', 'direccion', 'telefono']; // Lista de atributos asignables

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'hospital_id', 'id'); // hospital_id es la clave foránea en la tabla pacientes
    }

    public function camas()
    {
        return $this->hasMany(Cama::class, 'hospital_id', 'id'); // hospital_id es la clave foránea en la tabla camas
    }

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'hospital_id', 'id'); // hospital_id es la clave foránea en la tabla medicos
    }
}
