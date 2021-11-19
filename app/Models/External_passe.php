<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class External_passe extends Model
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
        'file'
    ];

    public function File()
    {
        return $this->belongsTo(Files::class,'file');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'responsable');
    }

    public function From_Office()
    {
        return $this->belongsTo(Office::class,'from');
    }

    public function To_Office()
    {
        return $this->belongsTo(Office::class,'to');
    }
}
