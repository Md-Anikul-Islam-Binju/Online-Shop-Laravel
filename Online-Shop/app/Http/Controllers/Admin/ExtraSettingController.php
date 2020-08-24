<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ExtraSettingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }  


    public function extrasetting()
    {
       $extrasetting=DB::table('infosettings')->get();
       return view('admin.setting.extra_setting',compact('extrasetting'));
    }

    public function StoreExtraSetting(Request $request)
    {
    	 $data=array();
         $data['shopname']=$request->shopname;
         $data['address']=$request->address;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['vat']=$request->vat;
         $data['shipping_charge']=$request->shipping_charge;

         DB::table('infosettings')->insert($data);
         $notification=array(
                        'messege'=>'Extra Setting Data Insert Success',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }


    public function DeleteExtraSetting($id)
    {
    	DB::table('infosettings')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Etra Setting Data Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }
}
