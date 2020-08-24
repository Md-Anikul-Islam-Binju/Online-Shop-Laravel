@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Post</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Post Add</h6>
          <p class="mg-b-20 mg-sm-b-30">New Post add form</p>


          <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">



              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title(English): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  >
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title(Bangla): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  >
                </div>
              </div>



              



              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Post Category Name English: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category Name" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($post_cat as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                    @endforeach 
                  </select>
                </div>
              </div>
           


              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Post Details (English)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" rows="10" name="details_en">
                   	
                   </textarea>
                </div>	
              </div>


               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (Bangla)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" rows="10" name="details_bn">
                    
                   </textarea>
                </div>  
              </div>





              <div class="col-lg-4">
              <lebel>Post Image<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="one">
      				</label>
              </div>
</div>

            



        

          <br><br><hr><br>


          <div class="form-layout-footer">
              <button class="btn btn-success" type="submit">Submit</button>
          </div>
          </div>
          </form>
        </div>
       
      </div>
    </div>


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

 

@endsection