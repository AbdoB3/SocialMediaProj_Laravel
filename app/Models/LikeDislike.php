<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        
        
    ];
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // Relationship with the 'User' model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
