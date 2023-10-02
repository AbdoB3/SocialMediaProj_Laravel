<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $fillable = [
    'user_id',
    'caption',
    'image',
    
];
// Likes

protected $guarded =[];
public function user()
{
    return $this->belongsTo(User::class);
}
public function Like(){
  return $this->hasMany(Like::class);
}
public function comments(){
  return $this->hasMany(Comment::class);
}

}
