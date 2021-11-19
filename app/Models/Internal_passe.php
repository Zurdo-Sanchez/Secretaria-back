<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internal_passe extends Model
{
    use HasFactory;

    protected $fillable =[
        'from',
        'from_date',
        'response',
        'to',
        'to_date',
        'status',
        'responsable',
        'external_passe'
    ];

    public function From(){
        return $this->belongsTo(User::class,'from');
    }
    public function To(){
        return $this->belongsTo(User::class,'to');
    }
    public function Responsable(){
        return $this->belongsTo(User::class,'responsable');
    }
    public function External_passe(){
        return $this->belongsTo(External_passe::class,'external_passe');
    }
}

