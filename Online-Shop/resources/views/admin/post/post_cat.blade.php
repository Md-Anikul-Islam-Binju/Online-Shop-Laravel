@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Category Table</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post Category List
             <a href="#" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Post Category </a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">CATEGORY NAME (En)</th>
                  <th class="wd-15p">CATEGORY NAME (Bn)</th>
                  <th class="wd-20p">ACTION</th>
                </tr>
              </thead>




              <tbody>
                @foreach($post_cat as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->category_name_en )}}</td>
                  <td>{{( $row->category_name_bn )}}</td>
                  <td>
                    <a href="{{URL::to('edit/postcategory/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{URL::to('delete/postcategory/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->



     <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">**************************** Post Category Add ****************************</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>



              @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
                  </ul>
                </div>
              @endif

             <form action="{{route('store.postcategory')}}" method="post">
             @csrf
             <div class="modal-body pd-20">

             <div class="form-group">
               <label for="exampleInputCategory">Post Category Name (English)</label>
                <input type="text" class="form-control" name="category_name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category Name English">
             </div>

              <div class="form-group">
               <label for="exampleInputCategory">Post Category Name (Bangla)</label>
                <input type="text" class="form-control" name="category_name_bn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category Name Bangla">
             </div>


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
             </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

      


@endsection
