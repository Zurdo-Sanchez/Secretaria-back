<?php

namespace App\Models\PEAJ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejes extends Model
{
    use HasFactory;

    protected $fillable =[
        'number',
        'name',
        'description'
    ];
}
