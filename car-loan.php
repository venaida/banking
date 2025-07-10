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
      <title>Car Loan</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Car Loan</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Car Loan.</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
						<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Car Loan</h4>
                                        
                                        <?php
  $successMessage = ''; // Variable to hold the success message
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Form submitted, display a success message
      $successMessage = '<div class="alert alert-danger" role="alert">
                           Error! You do not have permission to proceed at this time; however, you may reach out to customer support for further assistance.
                         </div>';
  }
  ?>

  <?php echo $successMessage; ?> <!-- Display the success message -->
										
										<form id="carLoanForm" method="post" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="fullName">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="fullName" required>
          <div class="invalid-feedback">
            Please enter your full name.
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="mt-2" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <div class="invalid-feedback">
            Please enter a valid email address.
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="mt-2" for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required>
        <div class="invalid-feedback">
          Please enter a valid 10-digit phone number.
        </div>
      </div>
      <div class="form-group">
        <label class="mt-2" for="address">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        <div class="invalid-feedback">
          Please enter your address.
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="mt-2" for="dob">Date of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob" required>
          <div class="invalid-feedback">
            Please enter your date of birth.
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="mt-2" for="employmentStatus">Employment Status</label>
          <select class="form-control" id="employmentStatus" name="employmentStatus" required>
            <option value="" selected disabled>Select Employment Status</option>
            <option value="employed">Employed</option>
            <option value="selfEmployed">Self-Employed</option>
            <option value="unemployed">Unemployed</option>
            <option value="student">Student</option>
          </select>
          <div class="invalid-feedback">
            Please select your employment status.
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="mt-2" for="annualIncome">Annual Income</label>
          <input type="number" class="form-control" id="annualIncome" name="annualIncome" required>
          <div class="invalid-feedback">
            Please enter your annual income.
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="mt-2" for="loanTerm">Loan Term (in years)</label>
          <input type="number" class="form-control" id="loanTerm" name="loanTerm" required>
          <div class="invalid-feedback">
            Please enter the loan term.
          </div>
        </div>
      </div>
      <div class="form-check mt-2">
        <input  type="checkbox" class="form-check-input" id="termsCheck" required>
        <label  class="form-check-label " for="termsCheck">I accept the terms and conditions</label>
        <div class="invalid-feedback">
          You must accept the terms and conditions to proceed.
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

                                        
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
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
      alert('You are not allowed to use this service.');
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

<script>
    (function () {
      'use strict';
      
      var form = document.getElementById('carLoanForm');

      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    })();
  </script>
		
    </body>
<html>