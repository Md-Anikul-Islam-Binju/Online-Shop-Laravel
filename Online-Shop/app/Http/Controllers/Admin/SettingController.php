<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function setting()
    {
       $setting=DB::table('settings')->get();
       return view('admin.setting.setting',compact('setting'));
    }

    public function StoreSetting(Request $request)
    {
    	 $data=array();
         $data['name']=$request->name;
         $data['address']=$request->address;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['link']=$request->link;

         DB::table('settings')->insert($data);
         $notification=array(
                        'messege'=>'Setting Data Insert Success',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }

    public function DeleteSetting($id)
    {
    	DB::table('settings')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Setting Data Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }


    public function Inactive($id)
    {   
      DB::table('settings')->where('id',$id)->update(['status'=> 0]);

      $notification=array(
                     'messege'=>'Successfully Setting Info Inactive',
                     'alert-type'=>'success'
                    );
      return Redirect()->back()->with($notification);

    }

    public function Active($id)
    {
      DB::table('settings')->where('id',$id)->update(['status'=> 1]);

      $notification=array(
                     'messege'=>'Successfully Setting Info Active',
                     'alert-type'=>'success'
                    );
      return Redirect()->back()->with($notification);
    }

}
