<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'id_hospital'
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'id_hospital');
    }
}
