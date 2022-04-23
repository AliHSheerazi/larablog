<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index(){
        $category = Category::where('status', '0')->get();
        $latest_post = Post::where('status', '0')->OrderBy('created_at','DESC')->get()->take(10);
        return view('frontend.index ', compact('category', 'latest_post'));
    
    }
    public function ViewCategoryPost($category_slug){
        $category = Category::where('slug',$category_slug)->where('status', '0')->first();
        if($category){
            $post = Post::where('category_id', $category->id)->where('status', '0')->paginate(1);
            return view('frontend.post.index ', compact('post','category'));
        }else{
            return view('/ ');
        }
        
    }

    public function ViewPost(string $category_slug,string $post_slug){
        $category = Category::where('slug',$category_slug)->where('status', '0')->first();
        if($category){
            $post = Post::where('category_id', $category->id)->where('slug',$post_slug)->where('status', '0')->first();
            $latest_post = Post::where('category_id', $category->id)->where('status', '0')->OrderBy('created_at','DESC')->get()->take(1);
            return view('frontend.post.view ', compact('post','latest_post'));
        }else{
            return view('/ ');
        }
        
    }
}
