<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon()
    {
       $coupon=DB::table('coupons')->get();
       return view('admin.coupon.coupon',compact('coupon'));
    }

    public function storecoupon(Request $request)
    {
    	$validatedData = $request->validate([
        'coupon' => 'required|unique:coupons|max:50',
        'discount' => 'required',
        ]);


         $data=array();
         $data['coupon']=$request->coupon;
         $data['discount']=$request->discount;
         DB::table('coupons')->insert($data);

        $notification=array(
                        'messege'=>'Coupon Inser Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);
       
    }

    public function DeleteCoupon($id)
    {
    	DB::table('coupons')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Coupon Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }

    public function Editcoupon($id)
    {
    	$coupon = DB::table('coupons')->where('id',$id)->first();
    	return view('admin.coupon.edit_coupon',compact('coupon'));
    }

    public function UpdateCoupon(Request $request,$id)
    {

    	$validatedData = $request->validate([
        'coupon' => 'required',
        'discount' => 'required',
        ]);

        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
    	$update = DB::table('coupons')->where('id',$id)->update($data);

    	if ($update) {
    		$notification=array(
                        'messege'=>'Coupon Update Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('coupon')->with($notification);
    	}

    	else
    	{

    		$notification=array(
                        'messege'=>'Coupon Do Not Update',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('coupon')->with($notification);

    	}

    	
    }


}
