<?php

namespace App\Models\PEAJ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;


    protected $fillable =[
        'responsable',
        'program',
        'headings'
    ];
}

