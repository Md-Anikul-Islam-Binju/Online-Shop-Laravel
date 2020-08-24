@extends('admin.admin_layouts')

@section('admin_content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Update Product</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product</h6>
          <p class="mg-b-20 mg-sm-b-30">Update Product</p>
          <form action="{{url('update/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{ $product->product_name}}">
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ $product->product_code}}">
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity}}">
                </div>
              </div>


              @php
              $category = DB::table('categories')->get();
              @endphp
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}"

                    
                    <?php if( $row->id==$product->category_id)
                   	{
              			echo "selected";

               		}?>>{{ $row->category_name }}</option>
                    @endforeach 
                  </select>
                </div>
              </div>



              @php
              $subcategory = DB::table('subcategories')->get();
              @endphp
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="subcategory_id">
                  <option label="Choose Sub Category"></option>
                  @foreach($subcategory as $row)
                    <option value="{{ $row->id }}"

                    
                    <?php if( $row->id==$product->subcategory_id)
                   	{
              			echo "selected";

               		}?>>{{ $row->subcategory_name }}</option>
                    @endforeach                             
                 </select>
                </div>
              </div>






              @php
              $brand = DB::table('brands')->get();
              @endphp
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                    <option label="Choose Brand"></option>

                   @foreach($brand as $row)
                   <option value="{{ $row->id }}" 

                   	<?php if( $product->brand_id==$row->id)
                   	{
              			echo "selected";

               		}?>>{{ $row->brand_name }}</option>
                   @endforeach 
                  </select>
                </div>
              </div> 



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" value="{{ $product->product_size}}">
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <input class="form-control lg-4" type="text" name="product_color" data-role="tagsinput" id="color" value="{{ $product->product_color}}">
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price"  placeholder="Selling Price" value="{{ $product->selling_price}}">
                </div>
              </div>



              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price"  placeholder="Discount Price" value="{{ $product->discount_price}}">
                </div>
              </div>



              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                   <textarea class="form-control" rows="10" id="summernote" name="product_details">{{ $product->product_details}}                  	
                   </textarea>
                </div>	
              </div>


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                   <input class="form-control" placeholder="video link" name="video_link" value="{{ $product->video_link}}">
                </div>	
              </div>



              <div class="col-lg-4">
              <lebel>Image One<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="one">
      				</label>
              </div>

              <div class="form-group">
               <label for="exampleInputCategory">Old Image One</label>
                <img src="{{URL::to($product->image_one)}}" style="height: 70px; width: 70;">
                <input type="hidden" name="image_one" value="{{( $product->image_one )}}">
             </div>


              <div class="col-lg-4">
              	<lebel>Image Two <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="two">
      				</label>
              </div>

              <div class="form-group">
               <label for="exampleInputCategory">Old Image Two </label>
                <img src="{{URL::to($product->image_two)}}" style="height: 70px; width: 70;">
                <input type="hidden" name="image_two" value="{{( $product->image_two )}}">
              </div>


              <div class="col-lg-4">
              	<lebel>Image Three <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);" accept="/image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="three">
      				</label>
              </div>


             <div class="form-group">
                <label for="exampleInputCategory">Old Image Three</label>
                <img src="{{URL::to($product->image_three)}}" style="height: 70px; width: 70px;">
                <input type="hidden" name="image_three" value="{{( $product->image_three )}}">
             </div>

            </div>
            <br><hr>




          <div class="row">

            	<div class="col-lg-4">
            		 <label class="ckbox">
					          <input type="checkbox" name="main_slider" value="1" 	
					<?php if( $product->main_slider== 1)
                   	{
              			echo "checked";

               		}?>>
					<span>Main Slider</span>
					</label>
            	</div>



            	<div class="col-lg-4">
            		 <label class="ckbox">
					 <input type="checkbox" name="hot_deal" value="1"
					<?php if( $product->hot_deal== 1)
                   	{
              			echo "checked";

               		}?>>
					<span>Hot Deal</span>
					</label>
            	</div>



            	<div class="col-lg-4">
            		 <label class="ckbox">
					           <input type="checkbox" name="best_rated" value="1"

					           <?php if( $product->best_rated== 1)
                   	 {
              			  echo "checked";

               		   }?>>
					            <span>Best Rated</span>
					      </label>
             </div>



            	<div class="col-lg-4">
            		 <label class="ckbox">
					 <input type="checkbox" name="trend" value="1"
					 <?php if( $product->trend== 1)
                   	 {
              			echo "checked";

               		 }?>>
					<span>Trend Product</span>
					</label>
            	</div>



            	<div class="col-lg-4">
            		 <label class="ckbox">
					 <input type="checkbox" name="mid_slider" value="1">
					 <?php if( $product->mid_slider== 1)
                   	 {
              			echo "checked";

               		 }?>
					 <span>Mid Slider</span>
					 </label>
            	</div>


            	<div class="col-lg-4">
            		<label class="ckbox">
      				<input type="checkbox" name="hot_new" value="1">
      				<?php if( $product->hot_new== 1)
                   	{
              			echo "checked";

               		}?>
      				<span>Hot New</span>
      				</label>
            	</div>



              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="buyone_getone" value="1">
                  <?php if( $product->buyone_getone== 1)
                    {
                    echo "checked";

                  }?>
                  <span>BuyOne GetOne</span>
                </label>
              </div>

          </div>

          <br><br><hr>


          <div class="form-layout-footer">
              <button class="btn btn-success" type="submit">Update</button>
          </div>
          </div>
          </form>
        </div>
       
      </div>
    </div>



    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                           $.each(data, function(key, value){

                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                           });
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

</script>


<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
 

@endsection