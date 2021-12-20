<?php

namespace App\Models\PEAJ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_ejes extends Model
{
    use HasFactory;

    protected $fillable =[
        'number',
        'eje_id',
        'name',
        'description'
    ];
}
