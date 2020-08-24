<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class BlogController extends Controller
{
    public function Blog()
    {
    	$post=DB::table('posts')
    	     ->join('post_category','posts.category_id','post_category.id')
    	     ->select('posts.*','post_category.category_name_en','post_category.category_name_bn')
    	     ->get();
    	    // return response()->json($post);
    	return view('pages.blog',compact('post'));
    }

    public function Bangla()
    {
    	Session::get('lang');
    	session()->forget('lang');

    	Session::put('lang','bangla');
    	return redirect()->back();

    }

    public function English()
    {
    	Session::get('lang');
    	session()->forget('lang');

    	Session::put('lang','english');
    	return redirect()->back();

    }

    public function BlogDetails($id)
    {
            
             $blog=DB::table('posts')
                       ->where('posts.id',$id)
                       ->first();
             return view('pages.blog_details',compact('blog'));
    }
}
