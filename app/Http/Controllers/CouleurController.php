<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouleurController extends Controller
{


    
    public function edit(){
        return view('setting.style');
    }
    
    public function update(User $user){
        $data = request()->validate([
         "user_id"   =>"required",
         "body-bg"   =>"required",
         "font-family-sans-serif"   =>"required",
         "font-size-base"   =>"required",
         "line-height-base"   =>"required",
        ]);
    }
    
}
