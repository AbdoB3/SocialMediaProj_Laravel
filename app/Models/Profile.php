<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'url',
        'image'
    ];
    public function user(){
        return  $this ->belgonesTo(User::class);
      }
}
