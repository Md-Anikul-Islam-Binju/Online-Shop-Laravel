@extends('admin.admin_layouts')
@section('admin_content')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Extra Info Setting Table</h5>

        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Extra Info Forent Setting Table
             <a href="#" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Extra Info Setting</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">SHOP NAME</th>
                  <th class="wd-15p">EMAIL</th>
                  <th class="wd-15p">PHONE</th>
                  <th class="wd-15p">VAT</th>
                  <th class="wd-15p">SHIPPING COST</th>
                  <th class="wd-20p">ACTION</th>
                </tr>
              </thead>

             <tbody>
                @foreach($extrasetting as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->shopname )}}</td>
                  <td>{{( $row->email )}}</td>
                  <td>{{( $row->phone )}}</td> 
                  <td>{{( $row->vat )}}</td>
                  <td>{{( $row->shipping_charge )}}</td>
             
              

                  <td>
                    <a href="{{URL::to('delete/extra/setting/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">***************EXTRA SETTING INFO ADD ***************</h6>
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

             <form action="{{route('store.extrasetting')}}" method="post">
             @csrf
             <div class="modal-body pd-20">


             <div class="form-group">
               <label for="exampleInputCategory">Shop Name</label>
                <input type="text" class="form-control" name="shopname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Shop Name">
             </div>

             <div class="form-group">
               <label for="exampleInputCategory">Shop Address</label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Shop Address">
             </div>


              <div class="form-group">
               <label for="exampleInputCategory">Shop Email</label>
                <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Shop Email">
             </div>

              <div class="form-group">
               <label for="exampleInputCategory">Shop Phone</label>
                <input type="number" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Shop Phone">
             </div>

             <div class="form-group">
               <label for="exampleInputCategory">VAT</label>
                <input type="number" class="form-control" name="vat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Vat">
             </div>

             <div class="form-group">
               <label for="exampleInputCategory">Shipping Charge</label>
                <input type="number" class="form-control" name="shipping_charge" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="shipping_charge">
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
