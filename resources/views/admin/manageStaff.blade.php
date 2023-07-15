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

              <h3 class="box-title text-right">Manage staff</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Password</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->role }}</td>
                  <td>{{ $user->password }}</td>
                  <td>

                      <a href="#" onclick="populateForm('{{$user->id}}', '{{$user->name}}', '{{$user->username}}', '{{ $user->role }}', '{{ $user->password }}')" class='btn btn-sm btn-primary' name="delete" data-toggle="modal" data-target="#modal-success-edit"><i class='fa fa-edit'></i></a>

                      <a href="#" class='btn btn-danger' name="delete" data-toggle="modal" data-target="#modal-success" ><i class='fa fa-trash'></i> Delete</a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5">No staff yet. Click on <a href="#">new staff</a> to create staff </td>
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

      <!-- Modal for View confirm Order  -->
        <div class="modal fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: darkcyan;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

                <h4 class="text-center" style="font-weight: bolder;">DARL DISTRIBUTORS<br>NIG. LTD<br>Wholesales and Retail</h4>

              </div>
              <div class="modal-body">
               <form role="form" class="form">
                <div class="row fixed">
                  <div class="col-md-6">

                        <label>Sale by: </label> Joseph<br>
                        <label>receipt No.: </label> 01995<br>
                        <label>Date.: </label> 07/27/1995

                  </div>

                   <div class="col-md-6">

                        <label>Customer: </label> Jetstream Limited <br>
                        <label>Delivery Type: </label> Personal <br>
                        <label>Mobile.: </label> 08188701995

                  </div>

                </div>

               </form>
               <table class="table">


                <tr>
                  <th>DESCRIPTION</th>
                  <th>QTY</th>
                  <th>PRICE</th>
                  <th>DISCOUNT</th>
                  <th>AMOUNT</th>
                </tr>

                 <tr>
                  <th>Semovita 2kg</th>
                  <th>2</th>
                  <th>350</th>
                  <th>-</th>
                  <th>700</th>
                </tr>

              </table>

              </div>
              <div class="modal-footer">
                <button style="background-color: red;" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>

                <button style="background-color: darkred;"  type="button" class="btn btn-outline pull-center" data-toggle="modal" data-target="#modal-success-edit">Edit</button>

                <button style="background-color: darkcyan;"  type="button" class="btn btn-outline pull-center">Print</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal for View Inventory Report -->
        <div class="modal fade" id="modal-success-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: darkcyan;">
                        <button style="color: red;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>

                        <h4 class="text-center" style="font-weight: bolder;">{{$settings->business_name ?? 'INVENTORY'}}<br>Editing User Information</h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" method="POST" action="{{ route('inventory.edit') }}">
                            @csrf
                            <div class="row">
                                <div class="box-body">
                                    <div class="form-group">
                                        <h3 class="text-center" id="id"></h3>
                                    </div>
                                    <div class="form-group">
                                        <label >User name</label>
                                        <input type="text" hidden id="id" name="id">
                                        <input type="text" class="form-control" id="username" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label> Name <b style="color: red">*</b></label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>password<b style="color: red">*</b>
                                            <input type="text" class="form-control" name="password" id="password">
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>role<b style="color: red">*</b>
                                            <input type="text" class="form-control" name="role" id="role" >
                                        </label>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                <button  type="submit" class="btn btn-primary">Update</button>
                            </div>
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

<!-- Autocalculation -->
<!-- Custom scripts -->
  <script src="/vendor/auto/scripts.js"></script>




  <!-- DataTables -->
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
