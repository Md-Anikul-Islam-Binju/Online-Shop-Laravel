<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>E-Commerce Admin Panel</title>

    <!-- vendor css -->
    <link href="{{asset('public/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/css/starlight.css')}}">
    <link href="{{asset('public/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">

    
    <!--   use product insert details area -->
<!--     <link href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/starlight.css')}}"> -->


  </head>

  <body>

    @guest
    @else


    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i>E-Commerce</a></div>
    <div class="sl-sideleft">
     
      <div class="sl-sideleft-menu">
        <a href="{{url('admin/home')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->


        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('categories')}}" class="nav-link">Category</a></li>
          <li class="nav-item"><a href="{{route('sub.categories')}}" class="nav-link">Sub Category</a></li>
          <li class="nav-item"><a href="{{route('brands')}}" class="nav-link">Brand</a></li>
        </ul>




        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Coupon</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('coupon')}}" class="nav-link">Coupon</a></li>
        </ul>






        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('add.product')}}" class="nav-link">Add Product</a></li>
          <li class="nav-item"><a href="{{route('all.product')}}" class="nav-link">All Product</a></li>
        </ul>




        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Blog</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('allpostcategory')}}" class="nav-link">Post Category</a></li>
          <li class="nav-item"><a href="{{route('add.blogpost')}}" class="nav-link">Add Post</a></li>
          <li class="nav-item"><a href="{{route('all.blogpost')}}" class="nav-link">All post</a></li>
        </ul>


         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.neworder')}}" class="nav-link">New Order</a></li>
          <li class="nav-item"><a href="{{route('admin.accept.payment')}}" class="nav-link">Accept Order</a></li>
       
          <li class="nav-item"><a href="{{route('admin.progress.payment')}}" class="nav-link">Delevery Progress</a></li>
          <li class="nav-item"><a href="{{route('admin.success.payment')}}" class="nav-link">Delevery Success</a></li>
          <li class="nav-item"><a href="{{route('admin.cancel.order')}}" class="nav-link">Cancel Order</a></li>
        </ul>







        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Report</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('today.order')}}" class="nav-link">Tody Reort</a></li>
          <li class="nav-item"><a href="{{route('today.delevered')}}" class="nav-link">Tody Delevered</a></li>
          <li class="nav-item"><a href="{{route('search.report')}}" class="nav-link">Search Reort</a></li>

        </ul>


         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Return Order</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.return.request')}}" class="nav-link">Return Request</a></li>
          <li class="nav-item"><a href="{{route('admin.all.return')}}" class="nav-link">All Return</a></li>
        </ul>


        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Others</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.newslater')}}" class="nav-link">News Later</a></li>
          <li class="nav-item"><a href="{{route('admin.setting')}}" class="nav-link">Setting</a></li>
          <li class="nav-item"><a href="{{route('admin.extrasetting')}}" class="nav-link">Extra Setting</a></li>
          <li class="nav-item"><a href="{{route('all.contact')}}" class="nav-link">User Massage</a></li>
          <li class="nav-item"><a href="{{route('admin.seo')}}" class="nav-link">Seo Setting</a></li>
        </ul>








        
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->

@php
$admin=DB::table('admins')->first();
@endphp
<div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->


<div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
         
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name">{{ $admin->name }}</span></span>
            <img src="{{URL::to('public/backend/img/img3.jpg')}}" class="wd-32 rounded-circle" alt="">
          </a>
       
             <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i>Admin Account Create</a></li>
                <li><a href="{{ route('admin.password.change')}}"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  


   
    @endguest


    @yield('admin_content')


    <script src="{{asset('public/backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('public/backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/backend/lib/d3/d3.js')}}"></script>
    <script src="{{asset('public/backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('public/backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('public/backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/backend/js/starlight.js')}}"></script>
    <script src="{{asset('public/backend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('public/backend/js/dashboard.js')}}"></script>

    <!-- Use Delete popup   --> 

    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  

      <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Your Data!");
                  }
                });
            });
    </script>




    <!-- Use Category Form Design -->
    <script src="{{asset('public/backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/backend/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('public/backend/lib/datatables/jquery.dataTables.js')}}"></script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>    

  </body>
</html>
