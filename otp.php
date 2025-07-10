<?php 
ob_start();
session_start();
error_reporting(0);
include("../config/theconfig.php");


if (!isset($_SESSION['customerid'])) {
    header("Location: login.php");
    exit(0);
}

if (isset($_SESSION['otp_verified'])) {
    header("Location: dashboard.php"); 
    exit(0);
}


$max_attempts = 3;

if (!isset($_SESSION['otp_attempts'])) {
    $_SESSION['otp_attempts'] = 0;
}

$customerid = $_SESSION['customerid'];
$query = "SELECT firstname, lastname, image FROM customers WHERE customerid='$customerid'";
$result = mysql_query($query);

if (!$result) {
    die("Database query failed: " . mysql_error()); 
}

if (mysql_num_rows($result) == 1) {
    $customer = mysql_fetch_array($result);
    $customerName = $customer['firstname'] . " " . $customer['lastname'];
    // Check if profile image exists, if not use default imagee (avatar-1.jpg)
    $profileImage = !empty($customer['image']) ? $customer['image'] : 'avatar-1.jpg';
} else {
    
    $customerName = "Customer";
    $profileImage = "avatar-1.jpg";
}






// OTP Verification
if (isset($_POST['verify_otp'])) {
   
    if ($_SESSION['otp_attempts'] >= $max_attempts) {
       
        //$new_otp = generateOTP();
        $block_account_query = "UPDATE customers SET accstatus='blocked' WHERE customerid='$customerid'";
        mysql_query($block_account_query);
        $_SESSION['otp_attempts']++; // Increment the attempts
        $_SESSION['account_blocked'] = true;
    } else {
        $otp = mysql_real_escape_string($_POST['otp']); // Sanitize input
        $stored_otp_query = "SELECT otp FROM customers WHERE customerid='$customerid'";
        $otp_result = mysql_query($stored_otp_query);

        if ($otp_result && mysql_num_rows($otp_result) == 1) {
            $row = mysql_fetch_array($otp_result);
            if ($row['otp'] == $otp) {
                // OTP is correct, reset attempts, update OTP, and show success message
                $_SESSION['otp_attempts'] = 0; // Reset attempts
                $_SESSION['otp_verified'] = true; // Set a flag for successful verification
                
                 // Generate a new OTP for the next time
                //$new_otp = generateOTP();
                //$update_otp_query = "UPDATE customers SET otp='$new_otp' WHERE customerid='$customerid'";
                //mysql_query($update_otp_query);
            } else {
                // Invalid OTP, increment attempts and update database
                $_SESSION['otp_attempts']++;
                $update_attempts_query = "UPDATE customers SET attempts = attempts + 1 WHERE customerid='$customerid'";
                mysql_query($update_attempts_query);
                $remaining_attempts = $max_attempts - $_SESSION['otp_attempts'];

                if ($remaining_attempts <= 0) {
                    $_SESSION['last_attempt'] = true; // Set flag for the last attempt
                }

                if ($remaining_attempts > 0) {
                    $error = "Invalid PIN. You have $remaining_attempts attempt(s) left.";
                } else {
                    $error = "Invalid PIN. You have reached the maximum number of attempts.";
                }
            }
        } else {
            $error = "PIN verification failed. Please try again later.";
        }
    }
}

// Handle session destruction on the last attempt alert
if (isset($_GET['destroy_session'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit(0);
}

// Logout (Destroy session if navigating back to login page)
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Verify Account Pin.</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Verify PIN" name="description" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   <body>
      <div class="account-pages my-5 pt-sm-5">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8 col-lg-6 col-xl-5">
                  <div class="card overflow-hidden no-box">
                     <div class="card-body pt-0">
                        <h4 class="p-2 mt-3" style="margin-bottom:-14px; text-align:center;">Account Pin Verification</h4>

                        <!-- Customer Details -->
                        <div class="text-center mt-4">
                           <img src="assets/images/users/<?php echo $profileImage; ?>" alt="Profile" class="rounded-circle" width="90" height="90" style="border: 3px solid #b6922e; padding: 2px; border-radius: 50%;">
                           <h4 class="mt-3"><?php echo $customerName; ?></h4>
                        </div>

                        <!-- OTP Form -->
                        <div class="p-2 mt-4">
                           <?php if (isset($error)): ?>
                           <div class="alert alert-danger">
                              <?php echo $error; ?>
                           </div>
                           <?php endif; ?>
                           <form method="POST">
                              <div class="mb-3">
                                 <label for="otp" class="form-label">Enter your 6 digit account pin.</label>
                                 <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter Account Pin" required>
                              </div>
                              <div class="mt-4 text-end">
                                 <button name="verify_otp" class="btn btn-primary w-xs waves-effect waves-light" type="submit">Verify Pin</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  <!-- Logout button -->
                  <div class="text-center mt-4">
                     <a href="otp.php?logout=true" class="btn btn-danger">Logout</a>
                  </div>

                  <div class="mt-5">
                     <div>
                        <p class="text-center text-md-left"> ©  <script>document.write(new Date().getFullYear())</script> Internet Banking, All Rights Reserved.</p>
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

      <script>
        
         <?php if (isset($_SESSION['account_blocked'])): ?>
            Swal.fire({
                icon: 'error',
                title: 'Account Disabled',
                text: 'Your account has been temporarily disabled due to too many failed PIN attempts.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php'; 
                }
            });
            <?php unset($_SESSION['account_blocked']); // Clear the session flag ?>
         <?php endif; ?>

         // Check if last attempt
         <?php if (isset($_SESSION['last_attempt'])): ?>
            Swal.fire({
                icon: 'error',
                title: 'Last Attempt!',
                text: 'This was your last attempt. You will be redirected to the login page.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'otp.php?destroy_session=true'; 
                }
            });
            <?php unset($_SESSION['last_attempt']); // Clear the session flag ?>
         <?php endif; ?>

         // Check if OTP is verified successfully
         <?php if (isset($_SESSION['otp_verified'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Pin successfully verified.',
                confirmButtonText: 'Login'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'dashboard.php'; 
                }
            });
            <?php unset($_SESSION['otp_verified']); // Clear the session flag ?>
         <?php endif; ?>
      </script>
   </body>
</html>
