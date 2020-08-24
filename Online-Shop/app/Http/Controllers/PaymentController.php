<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Cart;
use Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function Payment(Request $request)
    {
        $data=array();

        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['payment']=$request->payment;

        if($request->payment == 'stripe')
        {
            return view('pages.payment.stripe',compact('data'));
        }
        elseif($request->payment == 'paypal')
        {
            echo "Please Use VISA Card Payment Its not ready For U";
        }
        elseif($request->payment == 'ideal')
        {
            echo "<h1>Please Use VISA Card Payment Its not ready For U</h1>";
        }
        else
        {
           echo "Hand Cash";   
        }

    }

    public function StripeCharge(Request $request)
    {

         $total=$request->total;
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
         \Stripe\Stripe::setApiKey('sk_test_51HAUXuHDIbQEoMM1eREKqHTL5Exi1LBcD8Kg4rrFkjVGTMwQyPJ35U3PMAU9Nw5cqR28s4LDczHS3jTN9cb5HXJl00FeNSqUM6');

           // Token is created using Checkout or Elements!
           // Get the payment token ID submitted by the form:
         $token = $_POST['stripeToken'];

         $charge = \Stripe\Charge::create([
         'amount' => $total*100,
         'currency' => 'usd',
         'description' => 'E-Commerce Marcket Place',
         'source' => $token,
         'metadata' => ['order_id' => '6735'],
         ]);

         $data=array();
         $data['user_id']=Auth::id();
         $data['payment_id']=$charge->payment_method;
         $data['paying_amount']=$charge->amount;
         $data['blnc_transection']=$charge->balance_transaction;
         $data['stripe_order_id']=$charge->metadata->order_id;
         $data['shipping']=$request->shipping;
         $data['vat']=$request->vat;
         $data['total']=$request->total;
         $data['payment_type']=$request->payment_type;


        if(Session::has('coupon'))
        {
            $subtotal=Session::get('coupon')['balance'];

        }
        else
        {
            $subtotal=Cart::Subtotal();
        }

         $data['status']=0;
         $data['date']=date('d-m-y');
         $data['month']=date('F');
         $data['year']=date('Y');
         $data['status_code']=mt_rand(100000,999999);

        $order_id=DB::table('orders')->insertGetId($data);

        //insert shipping details

        $shipping=array();
        $shipping['order_id']=$order_id;
        $shipping['ship_name']=$request->ship_name;
        $shipping['ship_email']=$request->ship_email;
        $shipping['ship_phone']=$request->ship_phone;
        $shipping['ship_address']=$request->ship_address;
        $shipping['ship_city']=$request->ship_city;

        DB::table('shipping')->insert($shipping);

        //insert data order details table
          $content=Cart::content();
          $details=array();
          foreach ($content as $row) {
             
             $details['order_id']=$order_id;
             $details['product_id']=$row->id;
             $details['product_name']=$row->name;
             $details['color']=$row->options->color;
             $details['size']=$row->options->size;
             $details['qty']=$row->qty;
             $details['singleprice']=$row->price;
             $details['totalprice']=$row->qty*$row->price;

             DB::table('order_details')->insert($details);

          }

          Cart::destroy();
         if(Session::has('coupon'))
         {
           Session::forget('coupon');
         }

         $notification=array(
                                    'messege'=>'Successfully Done',
                                    'alert-type'=>'success'
                             );
         return Redirect()->to('/')->with($notification);



    }
}
