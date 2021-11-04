<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class External_passe extends Model
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
        'file_id'
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
    public function file_id(){
        return $this->belongsTo(FilesController::class,'file_id');
    }
}
