<!DOCTYPE html>
<html>
<head>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="{{url('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-2"></div>

        <div class="col-md-8">
           <h3>
      <b>Product Return Form (Customer)</b>
      </h3>
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="#" class="border shadow">
              <div class="box-body">
                <div class="form-group">
                  <label>Product Description <b style="color: red">*</b></label>
                    <select class="form-control select2">
                      <option disabled selected>--Select Description--</option>
                      <option value="Abia">Abia</option>
                    </select>
                </div>
                
                <div class="form-group">
                  <label>Date Returned</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input name="datepurchased" type="date" class="form-control">
                </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Quantity</label>
                  <input type="number" min="1" value="1" class="form-control" name="purchaseDetailsQuantity" id="purchaseDetailsQuantity">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Unit Price</label>
                  <input type="text" class="form-control" id="purchaseDetailsUnitPrice" name="purchaseDetailsUnitPrice">
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">Total</label>
                  <input type="text" class="form-control" name="purchaseDetailsTotal" id="purchaseDetailsTotal">
                </div>
                   <div class="form-group">
                      <label>Reason<b style="color: red">*</b></label>
                      <select class="form-control select2">
                        <option disabled selected>--Select--</option>
                        <option value="Abia">Expired</option>
                        <option value="Zamfara">Damaged</option>
                        <option value="Zamfara">Empty</option>
                        <option value="Abia">Extra</option>
                        <option value="Zamfara">Stolen</option>
                      </select>
                </div>  

                <div class="form-group">
                      <label>Customer Name<b style="color: red">*</b></label>
                      <select class="form-control select2">
                        <option disabled selected>--Select--</option>
                        <option value="Abia">Janeth</option>
                        <option value="Zamfara">Emma</option>
                        <option value="Zamfara">Empty</option>
                        <option value="Abia">Joe</option>
                        <option value="Zamfara">Stephen</option>
                      </select>
                </div>            
              </div>
              <!-- /.box-body -->

             <div class="row">
              <div class="box-body">

              <div class="col-md-6">
                 <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                        <a href="{{url('admin.dashboard')}}" class="btn btn-danger">Cancel</a>
                 </div>
              </div>

              <div class="col-md-6"></div>

              </div>
            </div>
            </form>
          </div>
        </div>

        <div class="col-md-2"></div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@include('/footer')

<!-- Autocalculation -->
<!-- Custom scripts -->
  <script src="/vendor/auto/scripts.js"></script>