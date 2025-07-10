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
      <title>QR | Code</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="" name="description" />
      <meta content="" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
       <!-- SweetAlert CSS -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" rel="stylesheet">
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	  <!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@zxing/library@0.0.14/build/zxing.min.js"></script>
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
                                    <h4 class="mb-sm-0 font-size-18">QR</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">QR.</li>
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
                                          
                                        
                                        <h5 class="card-title">QR Payment.</h5>
                                        <p class="card-title-desc">You can generate QR codes for payment from your dashboard..</p>
                                          
										  <form id="qrPaymentForm">
        <div class="form-group">
          <label  for="amount">Please enter amount.</label>
          <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
        </div>
        <div class="form-group mb-3">
          <label class="mt-3" for="description">Payment description.</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" required>
        </div>
        <button type="submit mt-4" class="btn btn-primary">Generate QR</button>
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
		
		<script>
  document.getElementById('qrPaymentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Check if the user is allowed to use the service
    // For example, you might have a condition to check if the user is authorized
    const isAllowed = false; // Change this condition based on your authentication logic

    if (!isAllowed) {
      // Show SweetAlert for not allowed
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'You are not allowed to use this service.'
      });
    } else {
      // Generate QR code logic (Add your QR generation logic here)
      const amount = document.getElementById('amount').value;
      const description = document.getElementById('description').value;
      // Example QR code generation using ZXing library
      const qrCodeData = `Amount: ${amount}, Description: ${description}`;
      const qrCode = new ZXing.QRCodeWriter();
      const qrCodeElement = document.createElement('img');
      qrCodeElement.src = qrCode.write(qrCodeData, 200, 200);
      document.body.appendChild(qrCodeElement);
    }
  });
</script>

		
    </body>
<html>