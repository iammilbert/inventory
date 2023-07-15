@include('/head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
@include('/header')
</header>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  @include('/adminLeftSideBar')
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <div class="box">
            <div class="box-header">
        
              <h3 class="box-title text-right"><b> {{$title}}</b></h3>
              <x-auth-validation-errors class="alert alert-warning" :errors="$errors" />
            @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              {{ session('success') }}
            </div>
            @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-hover table-bordered table-sm table-striped">
                <thead>
                <tr>
                  <th>id</th> 
                  <th>Date</th>
                  <th>Customer name</th>
                  <th>Products</th>
                  <th>Discount</th>
                  <th>Total</th>
                  <th>Method of payment</th>
                  <th>Customer phone</th>
                  <th>Debt balance</th>
                  <!--th>Sold by</th-->
                  <th></th>
                </tr>
                </thead>  
                
                @inject('salesProducts', 'App\Http\Controllers\SaleController')

                <tbody>
                @forelse ($sales as $sale)
                <tr>
                  <td>{{$sale->id}}</td>  
                  <td>{{$sale->created_at}}</td>
                  <td>{{$sale->customer_name}}</td>
                  <td>{{!! $salesProducts::explodeProducts($sale->products) !!}}</td>
                  <td>{{$sale->discount}}</td>
                  <td>{{$sale->total}}</td>
                  <td>{{$sale->method_of_payment}}</td>
                  <td>{{$sale->customer_phone}}</td>
                  <td>{{$sale->debt_balance}}</td>
                  <!--td>{{$sale->reg_by}}</td-->
                  <td>
                    @if (isset($is_held))
                      <a class="btn btn-sm btn-success" href="/admin/held-sales/{{$sale->id}}">Continue <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    @else
                    <a href="#" class='btn btn-sm btn-success'  data-toggle="modal" data-target="#modal-success-product-edit">Reprint <i class='fa fa-check'></i></a>         
                    <a href="#" class='btn btn-sm btn-danger'  ><i class='fa fa-trash'></i>Return receipt</a>
                    @endif
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="11">No sales made yet. Click on <a href="#">new sales</a> to make sales </td>
                </tr>
                @endforelse
                </tbody>
         
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
         <div class="col-md-1"></div>
      </div>
      <!-- /.row -->


      <!-- Modal for View Inventory Report -->
        <div class="modal fade" id="modal-success-product-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: darkcyan;">
                <button style="color: red;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

                <h4 class="text-center" style="font-weight: bolder;">DARL DISTRIBUTORS NIG. LTD<br>Confirm order</h4>
              </div>
              <div class="modal-body">
                <h4 class="text-center" id='product_name1'></h4>
            <form role="form" method="POST" action="{{ route('received.order') }}">
              @csrf
            
              <div class="row">
              <div class="box-body">
                <div class="form-group">
                  <label for="confirmDate">Order confirmation date<b style="color: red">*</b></label>
                  <input type="text" id="order_id" hidden name="order_id" >
                  <input type="text" id="product_name" hidden name="product_name" >
                  <input type="text" id="product_id" hidden name="product_id" >
                  <input type="date" required max="{{date('Y-m-d')}}" class="form-control" name="confirmDate" required>
                </div>
                
                <div class="form-group">
                  <label for="orderQuantity">Quantity received <b style="color: red">*</b></label>
                  <input type="number" class="form-control" name="orderQuantity" id="orderQuantity" value="0">
                </div>

                <div class="form-group">
                  <label for="total">Total (Excluding expenses) <b style="color: red">*</b></label>
                  <input type="number" class="form-control" name="total" id="total" value="0">
                </div>

                <div class="form-group">
                  <label for="discount">Discount from supplier(if any)</label>
                  <input type="number" class="form-control" name="discount" id="discount" value="0">
                </div>

                <div class="form-group">
                  <label for="expenses">Expenses in receiving order(if any)</label>
                  <input type="number" class="form-control" name="expenses" id="expenses" value="0">
                </div>

                <div class="form-group">
                  <label for="comment">How was the expenses incured? (if any expense was incured)</label>
                  <textarea class="form-control" name="comment" id="comment" placeholder="If any expense was incured"></textarea>
                </div>
              </div>
              </div>
         

 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                <button  type="submit" class="btn btn-success">Receive order</button>
              </div>

            </form>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

      <!-- Modal for View Inventory Report -->
          <div class="modal fade" id="modal-success-NewProduct">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color:darkcyan">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Product Registration</b></h4>
              </div>
              <div class="modal-body">

          <!-- after form submission, there should be link to Sale Order Form: Form B -->
            <form  method="POST" action="#">
           
              <div class="row">
              <div class="box-body">
                <div class="form-group">
                  <label>Product Name<b style="color: red">*</b></label>
                  <input type="text" class="form-control" name="sId">
                </div>
                <div class="form-group">
                  <label >Company Name <b style="color: red">*</b></label>
                  <input type="text" class="form-control" name="sname">
                </div>
                  <div class="form-group">
                  <label >Company Address</label>
                  <input type="text" class="form-control" name="sname">
                </div>
                <div class="form-group">
                  <label> Supplier Name <b style="color: red">*</b></label>
                  <input type="phone" class="form-control" name="pCategory">
                </div>
               
                 <div class="form-group">
                  <label>Supplier Phone<b style="color: red">*</b></label>
                  <input type="mobile" minlength="11" class="form-control" name="pCategory">
                </div>
              </div>
              </div>

 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                <button  type="button" class="btn btn-primary">Register</button>
              </div>

            </form>
              </div>
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
    <!-- /.content -->
  </div>
 

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020  - <?php echo date("Y"); ?> <a target="_blank" href="#">Darl Distributors</a>.</strong> All rights
    reserved.
</footer>

  
   <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
  function selectOrder(orderID, productName, total, quantity, productID){
    document.getElementById('order_id').value = orderID
    document.getElementById('total').value = total
    document.getElementById('orderQuantity').value = quantity
    document.getElementById('product_name').value = productName
    document.getElementById('product_id').value = productID
    document.getElementById('product_name1').innerHTML = productName
  }
</script>
<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $(function () {
   //Initialize Select2 Elements
    $('.select2').select2()

})
  $.widget.bridge('uibutton', $.ui.button);

    $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>




  <!-- DataTables -->
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>