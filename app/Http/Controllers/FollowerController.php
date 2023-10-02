<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow; // Make sure to use the correct namespace and class name (Follow instead of follow)

class FollowerController extends Controller
{
    public function follow(Request $request)
    {
        $user = auth()->user();
        $follow = $request->userid;

        
        



        $data = \DB::table('follow')->select('id')
        ->where('user_id', '=', $user->id)
        ->where('follow_id', '=', $follow)
        ->first();

        if($data){
            \DB::table('follow')->where('id', $data->id)->delete();


            return 'non';
        }else{
        \DB::table('follow')->insert(
                ['user_id' => $user->id, 'follow_id' => $follow]
            );
            return 'oui';

        }






        // Retrieve the authenticated user
        



    }
}
