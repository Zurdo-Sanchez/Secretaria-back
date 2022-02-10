<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'internal_phone',
        'code_sie',
        'email',
        'alternative_email',
        'officer_in_charge'
    ];


    public function Dependence()
    {
        return $this->belongsTo(Office::class,'dependence_id');
}
}
