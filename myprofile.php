<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");


if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$dts = date("Y-m-d h:i:s");
mysql_query("UPDATE customers SET lastlogin='$dts' WHERE customerid='$_SESSION[customerid]'");
$sqlq = mysql_query("select * from transaction where paymentstat='Pending'");
$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

while($arrow = mysql_fetch_array($results))
{
	$acno = $arrow[accno];
	$status = $arrow[accstatus];	
	$accopen = $arrow[accopendate];	
	$acctype = $arrow[accounttype];	
	$accbal = $arrow[accountbalance];
	$email = $arrow[email];
	$phone = $arrow[phone];
	$gender = $arrow[gender];
	$dob = $arrow[dob];
}

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$result = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);
?>

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
                                    <h4 class="mb-sm-0 font-size-18">Profile  </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">My Profile</li>
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
                                        <h5 class="card-title">Account Holder's Overview</h5>
                                         <div class="mb-3"></div>
                                          <div class="row">
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-face-shimmer"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Holder</h6>
                                                        <p class="text-muted mb-2"><?php echo $_SESSION[customername]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-email-check-outline"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Holder's Email</h6>
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[email]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-phone-alert-outline"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Holders's Phone</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[phone]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-calendar-end"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Opening</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $accopen ; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-lock-open-minus-outline"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Status</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[accstatus]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-map-marker-check-outline"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Holder's Country</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[country]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-table-account"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Account Number</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $acno ; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-bank-minus"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Bank Branch Code</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[ifsccode]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-login"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Last Login</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[lastlogin]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-4">
                                                        <h1 class="fw-medium display-4 mb-0"><i class="mdi mdi-gender-male-female"></i></h1>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Gender</h6>
                                                        
                                                        
                                                        <p class="text-muted mb-2"><?php echo $rowrec[gender]; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
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


        <!-- Right bar overlay-->
        

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    
