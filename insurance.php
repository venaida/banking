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
      <title>Banking Insurance</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="NobleCityFinance Bank" name="description" />
      <meta content="NobleCityFinance Bank" name="author" />
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
                                    <h4 class="mb-sm-0 font-size-18">Insurance</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Insurance.</li>
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
                                          
                                        
                                        <h5 class="card-title">Insurance.</h5>
                                        <p class="card-title-desc">Insurance Application Form</p>
                                        
                <?php
  $successMessage = ''; // Variable to hold the success message
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Form submitted, display a success message
      $successMessage = '<div class="alert alert-success" role="alert">
                            Thank you for your mortgage application! We will notify you soon.
                         </div>';
  }
  ?>

  <?php echo $successMessage; ?> <!-- Display the success message -->
                                          
										  <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter first name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter last name" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="mt-2" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="mt-2" for="age">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter age" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="mt-2" for="gender">Gender</label>
                        <select class="form-control" id="gender">
                            <option>Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="mt-2" for="insuranceType">Insurance Type</label>
                        <select class="form-control" id="insuranceType">
                            <option>Select</option>
                            <option>Health</option>
                            <option>Life</option>
                            <option>Auto</option>
                            <option>Home</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="mt-2" for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="mt-2" for="city">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter city" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="mt-2" for="zipcode">Zip Code</label>
                        <input type="text" class="form-control" id="zipcode" placeholder="Enter zip code" required>
                    </div>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-4">Submit application.</button>
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