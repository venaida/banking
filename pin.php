<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

?>

<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Update Password</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="" name="description" />
      <meta content="" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	  <script src="assets/libs2/custom/sweetalert.min.js"></script>
	  <style>
	     .swal-text {
    font-size: 13px;
		 }
	  </style>
   </head>


    <body data-sidebar="colored">
<div id="preloader"> <div id="status"> <div class="spinner-chase"> <div class="chase-dot"></div> <div class="chase-dot"></div> <div class="chase-dot"></div> <div class="chase-dot"></div> <div class="chase-dot"></div> <div class="chase-dot"></div> </div> </div> </div>
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
           
            
           
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Transaction Pin</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">Transaction Pin</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
                            

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        
                                        <?

if(isset($_POST["button"]))
{
    if (mysql_real_escape_string($_POST[newpass]) == $_POST[newpass])
    {
mysql_query("UPDATE customers SET transpassword='$_POST[newpass]' WHERE customerid='$_SESSION[customerid]' AND accpassword='$_POST[oldpass]'");
	if(mysql_affected_rows() == 1)
	{
	echo "<script>swal('Succesful!', 'Your new transaction pin has been updated successfully!', 'success').then((value) => {window.location='pin.php'})</script>;";
	}
	else
	{
	echo "<script>swal('error!', 'Transaction Pin update was not successful. Ensure you entered the current transaction pin correctly and the new transaction pin is entered twice correctly!', 'error').then((value) => {window.location='pin.php'})</script>;";
	}
        }
    else
       echo "<script>swal('Error', 'Invalid New PIN!', 'error')</script>;";
}?>

<script>
function validateForm()
{
var x=document.forms["form1"]["loginid"].value;
var y=document.forms["form1"]["oldpass"].value;
var z=document.forms["form1"]["newpass"].value;
var a=document.forms["form1"]["confpass"].value;
if (x==null || x=="")
  {
  swal('Error!', 'All fields are required!', 'error')
  return false;
  }
  if (y==null || y=="")
  {
  swal('Error!', 'Old pin must be entered', 'error')
  return false;
  }
  if (z==null || z=="")
  {
 swal('Error!', 'Please enter the new pin!', 'error')
  return false;
  }
  if (a==null || a=="")
  {
  swal('Error!', 'Confirm new pin!', 'error')
  return false;
  }
  if(!(z==a))
      {
          swal('Error!', 'Confirm pin field does not tally with the new password, please review!', 'error')
          return false;
      }
}
</script>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <h5 class="card-title">Change Transfer Pin</h5>
                                        <p class="card-title-desc"></p>
                                         <form onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
            <?php echo $ctrow; ?>
                                            <div class="mb-3">
                                                <label for="oldpass" class="form-label">Current Transaction Pin</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="oldpass" size="35" class="form-control" id="oldpass" aria-describedby="password-addon" placeholder="Old pin*">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                        </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        
                                                        
                                                        <label for="newpass" class="form-label">Enter New Transaction Pin</label>
                                                        
                                                        <input required name="newpass" type="password" id="text" class="form-control" aria-describedby="password-addon" placeholder="New pin*">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Confirm New Pin</label>
                                                        <a href="javascript:void(0)" class="text-white ml-auto">
                                <i class="icon icon-editors"></i>
                            </a>                        
                                                        <input  class="form-control" required name="confpass" type="password" id="confpass" aria-describedby="password-addon" placeholder="Confirm new pin*">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            
                                            <div>
                                                <button type="submit" name="button" id="button" class="btn btn-primary w-md">Update Password <i class="mdi mdi-account-arrow-right-outline"></i></button>
                                            </div>
                                        </form>

                                        
										
                                            
				
				
				
                                       
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php include 'footer.php' ?>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        
       
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs2/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/app.js"></script>
        
        
        <script src="assets/libs2/node_modules/sweetalert2/dist/sweetalert2.js"></script>
        <script src="assets/libs2/customizer.js"></script>
        <script src="assets/libs2/script.js"></script>
        <script src="assets/libs2/custom/sweet-alert.js"></script>
        <script>
        swal({...}).then(okay => {
  if (okay) {
    window.location.reload();
  }
});
        </script>
    </body>
<html>