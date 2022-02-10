<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class normativas extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'number',
        'year',
        'reference',
        'type_id',
        'agrupation_id',

    ];

    public function Agrupation(){
        return $this->belongsTo(normativasAgrupations::class,'agrupation_id');
    }
    public function Type(){
        return $this->belongsTo(normativasType::class,'type_id');
    }
}
