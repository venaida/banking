<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');


// Check if the form is submitted
if (isset($_POST['mm'])) {
    // Process the form data

    // Assuming the form processing is successful, set a success message in a variable
    $success_message = "Thank you for your mortgage application!";
    // Redirect to prevent form resubmission with the success message in the URL
    header('Location: mortgage.php?success=' . urlencode($success_message));
    exit(); // Ensure that the script stops execution after redirection
}

?>

<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Mortgage</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Mortgage</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Mortgage.</li>
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
                                          
                                        
                                        <h5 class="card-title">Mortgage.</h5>
                                        <p class="card-title-desc">Mortgage Application Form</p>
                                        
                                        <!-- Display success message if it exists in the URL -->
<?php
  $successMessage = ''; // Variable to hold the success message
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Form submitted, display a success message
      $successMessage = '<div class="alert alert-success" role="alert">
                            Thank you for your mortgage application!
                         </div>';
  }
  ?>

  <?php echo $successMessage; ?> <!-- Display the success message -->
  
                                          
										  <form method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label  class="mt-2"for="inputFirstName">First Name</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter First Name" required>
      </div>
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputLastName">Last Name</label>
        <input type="text" class="form-control" id="inputLastName" placeholder="Enter Last Name" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Enter Email" required>
      </div>
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputPhone">Phone Number</label>
        <input type="tel" class="form-control" id="inputPhone" placeholder="Enter Phone Number" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputLoanAmount">Loan Amount</label>
        <input type="number" class="form-control" id="inputLoanAmount" placeholder="Enter Loan Amount" required>
      </div>
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputAnnualIncome">Annual Income</label>
        <input type="number" class="form-control" id="inputAnnualIncome" placeholder="Enter Annual Income" required>
      </div>
    </div>
    <div class="form-group">
      <label class="mt-2" for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" placeholder="Enter City" required>
      </div>
      <div class="form-group col-md-4">
        <label class="mt-2" for="inputState">State</label>
        <input type="text" id="inputState" class="form-control" required>
         
          <!-- Add options for different states here -->
        
      </div>
      <div class="form-group col-md-2">
        <label class="mt-2" for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip" placeholder="Enter Zip" required>
      </div>
    </div>
    <div class="form-group">
      <label class="mt-2" for="inputPropertyType">Property Type</label>
      <select class="form-control" id="inputPropertyType" required>
        <option selected>Choose...</option>
        <option>House</option>
        <option>Apartment</option>
        <option>Condo</option>
      </select>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputPropertyValue">Estimated Property Value</label>
        <input type="number" class="form-control" id="inputPropertyValue" placeholder="Enter Estimated Property Value" required>
      </div>
      <div class="form-group col-md-6">
        <label  class="mt-2"for="inputDownPayment">Down Payment</label>
        <input type="number" class="form-control" id="inputDownPayment" placeholder="Enter Down Payment" required>
      </div>
    </div>
    <div class="form-group">
      <label class="mt-2" for="inputEmployment">Employment Status</label>
      <select class="form-control" id="inputEmployment" required>
        <option selected>Choose...</option>
        <option>Employed</option>
        <option>Self-Employed</option>
        <option>Unemployed</option>
      </select>
    </div>
    <div class="form-group">
      <label  class="mt-2"for="inputEmployer">Employer</label>
      <input type="text" class="form-control" id="inputEmployer" placeholder="Enter Employer" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mt-2" for="inputWorkYears">Years at Current Job</label>
        <input type="number" class="form-control" id="inputWorkYears" placeholder="Enter Years at Current Job" required>
      </div>
      <div class="form-group col-md-6">
        <label  class="mt-2"for="inputIncomeSource">Main Income Source</label>
        <input type="text" class="form-control" id="inputIncomeSource" placeholder="Enter Main Income Source" required>
      </div>
    </div>
    <div class="form-group mt-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" required>
        <label class="form-check-label" for="gridCheck">
          I agree to the terms and conditions
        </label>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary mt-5">Apply</button>
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