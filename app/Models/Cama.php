<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_de_cama',
        'ocupada',
        'id_hospital'
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'id_hospital');
    }
}
