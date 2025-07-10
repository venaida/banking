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
      <title>General FInancial Advice</title>
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
                                    <h4 class="mb-sm-0 font-size-18">General Financial Advice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Financial Advice.</li>
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
                                        <h4 class="card-title mb-0">Overall Financial Guidance</h4>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14">Financial Advice.</h5>
                                                    <p class="card-title-desc">Guidance for managing money, investing wisely, and securing financial goals.</p>

                                                    <div class="accordion" id="accordionExample">
                                                        <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Should I create a budget?
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Yes, creating and sticking to a budget helps manage expenses, save more effectively, and achieve financial goals.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            What's the importance of an emergency fund?
        </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">An emergency fund provides a safety net for unexpected expenses. Aim for 3-6 months' worth of living expenses saved.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Is it wise to pay off high-interest debt first?
        </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Absolutely. High-interest debt like credit cards can accumulate rapidly. Focus on paying it off to save money on interest.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Should I invest in my retirement early?
        </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Yes, the earlier you start investing for retirement, the more time your money has to grow due to compounding interest.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Is it advisable to diversify investments?
        </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Yes, diversification helps spread risk. Invest across different asset classes to reduce vulnerability to market fluctuations.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            What's the significance of reviewing financial statements?
        </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Regularly reviewing statements helps track spending patterns, identify errors, and maintain financial awareness.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingSeven">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Is having insurance important?
        </button>
    </h2>
    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Yes, insurance protects against unforeseen events that could otherwise result in financial hardship.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingEight">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
            Should I negotiate for better rates or prices?
        </button>
    </h2>
    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Absolutely. Negotiating can save money on everything from interest rates on loans to the price of goods and services.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingNine">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
            What's the value of continuous financial education?
        </button>
    </h2>
    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Continuous learning about personal finance enables better decision-making and adapting to changing economic conditions.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingTen">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
            Is estate planning essential?
        </button>
    </h2>
    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Yes, it ensures your assets are distributed according to your wishes and can minimize taxes for your heirs.</strong>
        </div>
    </div>
</div>
                                                        
                                                    </div>
                                                    <!-- end accordion -->
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-xl-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14">Investment Advice</h5>
                                                    <p class="card-title-desc">Expert guidance for successful investing decisions.</p>

                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                        <div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingOne">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseOne" aria-expanded="false" aria-controls="investmentCollapseOne">
            How important is research before investing?
        </button>
    </h2>
    <div id="investmentCollapseOne" class="accordion-collapse collapse" aria-labelledby="investmentHeadingOne" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Research is crucial before investing. Understanding the market and investment options helps make informed decisions.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingTwo">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseTwo" aria-expanded="false" aria-controls="investmentCollapseTwo">
            Should I invest in stocks or bonds?
        </button>
    </h2>
    <div id="investmentCollapseTwo" class="accordion-collapse collapse" aria-labelledby="investmentHeadingTwo" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Both can play a role in a diversified portfolio. Stocks offer growth potential, while bonds offer stability and income.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingThree">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseThree" aria-expanded="false" aria-controls="investmentCollapseThree">
            Is it wise to invest in index funds?
        </button>
    </h2>
    <div id="investmentCollapseThree" class="accordion-collapse collapse" aria-labelledby="investmentHeadingThree" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Index funds can be a good choice due to their low fees and broad market exposure, suitable for long-term investing.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingFour">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseFour" aria-expanded="false" aria-controls="investmentCollapseFour">
            What's the significance of a long-term investment strategy?
        </button>
    </h2>
    <div id="investmentCollapseFour" class="accordion-collapse collapse" aria-labelledby="investmentHeadingFour" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Long-term strategies often outperform short-term moves. Patience allows investments to grow and ride out market volatility.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingFive">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseFive" aria-expanded="false" aria-controls="investmentCollapseFive">
            Should I consider a financial advisor?
        </button>
    </h2>
    <div id="investmentCollapseFive" class="accordion-collapse collapse" aria-labelledby="investmentHeadingFive" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">If unsure about investing, a financial advisor can provide personalized guidance and expertise.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingSix">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseSix" aria-expanded="false" aria-controls="investmentCollapseSix">
            Is it advisable to reinvest dividends?
        </button>
    </h2>
    <div id="investmentCollapseSix" class="accordion-collapse collapse" aria-labelledby="investmentHeadingSix" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Reinvesting dividends can accelerate investment growth by leveraging the power of compounding.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingSeven">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseSeven" aria-expanded="false" aria-controls="investmentCollapseSeven">
            What's the role of risk tolerance in investing?
        </button>
    </h2>
    <div id="investmentCollapseSeven" class="accordion-collapse collapse" aria-labelledby="investmentHeadingSeven" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Understanding your risk tolerance helps choose investments aligned with your comfort level, preventing panic selling during market downturns.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingEight">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseEight" aria-expanded="false" aria-controls="investmentCollapseEight">
            Should I focus on passive or active investing?
        </button>
    </h2>
    <div id="investmentCollapseEight" class="accordion-collapse collapse" aria-labelledby="investmentHeadingEight" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Both strategies have merits. Passive investing (like index funds) offers lower fees, while active investing involves trying to beat the market.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingNine">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseNine" aria-expanded="false" aria-controls="investmentCollapseNine">
            How important is portfolio rebalancing?
        </button>
    </h2>
    <div id="investmentCollapseNine" class="accordion-collapse collapse" aria-labelledby="investmentHeadingNine" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Rebalancing ensures your portfolio stays aligned with your investment goals, reducing risk from overexposure to certain assets.</strong>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header" id="investmentHeadingTen">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#investmentCollapseTen" aria-expanded="false" aria-controls="investmentCollapseTen">
            Is it advisable to invest in real estate?
        </button>
    </h2>
    <div id="investmentCollapseTen" class="accordion-collapse collapse" aria-labelledby="investmentHeadingTen" data-bs-parent="#investmentAccordion">
        <div class="accordion-body">
            <strong class="text-body-emphasis">Real estate can diversify a portfolio and offer potential for long-term growth, but it requires research and understanding of market dynamics.</strong>
        </div>
    </div>
</div>
                                                      </div>
                                                    <!-- end accordion -->
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
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

		
    </body>
<html>