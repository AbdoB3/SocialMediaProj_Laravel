<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\LikeDislike;
use App\Models\Comment;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class postcountroller extends Controller
{

   public function __construct()
   {
       $this->middleware('auth');
   }
   public function create(){
return view('post.create');
   }

   
   
   public function store(){
      
      
      $data = request()->validate([
         'caption'=>'required',
         'image'=>['required','image'],
      ]);
      $imagePath =request('image')->store('uploadas','public');
      $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
      $image->save();

      auth()->user()->post()->create([
         'caption'=>$data['caption'],
         'image'=>$imagePath,
      ]);
      return redirect('/profile/'.auth()->user()->id);
  
}
public function show(Post $post){
   return view('post.show',['post'=>$post]);
} 

public function edit(Post $post){
   return view('post.edit',['post'=>$post]);
}



public function update(Post $post)
{
    $data = request()->validate(
      [
         'caption'=>'required',
         'image'=>['required','image'],
    ]);

    // You should check if the currently authenticated user owns the post before updating it
    if (auth()->user()->id !== $post->user_id) {
        abort(403); // You may want to handle unauthorized access differently
    }

    // Update the post data
    if (request('image')) {
        $imagePath = request('image')->store('uploads', 'public'); // Changed 'uploadas' to 'uploads'
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();
    }

    $post->update([
      'caption'=>$data['caption'],
      'image'=>$imagePath,
   ]);
    return redirect('/profile/' . auth()->user()->id);
}


   // Save Like Or dislike
   public function save_likedislike(Request $request)
{
    $user = auth()->user();
    $data = new LikeDislike;
    $data->user_id = $user->id;
    $data->post_id = $request->post;

    if ($request->type == 'like') {
        $data->like = 1;
    } else {
        $data->dislike = 1;
    }

    $data->save();

    return response()->json([
        'bool' => true
    ]);
}

public function Comment(Request $request,$postId){

    $user = auth()->user()->id;
    //$postId = $request->input('post_id');
    Comment::create([
        'user_id'=>$user,
        'post_id'=>$postId,
        'comment'=>$request->comment
    ]);

}

public function ShowComment(User $user){
    $user->load('profile');
    
    $comments = Comment::latest()->paginate(3);
    
    return view('profile.index', compact('comments', 'user'));

}

}
