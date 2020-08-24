<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AllContuctController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function AllContact()
    {
      $contact=DB::table('contacts')->get();
      return view('admin.setting.allcontact',compact('contact'));
    }


    public function DeleteContact($id)
    {
    	DB::table('contacts')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'SCustomer Massage Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }
}
