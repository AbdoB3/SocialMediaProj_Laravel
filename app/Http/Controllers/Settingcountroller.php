<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Settingcountroller extends Controller
{
   public function index(){
    return view('setting.index');
   }


   public function changeColor($color)
{
    

    // Update the variables.scss file with the new color
    $scss = "$body-bg: #$color;\n";
    file_put_contents(public_path('css/variables.scss'), $scss);

    return redirect('/your-page');
}
}
