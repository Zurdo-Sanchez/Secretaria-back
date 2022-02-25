<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostItForUser extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'post_it_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function PostIt()
    {
        return $this->belongsTo(PostIt::class,'post_it_id');
    }
}
