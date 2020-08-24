<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function PostCat()
    {
       $post_cat=DB::table('post_category')->get();
       return view('admin.post.post_cat',compact('post_cat'));
    }


    public function storpostecategory(Request $request)
    {
    	 

    	 $data=array();
         $data['category_name_en']=$request->category_name_en;
         $data['category_name_bn']=$request->category_name_bn;

         DB::table('post_category')->insert($data);
         $notification=array(
                        'messege'=>'Post Category Insert Success',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
       
    }

    public function DeletePostCategory($id)
    {
    	DB::table('post_category')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Post Category Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }

    public function EditPostCategory($id)
    {
    	$post_cat = DB::table('post_category')->where('id',$id)->first();
    	return view('admin.post.edit_post_cat',compact('post_cat'));

    }

    public function UpdatePostCategory(Request $request,$id)
    {

    	// $validatedData = $request->validate([
     //    'category_name' => 'required|max:50',
     //    ]);

        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_bn']=$request->category_name_bn;

    	$update = DB::table('post_category')->where('id',$id)->update($data);

    	if ($update) {
    		$notification=array(
                        'messege'=>'Post Category Update Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('allpostcategory')->with($notification);
    	}
    	else
    	{

    		$notification=array(
                        'messege'=>'Post Category Do Not Update',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('allpostcategory')->with($notification);

    	}

    	
    }


    //blog post 

    public function Create()
    {
       $post_cat=DB::table('post_category')->get();
       return view('admin.blog.create',compact('post_cat'));
    }

    public function store(Request $request)
    {
         $data=array();
         $data['post_title_en']=$request->post_title_en;
         $data['post_title_bn']=$request->post_title_bn;
         $data['category_id']=$request->category_id;
         $data['details_en']=$request->details_en;
         $data['details_bn']=$request->details_bn;


         $post_image=$request->post_image; 
         if ($post_image){
          
          $image_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
          Image::make($post_image)->resize(400,250)->save('public/media/post/'.$image_name);
          $data['post_image']='public/media/post/'.$image_name;


              DB::table('posts')->insert($data);
              $notification=array(
                        'messege'=>'Post Insert With Image',
                        'alert-type'=>'success'
                         );
              return Redirect()->route('all.blogpost')->with($notification);

         }else{

              $data['post_image']='';
              DB::table('posts')->insert($data);
              $notification=array(
                        'messege'=>'Post  Insert Without Image',
                        'alert-type'=>'success'
                         );
              return Redirect()->route('all.blogpost')->with($notification);
         }
    }


    public function index()
    {
           $post=DB::table('posts')->join('post_category','posts.category_id','post_category.id')
                                   ->select('posts.*','post_category.category_name_en',
                                    'post_category.category_name_bn')
                                   ->get(); 
           return view('admin.blog.index',compact('post'));

    }

    public function DeletePost($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        unlink($image);

        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
                        'messege'=>'Posts Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }

    public function EditPost($id)
    {

        $post = DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit',compact('post'));

    }

    public function UpdatePost(Request $request,$id)
    {
         $data=array();
         $data['post_title_en']=$request->post_title_en;
         $data['post_title_bn']=$request->post_title_bn;
         $data['category_id']=$request->category_id;
         $data['details_en']=$request->details_en;
         $data['details_bn']=$request->details_bn;


         $oldimage=$request->old_image;

         $post_image=$request->post_image; 
         if ($post_image){

          unlink($oldimage);
          
          $image_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
          Image::make($post_image)->resize(400,250)->save('public/media/post/'.$image_name);
          $data['post_image']='public/media/post/'.$image_name;


              DB::table('posts')->where('id',$id)->update($data);
              $notification=array(
                        'messege'=>'Post Update With Image',
                        'alert-type'=>'success'
                         );
              return Redirect()->route('all.blogpost')->with($notification);

         }else{

              $data['post_image']=$oldimage;
              DB::table('posts')->where('id',$id)->update($data);
              $notification=array(
                        'messege'=>'Post Update Without Image',
                        'alert-type'=>'success'
                         );
              return Redirect()->route('all.blogpost')->with($notification);
         }
    }

}
