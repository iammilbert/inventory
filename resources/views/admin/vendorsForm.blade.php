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

        <div class="col-md-1"></div>

        <div class="col-md-10">
          
          <h3>
        <b>Register New Supplier/vendor..</b>
      </h3>
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="supplierForm.php">
              <div class="row">
              <div class="box-body">

              <div class="col-md-6">
                <div class="form-group">
                  <label >Full Name <b style="color: red">*</b></label>
                  <input type="text" class="form-control" name="sname">
                </div>
                <div class="form-group">
                  <label>Email <b style="color: red">*</b></label>
                  <input type="text" class="form-control" name="brandName">
                </div>
                <div class="form-group">
                  <label>Telephone <b style="color: red">*</b></label>
                  <input type="phone" class="form-control" name="pCategory">
                </div>
               
                 <div class="form-group">
                  <label>Address<b style="color: red">*</b></label>
                  <textarea class="form-control" name="sAddress" ></textarea>
                </div>
              </div>



              <div class="col-md-6">
                <div class="form-group">
                  <label>City/State <b style="color: red">*</b></label>
                 <select class="form-control select2" style="width: 100%;">
                    <option disabled selected>--Select State--</option>
                    <option value="Abia">Abia</option>
                    <option value="Adamawa">Adamawa</option>
                    <option value="Akwa Ibom">Akwa Ibom</option>
                    <option value="Anambra">Anambra</option>
                    <option value="Bauchi">Bauchi</option>
                    <option value="Bayelsa">Bayelsa</option>
                    <option value="Benue">Benue</option>
                    <option value="Borno">Borno</option>
                    <option value="Cross Rive">Cross River</option>
                    <option value="Delta">Delta</option>
                    <option value="Ebonyi">Ebonyi</option>
                    <option value="Edo">Edo</option>
                    <option value="Ekiti">Ekiti</option>
                    <option value="Enugu">Enugu</option>
                    <option value="FCT">Federal Capital Territory</option>
                    <option value="Gombe">Gombe</option>
                    <option value="Imo">Imo</option>
                    <option value="Jigawa">Jigawa</option>
                    <option value="Kaduna">Kaduna</option>
                    <option value="Kano">Kano</option>
                    <option value="Katsina">Katsina</option>
                    <option value="Kebbi">Kebbi</option>
                    <option value="Kogi">Kogi</option>
                    <option value="Kwara">Kwara</option>
                    <option value="Lagos">Lagos</option>
                    <option value="Nasarawa">Nasarawa</option>
                    <option value="Niger">Niger</option>
                    <option value="Ogun">Ogun</option>
                    <option value="Ondo">Ondo</option>
                    <option value="Osun">Osun</option>
                    <option value="Oyo">Oyo</option>
                    <option value="Plateau">Plateau</option>
                    <option value="Rivers">Rivers</option>
                    <option value="Sokoto">Sokoto</option>
                    <option value="Taraba">Taraba</option>
                    <option value="Yobe">Yobe</option>
                    <option value="Zamfara">Zamfara</option>
                    </select>

                </div>

                 <div class="form-group">
                  <label>Mobile number (Optional)</label>
                  <input type="mobile" class="form-control" name="pName">
                </div>
                
                 <div class="form-group">
                  <label>Address 2 (Optional)</label>
                  <textarea class="form-control" name="sAddress"></textarea>
                </div>
              </div>
              </div>
            </div>


             <div class="row">
              <div class="box-body">

              <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Register">
                <a href="{{url('admin.dashboard')}}" class="btn btn-danger">Cancel</a>
              </div>

              <div class="col-md-6"></div>

              </div>
            </div>
            </form>
          </div>
        </div>

         <div class="col-md-1"></div>

      </div>
    </section>
    <!-- /.content -->
  </div>

@include('/footer')
