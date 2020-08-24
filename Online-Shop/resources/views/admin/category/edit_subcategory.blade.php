@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sub Category Update</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub Category Update</h6>
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

          <form action="{{url('update/subcategory/'.$subcat->id)}}" method="post">
          @csrf
          <div class="modal-body pd-20">

           <div class="form-group">
             <label for="exampleInputCategory">Sub Category Name</label>
              <input type="text" class="form-control" name="subcategory_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{( $subcat->subcategory_name )}}" >
           </div>


           <div class="form-group">
               <label for="exampleInputCategory">Category</label>
               <select class="form-control" name="category_id">
               	@foreach($category as $row)
               	<option value="{{ $row->id }}"
               		<?php if( $row->id==$subcat->category_id){


               			echo "selected";



               		}?> >{{( $row->category_name)}}</option>
               		
               	@endforeach
               </select>
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
