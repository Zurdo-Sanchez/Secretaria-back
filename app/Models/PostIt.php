<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostIt extends Model
{
    use HasFactory;

    protected $fillable =[
        'text',
        'user_id',
        'echo'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
