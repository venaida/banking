<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

$msg = 0;

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
}

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$result = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);


if(isset($_POST['uploadbtn'])) {
    $product_img1=$_FILES['product_img1']['name'];
    $tmp_name1=$_FILES['product_img1']['tmp_name'];
    move_uploaded_file($tmp_name1, "assets/images/users/$product_img1");
    
    mysql_query("UPDATE customers SET image='$product_img1' WHERE customerid='$_SESSION[customerid]'");
    $msg = 1;
    
    echo "<script> window.open('dashboard.php','_self')  </script>";
}


?>

    <body data-sidebar="dark">

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
                                    <h4 class="mb-sm-0 font-size-18">Profile Image </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">Upload Image</li>
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
                                        <h5 class="card-title">Profile Image</h5>
                                         
                                          <?php if($msg == '1') {
                                            
                                            echo '<div class="alert alert-success"> Profile Image Uploaded Successfully ! </div>';
                                            
                                            } ?>
                                        
										
										
										<form method="POST" action=""  enctype="multipart/form-data" > 
                                                    
                                                    <div class="mb-3">
                                                          <label> Choose Image </label>
                                                          <input type="file" required name="product_img1" id="product_img1" class="form-control">
                                                        
                                                        </div>
                                                        
                                                        
                                        	        
                                        	        
                                        	        <button type="submit" class="btn btn-light waves-effect waves-light w-sm" name="uploadbtn" id="uploadbtn">
                                                            <i class="mdi mdi-upload d-block font-size-16"></i> Upload
                                                        </button>
                                        	      
                                        	      
                                        	      
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
   <!-- apexcharts -->
   <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
   <!-- dashboard init -->
   <script src="assets/js/pages/dashboard.init.js"></script>
   <!-- App js -->
   <script src="assets/js/app.js"></script>
   
   <script src="assets/libs2/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="assets/node_modules/libs2/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/libs2/custom/data-table.js"></script>
    
