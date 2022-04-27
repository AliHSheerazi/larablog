<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        
        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if($validator->fails()){
                return redirect()->back()->with('message', 'Comment Area is mendetory');
            }
            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            
            if($post){
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body,
                ]);
                return redirect()->back();
            }
            else{
                return redirect()->back()->with('message', 'No such post found');
            }
        }else{
            return redirect('login')->with('message', 'Login  first to comment');
        }
    }
}
