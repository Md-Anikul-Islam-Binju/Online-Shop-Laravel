@extends('admin.admin_layouts')
@section('admin_content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
      	   
         
          <p class="mg-b-20 mg-sm-b-30">Products Details</p>
         
          <div class="form-layout">
            <div class="row mg-b-25">



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name:</label></br>
                  <strong>{{ $product->product_name }}</strong>
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code:</label></br>
                   <strong>{{ $product->product_code }}</strong>                
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity:</label></br>
                   <strong>{{ $product->product_quantity }}</strong>
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category:</label></br>
                  <strong>{{ $product->category_name }}</strong>
                </div>
              </div>




              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category:</label></br>
                  <strong>{{ $product->subcategory_name }}</strong>
                </div>
              </div>




              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand:</label></br>
                    <strong>{{ $product->brand_name }}</strong>
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size:</label><br>
                   <strong>{{ $product->product_size }}</strong>
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color:</label><br>
                   <strong>{{ $product->product_color }}</strong>
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price:</label><br>
                    <strong>{{ $product->selling_price }}</strong>
                </div>
              </div>


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Price:</label><br>
                    <strong>{{ $product->discount_price }}</strong>
                </div>
              </div>



              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Product Details:</label><br>
                   <strong>{!! $product->product_details !!}</strong>
                </div>	
              </div>


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Video Link:</label><br>
                   <strong>{{ $product->video_link }}</strong>
                </div>	
              </div>



              <div class="col-lg-4">
              <lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel><br>
                 <td><img src="{{URL::to($product->image_one)}}" style="height: 100px; width: 100px;"></td>
              </div>


              <div class="col-lg-4">
              	<lebel>Image Two <span class="tx-danger">*</span></lebel><br>
              	 <td><img src="{{URL::to($product->image_two)}}" style="height: 100px; width: 100px;"></td>
              </div>


              <div class="col-lg-4">
              	<lebel>Image Three <span class="tx-danger">*</span></lebel><br>
              	 <td><img src="{{URL::to($product->image_three)}}" style="height: 100px; width: 100px;"></td>
              </div>

            </div>
            <br><hr>




          <div class="row">

            	<div class="col-lg-4">
                 <span>Main Slider</span><br>
            	 <label class="">
            	 	@if( $product->main_slider == 1)
					 <span class="badge badge-success">Active</span>
					@else
					 <span class="badge badge-danger">Inactive</span>
					@endif   
			      </label>
            	</div>

            	<div class="col-lg-4">
                 <span>Hot Deal</span><br>
            	 <label class="">
            	 	@if( $product->hot_deal == 1)
					 <span class="badge badge-success">Active</span>
					@else
					 <span class="badge badge-danger">Inactive</span>
					@endif   
			      </label>
            	</div>


            	<div class="col-lg-4">
                 <span>Best Rated</span><br>
            	 <label class="">
            	 	@if( $product->best_rated == 1)
					 <span class="badge badge-success">Active</span>
					@else
					 <span class="badge badge-danger">Inactive</span>
					@endif   
			      </label>
            	</div>


            	<div class="col-lg-4">
                 <span>Trend Product</span><br>
            	 <label class="">
            	 	@if( $product->trend == 1)
					 <span class="badge badge-success">Active</span>
					@else
					 <span class="badge badge-danger">Inactive</span>
					@endif   
			      </label>
            	</div>



            	<div class="col-lg-4">
                 <span>Mid Slider</span><br>
            	 <label class="">
            	 	@if( $product->mid_slider == 1)
					 <span class="badge badge-success">Active</span>
					@else
					 <span class="badge badge-danger">Inactive</span>
					@endif   
			      </label>
            	</div>


            	<div class="col-lg-4">
                 <span>Hot New</span><br>
            	 <label class="">
            	 	@if( $product->hot_new == 1)
					 <span class="badge badge-success">Active</span>
					@else
					 <span class="badge badge-danger">Inactive</span>
					@endif   
			      </label>
            	</div>


                    <div class="col-lg-4">
                 <span>Buyone Getone</span><br>
               <label class="">
                @if( $product->buyone_getone == 1)
           <span class="badge badge-success">Active</span>
          @else
           <span class="badge badge-danger">Inactive</span>
          @endif   
            </label>
              </div> 



          </div>
          </form>
        </div>
       
      </div>
    </div>





@endsection