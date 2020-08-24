@extends('admin.admin_layouts')
@section('admin_content')


    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Report Orders Details</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Order List</h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Payment Type</th>
                  <th class="wd-15p">Transection Id</th>
                  <th class="wd-15p">Shipping</th>
                  <th class="wd-15p">Total</th>
                  <th class="wd-15p">Date</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">ACTION</th>
                </tr>
              </thead>




              <tbody>
                @foreach($order as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->payment_type )}}</td>
                  <td>{{( $row->blnc_transection )}} </td>
                  <td>{{( $row->shipping )}} Tk</td>
                  <td>{{( $row->total )}} Tk</td>
                  <td>{{( $row->date )}} </td>
                  <td>
                    @if($row->status == 0)
                           <span class="badge badge-warning">Pending</span>
                           @elseif($row->status == 1)
                           <span class="badge badge-info">Payment Accept</span>
                           @elseif($row->status == 2) 
                           <span class="badge badge-info">Progress </span>
                           @elseif($row->status == 3)  
                           <span class="badge badge-success">Delevered </span>
                           @else
                           <span class="badge badge-danger">Cancel </span>
                           @endif
                  </td>
                  
                  <td>
                    <a href="{{URL::to('admin/view/order/'.$row->id)}}" class="btn btn-sm btn-info">View</a>
               
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->



      


@endsection
