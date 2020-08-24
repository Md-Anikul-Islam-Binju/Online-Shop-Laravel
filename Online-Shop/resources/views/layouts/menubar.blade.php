
        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="main_nav_content d-flex flex-row">

       




       <!-- Categories Menu -->
         @php
         $category=DB::table('categories')->get();
         @endphp
        <div class="cat_menu_container">
            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                <div class="cat_burger"><span></span><span></span><span></span></div>
                <div class="cat_menu_text">categories</div>
            </div>

            <ul class="cat_menu">
                @foreach($category as $row)
                <li class="hassubs">
                    <a href="#">{{$row->category_name}}<i class="fas fa-chevron-right"></i></a>
                    <ul>
                     @php        
                     $subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
                     @endphp
                     @foreach($subcategory as $row)                 
                        <li><a href="{{url('products/'.$row->id)}}">{{$row->subcategory_name}}<i class="fas fa-chevron-right"></i></a></li>
                     @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>







                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">

                                    <li><a href="{{route('blog.post')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{route('admin.contact')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Banner : Main Slider -->
     @php
     $slider=DB::table('products')->join('brands','products.brand_id','brands.id')->select('products.*','brands.brand_name')->where('products.main_slider',1)->where('products.status',1)->orderBy('id','DESC')->first();
     @endphp
    <div class="banner">
        <div class="banner_background" style="background-image:url({{ asset('public/frontend/images/banner_background.jpg') }})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{URL::to($slider->image_one)}}" alt=""></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{$slider->product_name}}</h1>
                        <div class="banner_price">
                            @if($slider->discount_price == NULL)
                               <h2>{{$slider->selling_price}} Tk.</h2>
                            @else
                               <span>{{$slider->selling_price}} Tk.</span>{{$slider->discount_price}} Tk.</div>
                            @endif
                           
                        <div class="banner_product_name">{{$slider->brand_name}}</div>
                        <div class="button banner_button"><a href="">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
