@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Table</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post List
             
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Post ID</th>
                  <th class="wd-15p">Category (En)</th>
                  <th class="wd-15p">Category (Bn)</th>
                  <th class="wd-15p">Post Title En</th>
                  <th class="wd-15p">Post Title Bn</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">ACTION</th>

                </tr>
              </thead>




              <tbody>
                @foreach($post as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->category_name_en )}}</td>
                  <td>{{( $row->category_name_bn )}}</td>
                  <td>{{( $row->post_title_en )}}</td>                
                  <td>{{( $row->post_title_bn )}}</td>
                  <td><img src="{{URL::to($row->post_image)}}" style="height: 50px; width: 50px;"></td>
              
            

             
                  <td>
                    <a href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="{{URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>


            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

@endsection
