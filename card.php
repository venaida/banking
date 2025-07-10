<?php
session_start();
$cardLongDigit = isset($_SESSION['card_long_digit']) ? $_SESSION['card_long_digit'] : '';
error_reporting(0);
include("../config/theconfig.php");
include("header.php");

if (!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>ATM Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="ank" name="description" />
    <meta content="ank" name="author" />
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
        .mycard {
            width: 100%;
            max-width: 350px;
            height: 230px;
            aspect-ratio: 7 / 4;
            border-radius: 15px;
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.8), rgba(74, 96, 115, 0.8)),
                        url('https://www.transparenttextures.com/patterns/dark-mosaic.png');
            color: white;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* Shiny gradient reflection */
        .mycard:before {
            content: "";
            position: absolute;
            top: -100px;
            left: -100px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 60%);
            transform: rotate(45deg);
            z-index: 0;
        }

        /* Chip design */
        .chip {
            width: 50px;
            height: 40px;
            background: url('https://png.pngtree.com/png-vector/20231223/ourmid/pngtree-credit-card-chip-shopping-png-image_11198229.png') no-repeat center center;
            background-size: contain;
            border-radius: 5px;
            position: absolute;
            top: 20px;
            left: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        /* Card details */
        .card-number {
            font-size: 22px;
            letter-spacing: 3px;
            margin-top: 60px;
            z-index: 1;
            position: relative;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
             font-family: 'dm sans';
        }

        /* Embossed effect on text */
        .embossed {
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7), -1px -1px 2px rgba(255, 255, 255, 0.2);
        }

        .card-holder {
            margin-top: 20px;
            font-size: 16px;
            z-index: 1;
            position: relative;
        }

        .expiry-date {
            margin-top: 5px;
            z-index: 1;
            position: relative;
        }

        .bank-name {
               position: absolute;
    bottom: 15px;
    left: 20px;
    font-size: 18px;
    font-weight: bold;
    z-index: 1;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7), -1px -1px 2px rgba(255, 255, 255, 0.2);
}
      

        /* MasterCard logo */
        .mastercard-logo {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 80px;
            z-index: 1;
        }

        /* ATM Logo */
        .atm-logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
            z-index: 1;
            filter: drop-shadow(0px 0px 1px black);
        }
    </style>
</head>

<body data-sidebar="colored">
<div id="preloader"> 
    <div id="status"> 
        <div class="spinner-chase"> 
            <div class="chase-dot"></div> 
            <div class="chase-dot"></div> 
            <div class="chase-dot"></div> 
            <div class="chase-dot"></div> 
            <div class="chase-dot"></div> 
            <div class="chase-dot"></div> 
        </div> 
    </div> 
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- Start right Content here -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Debit Card</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Debit Card</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card" style="display: flex; justify-content: center; align-items: center;">
                            <div class="card-body">
                                <div class="mycard">

<?php
   $results = mysql_query("SELECT * FROM system_settings");

while($arrow = mysql_fetch_array($results))
{
	$bankname=$arrow[bank_name];
	$currency=$arrow[currency];
	$email=$arrow[email];
	$phone=$arrow[phone];
    $status=$arrow[status];
    $theme=$arrow[theme_color];
}


   ?> 
   
 
                                    <div class="chip"></div>
                                    <div class="card-number embossed">
    <?php
    // Check if the card number is set and format it
    if (!empty($cardLongDigit)) {
        // Remove any non-digit characters
        $cardLongDigit = preg_replace('/\D/', '', $cardLongDigit);

        // Display the card number in groups of 4 digits
        echo htmlspecialchars(
            implode(' ', str_split($cardLongDigit, 4))
        );
    }
    ?>
</div>
                                    <div class="card-holder embossed" style="text-transform:capitalize;"><?php echo $_SESSION[customername]; ?></div>
                                    <div class="expiry-date embossed">Valid Thru: <?php echo $_SESSION[valid_thru];?></div>
                                    <div class="bank-name"><? echo $bankname; ?></div>
                                    <img src="lags3.png" class="atm-logo" alt="ATM Logo">
                                    <img src="visaa.png" class="mastercard-logo" alt="MasterCard Logo">
                                </div>
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
</html>
