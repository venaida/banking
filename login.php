<?php 
   ob_start();
   session_start();
   error_reporting(0);
   include("../config/theconfig.php");
   


   
   
   $logininfo = '';

   if (isset($_REQUEST['error'])) {
       if ($_REQUEST['error'] == 'nologin') {
           $logininfo = "Please Sign In to Continue";
       } elseif ($_REQUEST['error'] == 'forgetpass') {
           $logininfo = "Please contact the nearest branch";
       }
   }

   if (isset($_SESSION['customerid'])) {
       $otp_query = "SELECT otp_enabled FROM general_settings WHERE id = 1";
       $otp_result = mysql_query($otp_query);
       $otp_row = mysql_fetch_assoc($otp_result);
       if ($otp_row['otp_enabled'] == 1) {
          
           header("Location: otp.php");
           exit(0);
       } else {
           header("Location: dashboard.php");
           exit(0);
       }
   }
   
  

   // Handle login form submission
   if (isset($_REQUEST['login'])) {
       $password = mysql_real_escape_string($_REQUEST['password']);
       $logid = mysql_real_escape_string($_REQUEST['login']);
       $query = "SELECT * FROM customers WHERE email='$logid' AND accpassword='$password'";
       $res = mysql_query($query);

       if (mysql_num_rows($res) == 1) {
           while ($recarr = mysql_fetch_array($res)) {
               $status = $recarr['accstatus'];

               if ($status == 'onreview') {
                   $logininfo = 'Your account is under review.';
               } elseif ($status == 'blocked') {
                   $logininfo = 'Your account is temporarily disabled. Please contact support.';
               } else {
                   $_SESSION['customerid'] = $recarr['customerid'];
                   $_SESSION['ifsccode'] = $recarr['ifsccode'];
                   $_SESSION['customername'] = $recarr['firstname'] . " " . $recarr['lastname'];
                   $_SESSION['loginid'] = $recarr['loginid'];
                   $_SESSION['accstatus'] = $recarr['accstatus'];
                   $_SESSION['accopendate'] = $recarr['accopendate'];
                   $_SESSION['lastlogin'] = $recarr['lastlogin'];
                   $_SESSION['card_long_digit'] = $recarr['card_long_digit'];
                   $_SESSION['valid_thru'] = $recarr['valid_thru'];
                   $_SESSION["loginid"] = $_POST["login"];


                   $otp_query = "SELECT otp_enabled FROM general_settings WHERE id = 1";
                   $otp_result = mysql_query($otp_query);
                   $otp_row = mysql_fetch_assoc($otp_result);

                   if ($otp_row['otp_enabled'] == 1) {

                       header("Location: otp.php");
                       exit(0);
                   } else {
                       
                       header("Location: dashboard.php");
                       exit(0);
                   }
               }

              
               $to_email = $recarr["email"];
               $date = date('m/d/Y h:i:s a', time());

               $subject = 'FEDERAL-BANKING LOGIN ALERT ON ' . $date;
               $message = "Dear " . $_SESSION['customername'] . ",\n\n"
                        . "There was a login attempt on your account on " . $date . ".\n\n"
                        . "If you did not login to your account, kindly contact our Online (24/7 Customer Service) livechat support or send us and email.\n\n"
                        . "Thank you for banking with us.\n\n"
                        . "© 2024 Internet Banking (RC796975). All rights reserved.\n"
                        . "This message and its attachments are for designated recipient(s) only. If received in error, please delete it immediately.";
               
               $headers = "From: Federal Bank<info@federareserve.online>" . "\r\n";
               mail($to_email, $subject, $message, $headers);
           }
       } else {
           $res = mysql_query("SELECT * FROM employees WHERE loginid='$logid' AND password='$password'");
           if (mysql_num_rows($res) == 1) {
               $_SESSION["adminid"] = $_POST["login"];
               header("Location: otp.php");
               exit(0);
           } else {
               $logininfo = "Invalid Username or password entered";
           }
       }
   }
?>


<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Customer Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="in" name="description" />
     
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	  <style>
	     .swal-text {
    font-size: 13px;
		 }
		 .alert-icon {
      margin-right: 10px;
    }
    .alert-content {
      display: flex;
      align-items: center;
    }
	
	.ns{
	width: 100%;
	}
	
	.no-box{
		    box-shadow: none !important;
	}
	
	button.btn.btn-primary.waves-effect.waves-light{
		height: 50px !Important;
    font-size: 16px !Important;
	}
	@media (max-width:767px){
	.alert-dismissible {
    padding-right: 0.75rem !important;
}
}

.alert-dismissible {
    padding-right: 0.75rem;
}
	
	  </style>
   </head>
   <body>
       
       <nav class="navbar navbar-expand-lg navigation fixed-top sticky nav-sticky">
            <div class="container">
                <a class="navbar-logo" href="../../index.php">
                    <img src="lags2.png" alt="" height="31" class="logo logo-dark">
                    <img src="assets/images/logo-light.png" alt="" height="19" class="logo logo-light">
                </a>

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
              
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav ms-auto" id="topnav-menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="../../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../aboutus.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../atmlocations.php">ATM Location</a>
                        </li>
                        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../faq.php">FAQs</a>
                        </li>

                    </ul>

                   <div class="my-2 ms-lg-2">
                        <a href="signup.php" class="btn btn-outline-success w-xs">Create Account</a>
                    </div>
                </div>
            </div>
        </nav>
       
      <div class="account-pages my-5 pt-sm-5">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8 col-lg-6 col-xl-5">
                  <div class="card overflow-hidden no-box">
                     
                     <div class="card-body pt-0">
					 <h2 class="p-2 mt-3" style="margin-bottom:-14px;">Log on to Online Banking.</h2>
					 <?php if ($logininfo): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?php echo $logininfo; ?>',
        });
    </script>
    <?php endif; ?>
								 
                        <div class="p-2 mt-4">
  <div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <div class="alert-content">
      <i class="fas fa-info-circle alert-icon"></i>
      <span>Please enter your email address. If you can't remember your email, select 'Forgotten your password?' below for more help.</span>
    </div>
    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>-->
  </div>
</div>
                        <div class="p-2">
    <form id="multiStepForm" class="needs-validation" method="POST">
        <!-- Step 1: User ID -->
        <div id="step1">
            <div class="mb-3">
                <label for="email-1" class="form-label">Please enter your email address</label>
                <input type="text" class="form-control" id="email-1" name="login" aria-describedby="email-1" placeholder="Enter User ID" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <div class="mt-4 text-end">
               
                <button type="button" class="btn btn-primary waves-effect waves-light w-xs na" onclick="validateEmail()">Continue</button>
            </div>
        </div>

        <!-- Step 2: Password -->
        <div id="step2" style="display: none;">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" name="password" id="password-1" placeholder="Enter password" required>
                    <button class="btn btn-light" type="button" id="password-addon">
                        <i class="mdi mdi-eye-outline"></i>
                    </button>
				 </div>
				 <small class="text-danger">Please ensure your password is entered correctly. Multiple unsuccessful attempts may result in account disablement..</small>
            </div>
            <div class="mt-4 text-end">
                <button name="go" id="go" class="btn btn-primary w-xs waves-effect waves-light na" type="submit">Sign In..</button>
            </div>
            
        </div>
    </form>
</div>
                     </div>
					 
					 <div class="card-body" style="background:#f1f1f1">
					  <p><a href="#" class="contactLink">Forgotten your username?  <i class="text-danger fas fa-angle-right"></i></a></p>
					  <p><a href="signup.php" class="">Not registered for Online Banking ? <i class="text-danger fas fa-angle-right"></i></a> </p>
					 </div>
					 
					 <div class="card-body" style="background:#f8f8fb; padding-left:0px; padding-right:0px;">
					 <div class="row">
					  <div class="col-6">
					  <img src="ss/q2.png" class="ns">
					  </div>
					  
					  <div class="col-6">
					  <img src="ss/q1.png" class="ns">
					  </div>
					  </div>
					 </div>
					 
					 
                  </div>
                  <div class="mt-5">
                     <div>
                        
                        <p>
                          Internet Banking Limited| LLC <b><?= date('Y') ?>. All rights reserved.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- JAVASCRIPT -->
      <script src="assets/libs/jquery/jquery.min.js"></script>
      <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/libs/metismenu/metisMenu.min.js"></script>
      <script src="assets/libs/simplebar/simplebar.min.js"></script>
      <script src="assets/libs/node-waves/waves.min.js"></script>
      <!-- validation init -->
      <script src="assets/js/pages/validation.init.js"></script>
      <!-- App js -->
      <script src="assets/js/app.js"></script>
      <!-- Optional JavaScript -->
      <script src="assets/libs2/node_modules/moment/moment.js"></script>
      <script src="assets/libs2/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Perfect Scrollbar jQuery -->
      <script src="assets//libs2/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
      <!-- /perfect scrollbar jQuery -->
      <!-- masonry script -->
      <script src="assets/libs2/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>

      <script src="assets/libs2/js/functions.js"></script>
      <script src="assets/libs2/js/customizer.js"></script><!-- Custom JavaScript -->
      <script src="assets/libs2/js/script.js"></script>
      <script src="//code.tidio.co/7xji2kxtj94zivuj9zvcfifv7lzekr2y.js" async></script>
	   <!-- JavaScript -->
    <script>
        function validateEmail() {
            var emailField = document.getElementById('email-1');
            var isValidEmail = validateEmailFormat(emailField.value);

            if (isValidEmail) {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            } else {
                emailField.classList.add('is-invalid');
            }
        }

        function validateEmailFormat(email) {
           
            var emailRegex = /\S+@\S+\.\S+/;
            return emailRegex.test(email);
        }
    </script>
	
	<script>
    function validateEmail() {
        var emailField = document.getElementById('email-1');
        var isValidEmail = validateEmailFormat(emailField.value);

        if (isValidEmail) {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        } else {
            emailField.classList.add('is-invalid');
        }
    }

    function validateEmailFormat(email) {
        
        var emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }
</script>
<script>
  
  document.querySelectorAll('.contactLink').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault(); 

     
      Swal.fire({
        title: 'Please contact us via email on this.',
        icon: 'info',
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: 'OK'
      });
    });
  });
</script>
   </body>
</html>