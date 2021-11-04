<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable =[
        'dependence_number',
        'central_number',
        'final_number',
        'initiator',
        'concept',
        'status',
        'agrupation',
        'user'
    ];

    public function Agrupation(){
        return $this->hasOne(Agrupation::class,'agrupation','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user');
    }
}
