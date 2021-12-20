<?php

namespace App\Models\PEAJ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lines extends Model
{
    use HasFactory;

    protected $fillable =[
        'number',
        'sub_eje_id',
        'name',
        'description'
    ];
}
