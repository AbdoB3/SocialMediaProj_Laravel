<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like; 
use App\Models\post; 

use App\Models\LikeDislike;
class LikesController extends Controller
{
    public function like(Request $request)
    {
        $user = auth()->user();
        $postId = $request->input('post_id');
       

        // Check if the user has already liked the post
        $existingLike = Like::where('user_id', $user->id)
                            ->where('post_id', $postId)
                            ->first();
    
        if (!$existingLike) {
            // User hasn't liked the post yet, create a new like
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $postId;
            $like->save();
            $post = Post::find($postId);
            $likeCount = $post->like->count();
            return ['like_count' => $likeCount];
        } else {
            $laodx = 1;
            return view("home.home", compact('laodx'));
        }
    }
    
    public function unlike(Request $request)
    {
        $user = auth()->user();
        $postId = $request->input('post_id');
    
        Like::where('user_id', $user->id)->where('post_id', $postId)->delete();
    
        return response()->json(['message' => 'Unliked']);
    }
}
