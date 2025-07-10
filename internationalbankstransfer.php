<?php
   ob_start();
   session_start();
   error_reporting(0);
   include("../config/theconfig.php");
   include("header.php");
   
   
   
   $result3 = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
         $rowrec3 = mysql_fetch_array($result3);

   // Check if 'pay' button was clicked
   if (isset($_POST['pay'])) {
       $rname = $_POST['rname'];
       $swift = $_POST['swift'];
       $bankadd = $_POST['bankadd'];
       $bank = $_POST['bank'];
       $payamt = $_POST['pay_amt'];
       $acct = $_POST['acctno'];
   }


   $dt = date("Y-m-d h:i:s");
   $custid = mysqli_real_escape_string($con, $_SESSION['customerid']);
   $resultpass = mysqli_query($con, "SELECT * FROM customers WHERE customerid='$custid'");
   $arrpayment1 = mysqli_fetch_array($resultpass);

   if(isset($_POST["pay2"])) {
      
       if($_POST['trpass'] == $arrpayment1['transpassword']) {
           $rr = mysqli_query($con, "SELECT * FROM accounts WHERE customerid ='".$_SESSION['customerid']."'");
           $rrarr = mysqli_fetch_array($rr);
           $amount = $_POST['payamt'];

          
           if ($amount > $rrarr['accountbalance']) {
               echo "<script>window.location = 'internationalsent.php?error=insufficientbalance';</script>";
               exit();
           }

         
           $sql1 = "INSERT INTO transactions (type, paymentdate, payeeid, receiveid, amount, paymentstat) 
                    VALUES ('Transfer', '$dt', '$_SESSION[customerid]', '$_POST[payt]', '$amount', 'active')";
           $sql2 = "INSERT INTO withdrawals (userid, amount, status) 
                    VALUES ('$_SESSION[customerid]', '$amount', '1')";
           $sql3 = "INSERT INTO transfers (sender, receiver, name, bank, amount, status, address, swift) 
                    VALUES ('$_SESSION[customerid]', '$_POST[acct]', '$_POST[name]', '$_POST[bank]', '$amount', '0', '$_POST[addr]', '$_POST[swift]')";
           
           
           mysqli_query($con, "UPDATE accounts SET accountbalance = accountbalance - $amount WHERE customerid ='".$_SESSION['customerid']."'");

          
           if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) && mysqli_query($con, $sql3)) {
               
               $new_count = $arrpayment1['transfer_count'] + 1;
               mysqli_query($con, "UPDATE customers SET transfer_count = $new_count WHERE customerid = '$custid'");
               
             
              echo '
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
   <script>
   document.addEventListener("DOMContentLoaded", function() {
       // Function to launch confetti
       function launchConfetti() {
           var duration = 2 * 1000; // Confetti duration (2 seconds)
           var animationEnd = Date.now() + duration;
           var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 2000 };

           function randomInRange(min, max) {
               return Math.random() * (max - min) + min;
           }

           var interval = setInterval(function() {
               var timeLeft = animationEnd - Date.now();

               if (timeLeft <= 0) {
                   return clearInterval(interval);
               }

               var particleCount = 50 * (timeLeft / duration);
               // Since particles fall down, we start a bit higher than random
               confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.9), y: Math.random() - 0.2 } }));
           }, 250);
       }

       Swal.fire({
           title: "Transfer Successful!",
           html: "<div style=\"font-size: 13px;\">" +
               "<div style=\"text-align: center; font-weight: bold; font-size: 16px;\">" +
                   "Amount: ' . $cur . number_format($amount, 2) . '" +
               "</div>" +
               "<hr>" +
               "<div style=\"display: flex; justify-content: space-between;\">" +
                   "<div><strong>Beneficiary Details:</strong></div>" +
                   "<div>' . $_POST["name"] . '<br/><span style=\'font-size:11px;\'> (Account No: ' . $_POST["acct"] . ')</span></div>" +
               "</div>" +
               "<hr>" +
               "<div style=\"display: flex; justify-content: space-between;\">" +
                   "<div><strong>Sender Details:</strong></div>" +
                   "<div>' . $_SESSION["customername"] . '<br/><span style=\'font-size:11px;\'> (Account No: ' . $rowrec3["accno"] . ')</span></div>" +
               "</div>" +
               "<hr>" +
               "<div style=\"display: flex; justify-content: space-between;\">" +
                   "<div><strong>Paid On:</strong></div>" +
                   "<div>' . $dt . '</div>" +
               "</div>" +
               "<hr>" +
               "<div style=\"display: flex; justify-content: space-between;\">" +
                   "<div><strong>Transaction Reference:</strong></div>" +
                   "<div>TXN' . rand(1000000, 9999999) . '</div>" +
               "</div>" +
               "<hr>" +
               "<div style=\"display: flex; justify-content: space-between;\">" +
                   "<div><strong>Payment Type:</strong></div>" +
                   "<div>Outward Transfer</div>" +
               "</div>" +
               "<hr>" +
               "<div style=\"text-align: center; margin-top: 20px;\">" +
                   "<button onclick=\"window.print();\" style=\"padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;\">Print Receipt</button>" +
               "</div>" +
           "</div>",
           icon: "success",
           confirmButtonText: "OK",
           allowOutsideClick: false,
           willOpen: () => {
               launchConfetti(); // Trigger confetti when the alert is shown
           }
       }).then((value) => {
           window.location = "international.php";
       });
   });
   </script>';



               exit();
           } else {
               die('Error: ' . mysqli_error($con));
           }
       } else {
           // Invalid password
           echo "<script>window.location = 'international.php?error=WrongPassword';</script>";
           exit();
       }
   }
   
   

  
   $percentage = 10;
   $new_amount = ($percentage / 100) * $payamt;
   $cot_amount = (15.5 / 100) * $payamt;
   $imf_amount = (10 / 100) * $payamt;
   $anti_amount = (10 / 100) * $payamt;
   $tax_amount = (4 / 100) * $payamt;

 
   $sql = "SELECT * FROM `customers` WHERE `customerid`='$custid'";
   $run = mysqli_query($con, $sql);
   $row = mysqli_fetch_assoc($run);
   
   
   $transfer_count = $row['transfer_count'];
?>





   
   
  <html lang="en">
   <head>
      <meta charset="utf-8" />
      <title> International Transfer</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="LumptyShore Bank" name="description" />
      <meta content="LumptyShore Bank" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/set.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	  <!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
	  <style>
	     .swal-text {
    font-size: 13px;
		 }
		 
		 .section{
		     margin-top:-80px !important; padding-bottom:0px!important;
		 }
		 
		 span.smaller {
    font-size: 13px !Important;
}
		 .ghostdrop{
		     margin-bottom: -5px !Important;
    margin-top: -10px !Important;
		 }
		 
		 
	 h3.section-form-title{
	 font-weight: 600 !important;
	 }
	  
	  .help-block{
	  font-size:13px;
	  bottom: -22px;
      font-style: italic;
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
                           <h5 class="card-title">Transaction Summary</h5>
                           
                           <?php $payamt = preg_replace('/[^\d]/', '', $payamt) ?>
                           <?php if ($transfer_count < 0): ?>
                         
                           <?php include "trans1.php" ?>
                           <?php else: ?>
                           <?php include "trans2.php" ?>
                           <?php endif; ?>
                        </div>
                        <!-- end card body -->
                     </div>
                     <!-- end card -->
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
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
   <!-- Optional JavaScript -->
   <script src="assets/libs2/node_modules/moment/moment.js"></script>
   <script src="assets/libs2/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Perfect Scrollbar jQuery -->
   <script src="assets//libs2/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
   <!-- /perfect scrollbar jQuery -->
   <!-- masonry script -->
   <script src="assets/libs2/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>
   
   <script src="assets/libs2/custom/functions.js"></script>
   <script src="assets/libs2/custom/customizer.js"></script><!-- Custom JavaScript -->
   <script src="assets/libs2/custom/script.js"></script>
   
   <script src="assets/libs2/custom/sweetalert.min.js"></script>
   <!-- CUstom PLugins -->
   

     
   
   
  </body>
   <html>
       
      
   
   