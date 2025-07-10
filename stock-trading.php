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
      <title>Stock Trading</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Stock Trading</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">Stock Trading.</li>
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
                                          
                                        
                                        <h5 class="card-title">Stock Trading.</h5>
                                        <p class="card-title-desc">Livecoin Charts</p>
                                          
										  <div style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=1313553&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="#" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by #</div></div>
                                         
				
				
                                       
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
						
						<div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                          
                                        <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets.</span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
  {
  "interval": "1m",
  "width": "auto",
  "isTransparent": false,
  "height": "450",
  "symbol": "NASDAQ:AAPL",
  "showIntervalTabs": true,
  "displayMode": "single",
  "locale": "en",
  "colorTheme": "light",
  "largeChartUrl": "http://#"
}
  </script>
</div>
<!-- TradingView Widget END -->
				
                                       
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
							
							<div class="col-md-6">
							    <div class="card">
                                    <div class="card-body">
							<div class="mb-5" style="height:256px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;"><div style="height:236px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=3&pref_coin_id=1505&graph=yes" width="100%" height="232px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="#" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by #</div></div>
							
							<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener nofollow" target="_blank"><span class="blue-text">Foerex Heatmaps</span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-heat-map.js" async>
  {
  "width": "100%",
  "height": "100%",
  "currencies": [
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY",
    "TRY",
    "SEK",
    "NOK"
  ],
  "isTransparent": false,
  "colorTheme": "light",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
							
							</div></div>
							</div>
							
                            <!-- end col -->
                        </div>
						
						
                        
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
  </script>
		
    </body>
<html>