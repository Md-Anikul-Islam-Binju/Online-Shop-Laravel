<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsLaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //use news latter
    public function Newslater()
    {
       $newslater=DB::table('newslaters')->get();
       return view('admin.coupon.newslater',compact('newslater'));
    }


    public function DeleteSubscrib($id)
    {
    	DB::table('newslaters')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Subscriber Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }

}
