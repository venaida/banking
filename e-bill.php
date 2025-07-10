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
      <title>Electricity Bill</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Electricity Bill</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">Electricity Bill</li>
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
                                          
                                        
                                        <h5 class="card-title">Pay Electricity Bill</h5>
                                        <p class="card-title-desc"></p>
                                          <div id="successAlert" class="alert alert-danger mt-3" style="display: none;">
      <strong>Error!</strong> Sorry! Kindly contact the support team to proceed with this action.
    </div>
										  <form id="electricityBillForm">
      <!-- Customer Information -->
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter customer name" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address" required>
          </div>
        </div>
      </div>

      <!-- Meter Information -->
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="meterNumber">Meter Number</label>
            <input type="text" class="form-control" id="meterNumber" placeholder="Enter meter number" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="connectionType">Connection Type</label>
            <select class="form-control" id="connectionType" required>
              <option value="residential">Residential</option>
              <option value="commercial">Commercial</option>
              <option value="industrial">Industrial</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="connectionDate">Connection Date</label>
            <input type="date" class="form-control" id="connectionDate" required>
          </div>
        </div>
      </div>

      <!-- Usage Details -->
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="previousReading">Previous Reading (kWh)</label>
            <input type="number" class="form-control" id="previousReading" placeholder="Enter previous reading" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3"  for="currentReading">Current Reading (kWh)</label>
            <input type="number" class="form-control" id="currentReading" placeholder="Enter current reading" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="readingDate">Reading Date</label>
            <input type="date" class="form-control" id="readingDate" required>
          </div>
        </div>
      </div>

      <!-- Billing Information -->
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="rate">Rate (per kWh)</label>
            <input type="number" class="form-control" id="rate" placeholder="Enter rate" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="billingPeriod">Billing Period</label>
            <input type="text" class="form-control" id="billingPeriod" placeholder="Enter billing period" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="mt-3" for="dueDate">Due Date</label>
            <input type="date" class="form-control" id="dueDate" required>
          </div>
        </div>
      </div>

      <!-- Calculate Button -->
      <button type="button" class="btn btn-primary mt-3" onclick="calculateBill()">Calculate Bill</button>

      <!-- Display Bill -->
      <div class="mt-3" id="billResult" style="display: none;">
        <h4>Bill Details</h4>
        <p>Total Units Consumed: <span id="totalUnits"></span> kWh</p>
        <p>Total Amount: $<span id="totalAmount"></span></p>
        
        <!-- Pay Button -->
        <button type="button" class="btn btn-success mt-3" onclick="payBill()" disabled>Pay</button>
        <p class="text-danger">Sorry! Kindly contact the support team to proceed with this action</p>
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
		
		<script>
  function calculateBill() {
    const previousReading = parseFloat(document.getElementById('previousReading').value);
    const currentReading = parseFloat(document.getElementById('currentReading').value);
    const rate = parseFloat(document.getElementById('rate').value);

    const unitsConsumed = currentReading - previousReading;
    const totalAmount = unitsConsumed * rate;

    // Display the calculated bill details
    document.getElementById('totalUnits').innerText = unitsConsumed.toFixed(2);
    document.getElementById('totalAmount').innerText = totalAmount.toFixed(2);
    document.getElementById('billResult').style.display = 'block';

    // Check form validity and enable/disable Pay button
    checkFormValidity();
  }

  function payBill() {
    // Add logic to handle payment here
    // For demonstration purposes, this simulates a successful payment
    // You can replace this with your actual payment processing logic

    // Show success alert
    document.getElementById('successAlert').style.display = 'block';

    // Optionally, you might want to hide the bill details section after successful payment
    document.getElementById('billResult').style.display = 'none';
  }

  function checkFormValidity() {
    const form = document.getElementById('electricityBillForm');
    const isValid = form.checkValidity();

    // Enable or disable Pay button based on form validity
    document.getElementById('payButton').disabled = !isValid;
  }
</script>
		
    </body>
<html>