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

        <div class="col-md-2"></div>

        <div class="col-md-8">
          
          <h3>
         <b>Carriage Outward Data Entering..</b>
      </h3>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5><b><i class="fa fa-info" style="color: red"></i> Carriage Outward</b> : The is the shipping and handling costs incurred when shipping goods to a customer</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="#">
                <div class="box-body">
                <div class="form-group">
                  <label>Date <b style="color: red">*</b></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="datepurchased" type="date" class="form-control">
                </div>
                </div>
                <div class="form-group">
                  <label>Reasons for Charges <b style="color: red">*</b></label>
                  <textarea class="form-control" name="sAddress"></textarea>
                </div>
        
                
                 <div class="form-group">
                  <label>Amount (in Naira) <b style="color: red">*</b></label>
                <input name="amount" type="text" class="form-control">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary">
                <a href="{{url('admin.dashboard')}}" class="btn btn-danger">Cancel</a>

              </div>
            </form>
          </div>
        </div>
         <div class="col-md-2"></div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('/footer')