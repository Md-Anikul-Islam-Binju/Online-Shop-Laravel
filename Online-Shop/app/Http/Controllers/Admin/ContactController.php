<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{


    public function contact()
    {
       return view('layouts.contact');
    }

    public function StoreContact(Request $request)
    {
    	 $data=array();
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['message']=$request->message;

         DB::table('contacts')->insert($data);
         $notification=array(
                        'messege'=>'Send Your Massage',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }



}
