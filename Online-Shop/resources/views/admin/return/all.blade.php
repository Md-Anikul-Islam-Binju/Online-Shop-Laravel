@extends('admin.admin_layouts')
@section('admin_content')


    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Return Orders List</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Return Orders List</h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Payment Type</th>
                  <th class="wd-15p">Shipping</th>
                  <th class="wd-15p">Total</th>
                  <th class="wd-15p">Date</th>
                  <th class="wd-15p">Return</th>
             <!--      <th class="wd-20p">ACTION</th> -->
                </tr>
              </thead>




              <tbody>
                @foreach($order as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->payment_type )}}</td>
                  <td>{{( $row->shipping )}} Tk</td>
                  <td>{{( $row->total )}} Tk</td>
                  <td>{{( $row->date )}} </td>
                  <td>
                           @if($row->return_order == 1)
                           <span class="badge badge-warning">Pending</span>
                           @elseif($row->return_order == 2)
                           <span class="badge badge-success">Success</span>
                           @endif
                  </td>
                  
            <!--       <td>
                    <span class="badge badge-success">Done</span>
               
                  </td> -->
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->



      


@endsection
