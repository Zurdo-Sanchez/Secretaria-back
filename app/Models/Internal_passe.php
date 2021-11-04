<?php

namespace App\Models;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExternalPasseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internal_passe extends Model
{
    use HasFactory;

    protected $fillable =[
        'from_id',
        'from_date',
        'response',
        'to_id',
        'to_date',
        'status',
        'responsable_id',
        'externa_passe_id'
    ];

    public function from_id(){
        return $this->belongsTo(AuthController::class,'from_id');
    }
    public function to_id(){
        return $this->belongsTo(AuthController::class,'to_id');
    }
    public function responsable_id(){
        return $this->belongsTo(AuthController::class,'responsable_id');
    }
    public function external_passe_id(){
        return $this->belongsTo(ExternalPasseController::class,'external_passe_id');
    }
}

