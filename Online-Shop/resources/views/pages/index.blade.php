@extends('layouts.app')
@section('content')

@include('layouts.menubar')

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{URL::to('public/frontend/images/char_1.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{URL::to('public/frontend/images/char_2.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{URL::to('public/frontend/images/char_3.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{URL::to('public/frontend/images/char_4.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    
<!-- Deals -->
 @php
 $hotdeals=DB::table('products')->join('brands','products.brand_id','brands.id')->select('products.*','brands.brand_name')->where('products.status',1)->where('hot_deal',1)->orderBy('id','DESC')->limit(4)->get();
 @endphp
<div class="deals">
    <div class="deals_title">Deals of the Week</div>
    <div class="deals_slider_container">
        
        <!-- Deals Slider -->
        <div class="owl-carousel owl-theme deals_slider">
            
            <!-- Deals Item -->
            @foreach($hotdeals as $row)
            <div class="owl-item deals_item">
                <div class="deals_image"><img src="{{URL::to($row->image_one)}}" style="height: 160px; width: 170px;"></div>
                <div class="deals_content">
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                        <div class="deals_item_category"><a href="{{url('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->brand_name}}</a></div>

                        @if($row->discount_price == NULL)
                        @else
                        <div class="deals_item_price_a ml-auto">{{$row->selling_price}} Tk.</div>
                        @endif
                        

                    </div>

                    <div class="deals_info_line d-flex flex-row justify-content-start">
                        <div class="deals_item_name">{{$row->product_name}}</div>

                        @if($row->discount_price == NULL)
                        <div class="deals_item_price ml-auto">{{ $row->selling_price }} Tk.</div>
                        @else
                        @endif
                        @if($row->discount_price != NULL)
                        <div class="deals_item_price ml-auto">{{ $row->discount_price }} Tk.</div>
                        @else
                        @endif
                  
                    </div>
                    <div class="available">
                        <div class="available_line d-flex flex-row justify-content-start">
                            <div class="available_title">Available: <span>{{ $row->product_quantity }}</span></div>
                           <!--  <div class="sold_title ml-auto">Already sold: <span>28</span></div> -->
                        </div>
                        <div class="available_bar"><span style="width:17%"></span></div>
                    </div>
                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                        <div class="deals_timer_title_container">
                            <div class="deals_timer_title">Hurry Up</div>
                            <div class="deals_timer_subtitle">Offer ends in:</div>
                        </div>
                        <div class="deals_timer_content ml-auto">
                            <div class="deals_timer_box clearfix" data-target-time="">
                                <div class="deals_timer_unit">
                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                    <span>hours</span>
                                </div>
                                <div class="deals_timer_unit">
                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                    <span>mins</span>
                                </div>
                                <div class="deals_timer_unit">
                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                    <span>secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach             
        </div>
    </div>
    <div class="deals_slider_nav_container">
        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
    </div>
</div>




 @php
 $featured=DB::table('products')
          ->where('status',1)
          ->orderBy('id','DESC')
          ->limit(24)
          ->get();

 $trend=DB::table('products')
       ->where('status',1)
       ->where('trend',1)
       ->orderBy('id','DESC')
       ->limit(24)
       ->get();

 $bestrated=DB::table('products')
           ->where('status',1)
           ->where('best_rated',1)
           ->orderBy('id','DESC')
           ->limit(24)
           ->get();
 @endphp
<!-- Featured -->
    <div class="featured">
        <div class="tabbed_container">
            <div class="tabs">
                <ul class="clearfix">
                    <li class="active">Featured</li>
                    <li>Trend</li>
                    <li>Best Rated</li>
                </ul>
                <div class="tabs_line"><span></span></div>
            </div>

           <!-- Product Panel -->
            <div class="product_panel panel active">
                <div class="featured_slider slider">
                    @foreach($featured as $row)
                    <!-- Slider Item -->
                    <div class="featured_slider_item">
                        <div class="border_active"></div>
                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                            <img src="{{URL::to($row->image_one)}}" style="height: 100px; width: 100px;">
                            </div>
                            <div class="product_content">


                            @if($row->discount_price == NULL)
                            <br><span class="text-danger"><b>{{$row->selling_price}} Tk.</b></span>
                            @else
                            <div class="product_price discount">{{$row->discount_price}} Tk.<span>{{$row->selling_price}}Tk.</span></div>
                            @endif
                               
                                <div class="product_name"><div><a href="{{url('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}}</a></div></div>


                                <div class="product_extras">
                                    <a href="{{URL::to('add/cart/'.$row->id)}}">
                                    <button class="product_cart_button addcart">Add to Cart</button>
                                    </a>
                                </div>

<!-- 
                        <div class="product_extras">
                            <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to Cart</button>
                                                 
                        </div> -->

                            



                            </div>




                            <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                            <div class="product_fav">
                                <i class="fas fa-heart"></i>
                            </div>
                            </a>






                            <ul class="product_marks">

                            @if($row->discount_price == NULL)
                            <li class="product_mark product_discount" style="background: green;">NEW</li>
                            @else 

                            @php
                            $amount=$row->selling_price - $row->discount_price;
                            $discount=$amount/$row->selling_price * 100;
                            @endphp                                          
                            <li class="product_mark product_discount">
                               {{ intval($discount) }}%
                            </li>
                            @endif


                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="featured_slider_dots_cover"></div>
            </div>

                            <!-- Product Panel -->

            <div class="product_panel panel">
                <div class="featured_slider slider">
                    @foreach($trend as $row)
                    <!-- Slider Item -->
                    <div class="featured_slider_item">
                        <div class="border_active"></div>
                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{URL::to($row->image_one)}}" style="height: 100px; width: 100px;"></div>
                            <div class="product_content">

                            @if($row->discount_price == NULL)
                            <br><span class="text-danger"><b>{{$row->selling_price}} Tk.</b></span>
                            @else
                            <div class="product_price discount">{{$row->discount_price}} Tk.<span>{{$row->selling_price}}Tk.</span></div>
                            @endif

                                <div class="product_name"><div><a href="product.html">{{$row->product_name}}</a></div></div>


                                <div class="product_extras">
                                    <a href="{{URL::to('add/cart/'.$row->id)}}">
                                    <button class="product_cart_button addcart">Add to Cart</button>
                                    </a>
                                </div>




                            </div>


                            <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                            <div class="product_fav">
                                <i class="fas fa-heart"></i>
                            </div>
                            </a>

                            
                            <ul class="product_marks">
                            
                            @if($row->discount_price == NULL)
                            <li class="product_mark product_discount" style="background: green;">NEW</li>
                            @else
                            @php
                            $amount=$row->selling_price - $row->discount_price;
                            $discount=$amount/$row->selling_price * 100;
                            @endphp                                             
                            <li class="product_mark product_discount">
                            {{ intval($discount) }}%
                            </li>
                            @endif

                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="featured_slider_dots_cover"></div>
            </div>

                            


        <!-- Product Panel -->

        <div class="product_panel panel">
            <div class="featured_slider slider">
                @foreach($bestrated as $row)
                <!-- Slider Item -->
                <div class="featured_slider_item">
                    <div class="border_active"></div>
                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{URL::to($row->image_one)}}" style="height: 100px; width: 100px;"></div>
                        <div class="product_content">
                           
                            @if($row->discount_price == NULL)
                            <br><span class="text-danger"><b>{{$row->selling_price}} Tk.</b></span>
                            @else
                            <div class="product_price discount">{{$row->discount_price}} Tk.<span>{{$row->selling_price}}Tk.</span></div>
                            @endif

                            <div class="product_name"><div><a href="product.html">{{$row->product_name}}</a></div></div>



                                <div class="product_extras">
                                    <a href="{{URL::to('add/cart/'.$row->id)}}">
                                    <button class="product_cart_button addcart">Add to Cart</button>
                                    </a>
                                </div>

                        </div>




                        <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                        <div class="product_fav">
                            <i class="fas fa-heart"></i>
                        </div>
                        </a>

                        
                        <!--                         
                           <button href="" class="addwishlist" data-id="{{ $row->id }}">
                           <div class="product_fav">
                              <i class="fas fa-heart"></i>
                           </div>
                           </button>
                        -->



                        <ul class="product_marks">
                            
                            @if($row->discount_price == NULL)
                            <li class="product_mark product_discount" style="background: green;">NEW</li>
                            @else
                            @php
                            $amount=$row->selling_price - $row->discount_price;
                            $discount=$amount/$row->selling_price * 100;
                            @endphp                                             
                            <li class="product_mark product_discount">
                            {{ intval($discount) }}%
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="featured_slider_dots_cover"></div>
         </div>
       </div>
     </div>
   </div>
  </div>
 </div>
</div>





<!-- Popular Categories -->
@php
$brand=DB::table('brands')->get();
@endphp
<div class="popular_categories">
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="popular_categories_content">
    <div class="popular_categories_title">Popular Brands</div>
    <div class="popular_categories_slider_nav">
        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
    </div>
    <div class="popular_categories_link"><a href="#">full catalog</a></div>
</div>
</div>

<!-- Popular Categories Slider -->

<div class="col-lg-9">
<div class="popular_categories_slider_container">
    <div class="owl-carousel owl-theme popular_categories_slider">
         @foreach($brand as $row)
        <!-- Popular Categories Item -->
        <div class="owl-item">
            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                <div class="popular_category_image"><img src="{{URL::to($row->brand_logo)}}" style="height:80px; width:80px;"></div>
                <div class="popular_category_text">{{ $row->brand_name }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
</div>
</div>



@php
  $midslider=DB::table('products')
           ->join('categories','products.category_id','categories.id')
           ->join('brands','products.brand_id','brands.id')
           ->select('products.*','brands.brand_name','categories.category_name')
           ->where('products.mid_slider',1)
           ->where('products.status',1)
           ->orderBy('id','DESC')
           ->limit(4)
           ->get(); 
@endphp
<!-- Banner -->

<div class="banner_2">
<div class="banner_2_background" style="background-image:url({{ asset('public/frontend/images/banner_2_background.jpg') }})"></div>
<div class="banner_2_container">
<div class="banner_2_dots"></div>


<div class="owl-carousel owl-theme banner_2_slider">
    @foreach($midslider as $row)
    <!-- Banner 2 Slider Item -->
    <div class="owl-item">
        <div class="banner_2_item">
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col-lg-4 col-md-6 fill_height">
                        <div class="banner_2_content">
                            <div class="banner_2_category">{{ $row->category_name }}</div>
                            <div class="banner_2_title">{{ $row->product_name }}</div>
                            <div class="banner_2_text">Brand:{{ $row->brand_name }}</div>
                            <div class="button banner_2_button"><a href="{{url('product/details/'.$row->id.'/'.$row->product_name)}}">Explore</a></div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8 col-md-6 fill_height">
                        <div class="banner_2_image_container">
                            <div class="banner_2_image"><img src="{{URL::to($row->image_one)}}" style="height:300px; width:300px;"></div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
    @endforeach
</div>
</div>
</div>




<!--first category all phone--->
@php 
$cats=DB::table('categories')->skip(0)->first();
$category_id=$cats->id;
$products=DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();
@endphp
<div class="new_arrivals">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="tabbed_container">
                <div class="tabs clearfix tabs-right">
                    <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                    <ul class="clearfix">
                        <li class="active"></li>                            
                    </ul>
                    <div class="tabs_line"><span></span></div>
                </div>

                <div class="row">
                    <div class="col-lg-12" style="z-index:1;">
                        <div class="product_panel panel active">
                            <div class="arrivals_slider slider">
                            @foreach($products as $row)
                              
                            <div class="featured_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($row->image_one) }}" style="height: 120px; width: 130px;"></div>
                                    <div class="product_content">
                                    @if($row->discount_price == NULL)
                                        <br><span class="text-danger"><b> ${{ $row->selling_price }} </b></span>
                                    @else
                                     <div class="product_price discount">${{ $row->discount_price }}<span>${{ $row->selling_price }}</span></div>
                                    @endif
                                        <div class="product_name"><div><a href="{{url('product/details/'.$row->id.'/'.$row->product_name)}}">
                                            {{ $row->product_name }}
                                        </a></div></div>



                                  <div class="product_extras">
                                    <a href="{{URL::to('add/cart/'.$row->id)}}">
                                    <button class="product_cart_button addcart">Add to Cart</button>
                                    </a>
                                  </div>  



                                    </div>

                                    <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                                      <div class="product_fav">
                                         <i class="fas fa-heart"></i>
                                      </div>
                                    </a>

                                    <ul class="product_marks">
                                         @if($row->discount_price == NULL)
                                         <li class="product_mark product_discount" style="background: blue;">New</li>

                                        @else
                                        @php
                                        $amount=$row->selling_price - $row->discount_price;
                                        $discount=$amount/$row->selling_price * 100;
                                        @endphp 
                                         <li class="product_mark product_discount">
                                       
                                       {{ intval($discount) }}%
                                        </li>
                                         @endif
                                        
                                       
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            </div>
                            <div class="arrivals_slider_dots_cover"></div>
                        </div>                  
                   </div>
                </div>
                        
            </div>
        </div>
    </div>
</div>      
</div>




<!--2nd category all Electronic--->
@php 
$cats=DB::table('categories')->skip(3)->first();
$category_id=$cats->id;
$products=DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();
@endphp
<div class="new_arrivals">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="tabbed_container">
                <div class="tabs clearfix tabs-right">
                    <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                    <ul class="clearfix">
                        <li class="active"></li>                            
                    </ul>
                    <div class="tabs_line"><span></span></div>
                </div>

                <div class="row">
                    <div class="col-lg-12" style="z-index:1;">
                        <div class="product_panel panel active">
                            <div class="arrivals_slider slider">
                            @foreach($products as $row)
                              
                            <div class="featured_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($row->image_one) }}" style="height: 120px; width: 130px;"></div>
                                    <div class="product_content">
                                    @if($row->discount_price == NULL)
                                        <br><span class="text-danger"><b> ${{ $row->selling_price }} </b></span>
                                    @else
                                     <div class="product_price discount">${{ $row->discount_price }}<span>${{ $row->selling_price }}</span></div>
                                    @endif
                                        <div class="product_name"><div><a href="{{url('product/details/'.$row->id.'/'.$row->product_name)}}">
                                            {{ $row->product_name }}
                                        </a></div></div>


                                  <div class="product_extras">
                                    <a href="{{URL::to('add/cart/'.$row->id)}}">
                                    <button class="product_cart_button addcart">Add to Cart</button>
                                    </a>
                                  </div>

                                    </div>

                                    <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                                      <div class="product_fav">
                                         <i class="fas fa-heart"></i>
                                      </div>
                                    </a>

                                    <ul class="product_marks">
                                         @if($row->discount_price == NULL)
                                         <li class="product_mark product_discount" style="background: blue;">New</li>

                                        @else
                                        @php
                                        $amount=$row->selling_price - $row->discount_price;
                                        $discount=$amount/$row->selling_price * 100;
                                        @endphp 
                                         <li class="product_mark product_discount">
                                       
                                       {{ intval($discount) }}%
                                        </li>
                                         @endif
                                        
                                       
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            </div>
                            <div class="arrivals_slider_dots_cover"></div>
                        </div>                  
                   </div>
                </div>
                        
            </div>
        </div>
    </div>
</div>      
</div>



  



<!-- BuyOne GetOne -->
@php
 $buyget=DB::table('products')
       ->where('status',1)
       ->where('buyone_getone',1)
       ->orderBy('id','DESC')
       ->limit(14)
       ->get();
@endphp
<div class="trends">
   <div class="trends_background" style="background-image:url({{ asset('public/frontend/images/trends_background.jpg') }})"></div>
<div class="trends_overlay"></div>

<div class="container">
<div class="row">

<!-- Trends Content -->
<div class="col-lg-3">
    <div class="trends_container">
        <h2 class="trends_title">BuyOne GetOne</h2>
        <div class="trends_text"><p>Get Your Choice able Product & get One...............</p></div>
        <div class="trends_slider_nav">
            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
        </div>
    </div>
</div>

<!-- Trends Slider -->     
<div class="col-lg-9">
    <div class="trends_slider_container">
        <div class="owl-carousel owl-theme trends_slider">
         @foreach($buyget as $row)
            <div class="owl-item">
                <div class="trends_item is_new">
                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{URL::to($row->image_one)}}" style="height: 160px; width: 170px;"></div>
                    <div class="trends_content">
                        <div class="trends_info clearfix">
                            <div class="trends_name"><a href="{{url('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}}</a></div></br>

                                @if($row->discount_price == NULL)
                                <br><span class="text-danger"><b> ${{ $row->selling_price }} </b></span>
                                @else
                                <div class="product_price discount">${{ $row->discount_price }}<span>${{ $row->selling_price }}</span></div>
                                @endif

                                 <a href="" class="btn btn-info btn-sm pull-right">Add to  cart</a>
                             </div>
                      </div>
                        <ul class="trends_marks">                            
                            @if($row->discount_price == NULL)
                            <li  class="trends_mark trends_new" style="background: green;">BG</li>
                            @else
                            @php
                            $amount=$row->selling_price - $row->discount_price;
                            $discount=$amount/$row->selling_price * 100;
                            @endphp                                             
                            <li class="trends_mark trends_new" style="background: red;">
                            {{ intval($discount) }}%
                            </li>
                            @endif
                        </ul>



                        <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                             <div class="trends_fav">
                                <i class="fas fa-heart"></i>
                             </div>
                        </a>

<!-- 
                    <button href="#" class="addwishlist" data-id="{{ $row->id }}">
                      <div class="trends_fav">
                        <i class="fas fa-heart"></i>
                      </div>
                    </button> -->


                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
</div>



    <!-- Brands -->

<div class="brands">
<div class="container">
<div class="row">
<div class="col">
<div class="brands_slider_container">
    
    <!-- Brands Slider -->
   
    <div class="owl-carousel owl-theme brands_slider">
         @foreach($brand as $row)

        <div class="owl-item">
            <div class="brands_item d-flex flex-column justify-content-center"><img src="{{URL::to($row->brand_logo)}}" style="height:80px; width:80px;">
            </div>
       </div>
        @endforeach
    </div>

    
    <!-- Brands Slider Navigation -->
    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

</div>
</div>
</div>
</div>
</div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>And receive coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="{{route('store.newslater')}}" method="post" class="newsletter_form">
                                @csrf
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
                                <button class="newsletter_button" type="submit">Subscribe</button>
                            </form>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

@endsection