  @include('/head')
</head>
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
        
              <h3 class="box-title text-right"><b style="color:red;"> IMPORTANT</b></h3>
              <ul>
                <li>Click on Add New Product if Product is not Found on the Filter list</li>
                <li>Kindly conduct search after adding new product to ensure product is added</li>
                <li>You can edit/delete any product using the buttons at the right corner</li>
                <li>When adding new product ensure to provide correct details for product, vendor and supply</li>
              </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="text-right">
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-success-NewProduct">Add New Product</a>
              </div>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Name</th>
                   <th>Company Name</th>
                   <th>Company Address</th>
                   <th>Supplier Name</th>
                   <th>Supplier Phone</th>
                    <th>Action</th>
                </tr>
                </thead>  

                <tr>
                  <td>Misc</td>
                  <td>PSP browser</td>
                   <td>PSP browser</td>
                  <td>PSP browser</td>
                  <td>PSP browser</td>
                  <td>   
                    <a href="#" class='btn btn-sm btn-primary' name="delete" data-toggle="modal" data-target="#modal-success-product-edit"><i class='fa fa-edit'></i></a>         
                    <a href="#" class='btn btn-sm btn-danger' name="delete" ><i class='fa fa-trash'></i></a>
                 </td>
                </tr>
         
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

                <h4 class="text-center" style="font-weight: bolder;">DARL DISTRIBUTORS NIG. LTD<br>Editing Product</h4>
              </div>
              <div class="modal-body">
                  
               <form  method="POST" action="#">
           
              <div class="row">
              <div class="box-body">
                <div class="form-group">
                  <label for="pName" >Product Name<b style="color: red">*</b></label>
                  <input type="text" class="form-control" name="pName">
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

                <button  type="button" class="btn btn-primary">Update</button>
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