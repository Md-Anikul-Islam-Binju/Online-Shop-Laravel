<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Cart;
use Session;

class ReturnOrderController extends Controller
{
   
    public function SuccessOrderlist()
    {
         $order=DB::table('orders')
               ->where('user_id',Auth::id())
               ->where('status',3)
               ->orderBy('id','DESC')
               ->limit(10)
               ->get();

               

        return view('pages.returnorder',compact('order'));
    }


    public function RequestReturn($id)
    {
        
        DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
        $notification=array(
                              'messege'=>'Order Return request done please wait for our confirmation email',
                               'alert-type'=>'success'
                           );
        return Redirect()->back()->with($notification);

    }
}
