<?php
ob_start();
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where customerid='".$_SESSION['customerid']."'");


 // Assuming you have the transaction details in variables
    $beneficiaryDetails = $_POST['rname'] . " (Account No: " . $_POST['acctno'] . ")";
    $senderDetails = $_SESSION['customername'] . " (Account No: " . $_POST['acct'] . ")";
    $amountTransferred = $_POST['pay_amt']; // Amount entered by the user
    $theReference = "TXN" . rand(1000000, 9999999); // Generate random transaction reference
    $paymentType = "Outward Transfer";
    $paidOn = date("d M Y h:i A"); // Current date and time

?>



<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Ue</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
                                    <h4 class="mb-sm-0 font-size-18">Bank Transfer</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">Bank Transfer</li>
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
                                        <h5 class="card-title">Dear, <?php echo $_SESSION[customername];  ?></h5>
                                        <p class="card-title-desc">Your IP Address: <?php echo $_SERVER['REMOTE_ADDR']; ?> has been logged on our server <br />at <?php echo date("h:i A d M Y"); ?> to monitor money laundering.</p>
                        Please, Ensure to fill in the fields correctly. <br/>
                        
                     

                                        <form id="transferForm" name="form1" method="post" action="internationalbankstransfer.php">
										
										<?php if(isset($_REQUEST['error']))
                 {      if($_REQUEST['error']=='nodetails')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Details Missing or Invalid.<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error']=='WrongPassword')
                            echo "<script>swal('Error!', 'Wrong Password Entered!', 'error').then((value) => {window.location='international.php'})</script>;";
                        else if ($_REQUEST['error'] == 'insufficientbalance')
                            echo "<script>swal('Error!', 'Dear customer upon every international transfer 10% would be charged from you in other to complete transaction contact customer support via email!', 'error').then((value) => {window.location='international.php'})</script>;";
                          else if ($_REQUEST['error'] == 'cot')
                            echo "<script>swal('Error!', 'Wrong COT Code Entered! Dear customer upon every international transfer 10% would be charged from you in other to complete transaction contact customer support via email', 'error').then((value) => {window.location='international.php'})</script>;";
                          else if ($_REQUEST['error'] == 'imf')
                            echo "<script>swal('Error!', 'Wrong IMF Code Entered! Dear customer upon every international transfer 10% would be charged from you in other to complete transaction contact customer support via email', 'error').then((value) => {window.location='international.php'})</script>;";
                            
                         else if ($_REQUEST['error'] == 'accountnotfound')
                            echo "<script>swal('Error!', 'Wrong Account Number. Please Check The Account Number And Try Again!', 'error').then((value) => {window.location='international.php'})</script>;";
                            
                            else if ($_REQUEST['error'] == 'successful')
                            echo '<script>
                            
                            
                            
                            // SweetAlert to show the transfer success message with details
    swal({
        title: "Transfer Successful!",
        html: `
            <div style="font-size: 16px;">
                <!-- Centered and Bold Amount -->
                <div style="text-align: center; font-weight: bold; font-size: 18px;">
                    Amount: ₦<?php echo $amountTransferred; ?>
                </div>
                <hr>

                <!-- Left and Right Aligned Beneficiary Details -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Beneficiary Details:</strong></div>
                    <div><?php echo $beneficiaryDetails; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Sender Details -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Sender Details:</strong></div>
                    <div><?php echo $senderDetails; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Paid On -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Paid On:</strong></div>
                    <div><?php echo $paidOn; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Transaction Reference -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Transaction Reference:</strong></div>
                    <div><?php echo $theReference; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Payment Type -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Payment Type:</strong></div>
                    <div><?php echo $paymentType; ?></div>
                </div>
                <hr>

                <!-- Print Button -->
                <div style="text-align: center; margin-top: 20px;">
                    <button onclick="window.print();" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Print Receipt</button>
                </div>
            </div>
        `,
        icon: "success",
        confirmButtonText: "OK3",
        customClass: {
            container: "swal-text",
        }
    }).then((value) => {
        window.location = "international.php";
    });
                            
                            
                            
                            
                           
                            
                            
                            </script>;
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            ';
                        
                        
                        
                        
                        
                        else
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">".$_REQUEST['error']."</h3>";
                 }
                            ?>
                            <?php if(isset($_REQUEST['success']))
                 {          if ($_REQUEST['success'] == 'successful')
                            echo '<script>
                            
                            // SweetAlert to show the transfer success message with details
    swal({
        title: "Transfer Successful!",
        html: `
            <div style="font-size: 16px;">
                <!-- Centered and Bold Amount -->
                <div style="text-align: center; font-weight: bold; font-size: 18px;">
                    Amount: ₦<?php echo $amountTransferred; ?>
                </div>
                <hr>

                <!-- Left and Right Aligned Beneficiary Details -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Beneficiary Details:</strong></div>
                    <div><?php echo $beneficiaryDetails; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Sender Details -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Sender Details:</strong></div>
                    <div><?php echo $senderDetails; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Paid On -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Paid On:</strong></div>
                    <div><?php echo $paidOn; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Transaction Reference -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Transaction Reference:</strong></div>
                    <div><?php echo $theReference; ?></div>
                </div>
                <hr>

                <!-- Left and Right Aligned Payment Type -->
                <div style="display: flex; justify-content: space-between;">
                    <div><strong>Payment Type:</strong></div>
                    <div><?php echo $paymentType; ?></div>
                </div>
                <hr>

                <!-- Print Button -->
                <div style="text-align: center; margin-top: 20px;">
                    <button onclick="window.print();" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Print Receipt</button>
                </div>
            </div>
        `,
        icon: "success",
        confirmButtonText: "OK3",
        customClass: {
            container: "swal-text",
        }
    }).then((value) => {
        window.location = "international.php";
    });
                            
                            
                            
                            
                           
                            
                            
                            </script>;';
                        
                 }
                            ?>
										
										
										
										
										
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="bank" id="bank" placeholder="Enter Receiver's Bank" required>
                                                <label for="floatingnameInput">Receiver's Bank</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="bankadd" id="bankadd" placeholder="Receiver's Bank Address" required>
                                                        <label for="bankadd">Receiver's Bank Address</label>
                                                    </div>
                                                </div>
												
												<div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="rname" id="ac_no" placeholder="Receiver's Name" required>
                                                        <label for="rname">Receiver's Name</label>
                                                    </div>
                                                </div>
												
												<div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="acctno" id="ac_no" placeholder="Receiver's Bank Account Number" required>
                                                        <label for="acctno">Receiver's Bank Account Number</label>
                                                    </div>
                                                </div>
												
												<div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="swift" id="ac_no" placeholder="Swift/Aba Routing Number" required>
                                                        <label for="swift">Swift/Aba Routing Number</label>
                                                    </div>
                                                </div>
												
												<div class="col-md-6">
                                                     <!-- Input field for amount -->
   <div class="form-floating mb-3">
        <input type="text" class="form-control" min="0" name="pay_amt" id="pay_amt" placeholder="Enter Amount To Transfer" required>
        <label for="pay_amt">Enter Amount To Transfer</label>
        <span id="amountError" class="text-danger"></span> <!-- Error message display area -->
    </div>
                                                </div>
												
												
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="acct" id="ac_no" aria-label="Select Sender's Account">
                                                             <?php  while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='$rowsacc[accno]'>$rowsacc[accno] </option>";
						}
						?>
                                                        </select>
                                                        <label for="acct">Select Sender's Account</label>
                                                    </div>
                                                </div>
                                            </div>
											<h5 class="card-title">Available Balance: <?php
                  
				$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
				$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

			 while($arrow = mysql_fetch_array($results))
			{
			    $availableBalance = $arrow[accountbalance];
				echo $cur.' '.number_format($availableBalance,2);
			
		   }?></h5>
                                            <p class="card-title-desc">Account Balance: <?php
                  
				$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
				$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

			 while($arrow = mysql_fetch_array($results))
			{
				echo $cur.' '.number_format($arrow[accountbalance],2);
			
		   }?></p>
											
                                        
                        
											
											
                                            
                                            <div>
                                                <button type="submit" name="pay" id="pay" class="btn btn-primary w-md">Transfer</button>
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

        <script src="assets/js/app.js"></script>
        
        <script src="assets/libs2/node_modules/sweetalert2/dist/sweetalert2.js"></script>
        <script src="assets/libs2/customizer.js"></script>
        <script src="assets/libs2/script.js"></script>
        <script src="assets/libs2/custom/sweet-alert.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function () {
    $('#pay_amt').on('input', function () {
        var enteredValue = $(this).val().replace(/[^\d,.]/g, '');
        enteredValue = enteredValue.replace(/(,.*),/g, '$1');

        var parsedValue = parseFloat(enteredValue.replace(/,/g, ''));
        var availableBalance = parseFloat(<?php echo $availableBalance; ?>);

        if (!isNaN(parsedValue) && parsedValue <= 0) {
            $('#pay').prop('disabled', true);
            $('#amountError').text('Amount must be greater than 0').show();
        } else if (!isNaN(parsedValue) && parsedValue < 1) {
            $('#pay').prop('disabled', true);
            $('#amountError').text('Minimum amount is 1').show();
        } else if (!isNaN(parsedValue)) {
            var formattedValue = parsedValue.toLocaleString('en-US', {
                maximumFractionDigits: 2
            });

            $(this).val(formattedValue);

            if (parsedValue > availableBalance) {
                $('#pay').prop('disabled', true);
                $('#amountError').text('Entered amount exceeds available balance!').show();
            } else {
                $('#pay').prop('disabled', false);
                $('#amountError').hide();
            }
        } else {
            $('#pay').prop('disabled', true);
            $('#amountError').hide();
        }
    });

    $('#pay_amt').on('change', function () {
        var enteredValue = $(this).val().replace(/[^\d,.]/g, '');
        enteredValue = enteredValue.replace(/(,.*),/g, '$1');

        var parsedValue = parseFloat(enteredValue.replace(/,/g, ''));
        var availableBalance = parseFloat(<?php echo $availableBalance; ?>);

        if (!isNaN(parsedValue) && parsedValue <= availableBalance && parsedValue > 0) {
            $('#pay').prop('disabled', false);
        } else {
            $('#pay').prop('disabled', true);
        }
    });
});
</script>
    </body>
</html>
