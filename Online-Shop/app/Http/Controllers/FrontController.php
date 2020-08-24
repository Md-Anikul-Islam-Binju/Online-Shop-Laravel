<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function StoreNewslater(Request $request)
    {
    	$validatedData = $request->validate([
        'email' => 'required|unique:newslaters|max:50',
        ]);



    	$data=array();
    	$data['email']=$request->email;
    	DB::table('newslaters')->insert($data);

    	$notification=array(
                        'messege'=>'Thanks For Subscribing',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);
    }


    public function OrderTracking(Request $request)
    {
        
        $code=$request->code;

        $track=DB::table('orders')->where('status_code',$code)->first();

        if ($track) {
          
          return view('pages.track',compact('track'));


        }
        else
        {
           $notification=array(
                        'messege'=>'Status Code Invalide',
                        'alert-type'=>'error'
                         );
           return Redirect()->back()->with($notification); 
        }
    }

    public function ProductSearch(Request $request)
    {
        // $item=$request->search;
        // $prducts=DB::table('products')
        //          ->where('product_name','LIKE',"%{$item}%")
        //          ->get();

        // return response()->json($prducts);


          $brands=DB::table('brands')->get();
          $item=$request->search;
          $products=DB::table('products')
                                // ->join('brands','products.brand_id','brands.id')
                                // ->select('products.*','brands.brand_name')
                                ->where('product_name','LIKE', "%{$item}%")
                                // ->orWhere('brand_name','LIKE', "%{$item}%")
                                ->paginate(20);
               return view('pages.search',compact('brands','products'));       
    }
}
