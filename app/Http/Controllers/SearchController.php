<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function  index(){
        $user = User::all();
        return view('layouts.app')->with('user',$user);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        // Perform the user search logic
        $users = User::where('username', 'like', "$search%")->get();
    
        // Pass the search results to the 'result' view
        return view('result', compact('users'));
    }
    
}