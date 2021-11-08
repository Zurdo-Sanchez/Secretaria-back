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
        'agrupation_id',
        'user_id'
    ];

    public function Agrupation()
    {
        return $this->belongsTo(Agrupation::class,'agrupation_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
