<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coleur extends Model
{
    protected $fillable = [
        "user_id"  , 
        "body-bg"  ,     
        "font-family-sans-serif"   ,
        "font-size-base"   ,
        "line-height-base"   
    ];
}
