<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notObjetions extends Model
{
    use HasFactory;

    protected $fillable =[
        'Puesto',
        'tipo_puesto',
        'tipo_contrato',
        'Apellido',
        'Nombre',
        'ciut',
        'tarea',
        'desde',
        'hasta',
        'dedicacion',
        'honorarios',
        'PG',
        'observaciones_pg',
        'dependecia_nacional',
        'fecha_nota',
        'observaciones',
        'importe_total',
        'dependencia'
    ];

    public function Dependencia()
    {
        return $this->belongsTo(User::class,'dependencia');
    }
}
