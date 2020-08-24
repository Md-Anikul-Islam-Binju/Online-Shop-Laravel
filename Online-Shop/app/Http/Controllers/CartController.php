<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Auth;
use Session;

class CartController extends Controller
{
    public function AddCart($id)
    {
    	$product=DB::table('products')->where('id',$id)->first();

    	$data=array();
    	

        if($product->discount_price == NULL){

    	
    	    $data['id']=$product->id;
    	    $data['name']=$product->product_name;
    	    $data['qty']=1;
    	    $data['price']=$product->selling_price;
    	    $data['weight']=1;
          $data['options']['image']=$product->image_one;
          $data['options']['color']='';
          $data['options']['size']='';
    	    Cart::add($data);
    	    $notification=array(
                                    'messege'=>'Add to Cart',
                                    'alert-type'=>'success'
                                );
            return Redirect()->back()->with($notification);
    	}
    	else
    	{
    		$data['id']=$product->id;
    	    $data['name']=$product->product_name;
    	    $data['qty']=1;
    	    $data['price']=$product->discount_price;
    	    $data['weight']=1;
    	    $data['options']['image']=$product->image_one;
          $data['options']['color']='';
          $data['options']['size']='';
    	    Cart::add($data);
    	    $notification=array(
                                    'messege'=>'Add to Cart',
                                    'alert-type'=>'success'
                               );
            return Redirect()->back()->with($notification);
    	}

    }

    public function CheckCart()
    {
    	$content=Cart::content();
    	return response()->json($content);
    }

    public function ShowCart()
    {
        $cart=Cart::content();
        //return response()->json($cart);
        return view('pages.cart',compact('cart'));
    }

    public function RemoveCart($rowId)
    {
       Cart::remove($rowId);
       return redirect()->back();
    }

    public function UpdateCart(Request $request)
    {
        $rowId=$request->productid;
        $qty=$request->qty;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }


   public function Checkout()
   {
     if (Auth::check()) {

          $cart=Cart::content();
          return view('pages.checkout',compact('cart'));
     }else
     {
         $notification=array(
                                    'messege'=>'At First Login Your Accounnt',
                                    'alert-type'=>'success'
                                );
         return Redirect()->route('login')->with($notification);;
     }
   }




   public function Wishlist()
   {
        $userid=Auth::id();
        $product=DB::table('wishlists')->join('products','wishlists.product_id','products.id')
                          ->select('products.*','wishlists.user_id')
                          ->where('wishlists.user_id',$userid)
                          ->get();                      
        return view('pages.wishlist',compact('product')); 
   }



   public function Coupon(Request $request)
    {
        $coupon=$request->coupon;
        $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
              session::put('coupon',[
                  'name' => $check->coupon,
                  'discount' => $check->discount,
                  'balance' => Cart::Subtotal() - $check->discount
              ]);
              $notification=array(
                              'messege'=>'Successfully Coupon Applied',
                               'alert-type'=>'success'
                         );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                              'messege'=>'Invalid Coupon',
                               'alert-type'=>'error'
                         );
            return redirect()->back()->with($notification);
        }

    }

    public function CouponRemove()
    {
         session::forget('coupon');
          return redirect()->back();
    }

    public function PaymentPage()
    {
       $cart=Cart::content();
       return view('pages.payment',compact('cart'));
    }




}
