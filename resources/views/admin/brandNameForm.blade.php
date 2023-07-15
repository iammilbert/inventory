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
            <b>New Brand Name form..</b>
            </h3>
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form method="POST" action="" class="border shadow">
              <div class="box-body">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" class="form-control" name="name">
                </div>
                 
                 <div class="form-group">
                  <label>Product Description</label>
                  <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                       <input type="submit" class="btn btn-primary" name="submit" value="Register">
                      <a href="{{url('admin.dashboard')}}" class="btn btn-danger">Cancel</a>
              </div>
              </div>
              <!-- /.box-body -->
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
