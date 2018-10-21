<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    //

    public function getDashboard()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('dashboard')->with('posts',$posts);
    }

    public function postCreatePost(Request $request)
    {
    	$this->validate($request,[
    		'body'=>'required|max:1000'
    		]);
    	$message = "There was an error";
    	$post = new Post();
    	$post->body = $request['body'];
    	//$post->user_id = $request['user_id'];
    	if($request->user()->post()->save($post))
    	{
    		$message = "Post successfully created";
    	}
    	return redirect()->route('dashboard')->with('message',$message);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        if(Auth::user() != $post->user)
        {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Deleted successfully.']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request,[

            'body'=>'required'
            ]);
        $post = post::find($request['postId']);
        if(Auth::user() != $post->user)
        {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body],200);
    }
}
