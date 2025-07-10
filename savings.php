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
      <title>Savings Account</title>
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


    <body data-topbar="light">
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
                                    <h4 class="mb-sm-0 font-size-18">Savings Account</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Savings Account.</li>
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
                                        <h4 class="card-title mb-4">Apply for Savings Account</h4>
                                        
                                        <?php
  $successMessage = ''; // Variable to hold the success message
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Form submitted, display a success message
      $successMessage = '<div class="alert alert-warning" role="alert">
                           Submitted! We will notify you when we have reviewed your request.
                         </div>';
  }
  ?>

  <?php echo $successMessage; ?> <!-- Display the success message -->
										
										<form id="savingsForm" method="post" novalidate>
    <div class="form-group">
      <label for="fullName">Full Name</label>
      <input type="text" class="form-control" id="fullName" name="fullName" required>
      <div class="invalid-feedback">Please enter your full name.</div>
    </div>
    <div class="form-group mt-2">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
      <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <div class="form-group mt-2">
      <label for="phone">Phone Number</label>
      <input type="tel" class="form-control" id="phone" name="phone" required>
      <div class="invalid-feedback">Please enter a valid phone number.</div>
    </div>
    <div class="form-group mt-2">
      <label for="initialDeposit">Initial Deposit Amount</label>
      <input type="number" class="form-control" id="initialDeposit" name="initialDeposit" required>
      <div class="invalid-feedback">Please enter a valid initial deposit amount.</div>
    </div>
    <div class="form-group mt-2">
      <label for="address">Address</label>
      <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
      <div class="invalid-feedback">Please enter your address.</div>
    </div>
    <div class="form-group mt-2">
      <label for="dob">Date of Birth</label>
      <input type="date" class="form-control" id="dob" name="dob" required>
      <div class="invalid-feedback">Please enter your date of birth.</div>
    </div>
    <div class="form-group mt-2">
      <label for="occupation">Occupation</label>
      <input type="text" class="form-control" id="occupation" name="occupation" required>
      <div class="invalid-feedback">Please enter your occupation.</div>
    </div>
    <div class="form-group mt-2">
      <label for="idNumber">ID Number</label>
      <input type="text" class="form-control" id="idNumber" name="idNumber" required>
      <div class="invalid-feedback">Please enter your ID number.</div>
    </div>
    <div class="form-group mt-2">
      <label for="nationality">Nationality</label>
      <input type="text" class="form-control" id="nationality" name="nationality" required>
      <div class="invalid-feedback">Please enter your nationality.</div>
    </div>
    <div class="form-group mt-2">
      <label for="preferredLanguage">Preferred Language</label>
      <select class="form-control" id="preferredLanguage" name="preferredLanguage" required>
        <option value="">Select language</option>
        <option value="English">English</option>
        <option value="Spanish">Spanish</option>
        <option value="French">French</option>
        <option value="Other">Other</option>
      </select>
      <div class="invalid-feedback">Please select your preferred language.</div>
    </div>
    <div class="form-group mt-2">
      <label for="accountType">Account Type</label>
      <select class="form-control" id="accountType" name="accountType" required>
        <option value="">Select account type</option>
        <option value="Savings">Savings</option>
      </select>
      <div class="invalid-feedback">Please select your account type.</div>
    </div>
      <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    <small class="text-danger">Please make sure all inputed values are correct.</small>

                                        
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
      
      var form = document.getElementById('savingsForm');

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