@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Category Update</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post Category Update</h6>
        <div class="table-wrapper">
          


        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{url('update/postcategory/'.$post_cat->id)}}" method="post">
          @csrf
          <div class="modal-body pd-20">

           <div class="form-group">
             <label for="exampleInputCategory">Post Category Name (English)</label>
              <input type="text" class="form-control" name="category_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{( $post_cat->category_name_en )}}" >
           </div>


           <div class="form-group">
             <label for="exampleInputCategory">Post Category Name (Bangla)</label>
              <input type="text" class="form-control" name="category_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{( $post_cat->category_name_bn )}}" >
           </div>
         
         </div><!-- modal-body -->
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-info pd-x-20">Update</button>
            </div>
          </form>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
  </div><!-- table-wrapper -->
</div><!-- card -->





      


@endsection
