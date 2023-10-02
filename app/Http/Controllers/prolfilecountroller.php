<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class prolfilecountroller extends Controller
{
    public function index($user){
     $user=   User::findOrFail($user);


     $user1 = auth()->user();

     $data = \DB::table('follow')->select('id')
     ->where('user_id', '=', $user1->id)
     ->where('follow_id', '=', $user->id)
     ->first();

     $count=\DB::table('follow')
     ->where('user_id', '=', $user1->id)
     ->where('follow_id', '=', $user->id)
        ->count();

     if($data){
         \DB::table('follow')->where('id', $data->id)->delete();


$color="red"  ; 
$text="unfollow";
}else{
     \DB::table('follow')->insert(
             ['user_id' => $user1->id, 'follow_id' => $user->id]
         );
         $color="green"  ;
         $text="follow";
     }













        return view('profile.index',['user'=>$user,'color'=>$color,'text'=> $text,'count'=> $count]);
    }
    public function edit(User $user){
       if(auth()->user()->id == $user->profile->id)

        return view('profile.edit', compact('user'));
else{
    abort(403, 'Unauthorized action');


}
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $data['image'] = $imagePath;
        }
        
        if (auth()->user()) {
            // User is authenticated, so you can access the profile property and update it
            $user->profile->update($data); // Remove [$image]
            return redirect("/profile/{$user->id}");
        } else {
            return view('profile.erreur', ['user' => $user]);
        }
    }
    public function index1()
    {
        return view('home.home'); 
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Perform the search by name
        $results = User::where('name', 'like', '%' . $query . '%')->get();
    
        return response()->json($results);
    }
}