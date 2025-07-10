<?php session_start();
   error_reporting(0);
   include("../config/theconfig.php");
   
   include("header.php");
   
   if(!(isset($_SESSION['customerid'])))
       header('Location:login.php?error=nologin');
   
   $dts =  date("l jS \of F Y ");
   mysql_query("UPDATE customers SET lastlogin='$dts' WHERE customerid='$_SESSION[customerid]'");
   $sqlq = mysql_query("select * from transaction where paymentstat='Pending'");
   $mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status=0 ");
   $results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");
   $results2 = mysql_query("SELECT * FROM customers WHERE  customerid='$_SESSION[customerid]'");
   $mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status='New' ");
   $moi = "select '$'+cast($rowrec[accountbalance] as nvarchar) from accounts";
   
   
   if(isset($_POST['deposit']))
   {
   $now=$_POST['mone'];
   mysql_query("UPDATE accounts SET accountbalance =accountbalance+'$now' WHERE customerid ='".$_SESSION['customerid']."'");
   $sql="INSERT INTO loanpayment (customerid,loanid,paidamt,date) VALUES ('$_SESSION[customerid]','$_POST[lid]','$_POST[amt]','$dt')";
   print "
   				<script language='javascript'>
   					window.location = 'dashboard.php';
   				</script>
   			";
   }
   ?>
  
  
  <html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Transfer History</title>
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
   <!-- <body data-layout="horizontal" data-topbar="dark"> -->
   <!-- Begin page -->
   <div id="layout-wrapper">
      
      <!-- Left Sidebar End -->
      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
         <?
            $result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
            $rowrec = mysql_fetch_array($result);?>
         <?
            $result = mysql_query("select * from fixed_deposit WHERE customerid='$_SESSION[customerid]'");
            $rowrec2 = mysql_fetch_array($result);?>
         <div class="page-content">
            <?
               if(isset($_POST['fixed']))
               {
               $query=mysqli_query($con,"insert fixed_deposit (customerid,accno, amount,duration,status) VALUES ('$_SESSION[customerid]','$_POST[act]','$_POST[amount]','$_POST[duration]','1')");
               ?>
            <script>
               swal('Successful!', 'Your Fixed Deposit Account Has Been Created. Your Fixed Deposit Account Number Is $_POST[act]', 'success') 
               
            </script>
            <?}
               ?>
            <div class="container-fluid">
               <!-- start page title -->
               <div class="row">
                  <div class="col-12">
                     <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Transfer History</h4>
                        <div class="page-title-right">
                           <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                              <li class="breadcrumb-item active">Transfer History</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end page title -->
               
               </div>
               <!-- end row -->
              
               <!-- end row -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title mb-4">Latest Transaction</h4>
                           
                           <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                           <style> @media (min-width:900px){.table-responsive{overflow:hidden !Important;}}</style>
                           <div class="">
                              <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable_info" style="width: 1013px;">
                                 <thead class="table-light">
                                    <tr>
                                       <th class="align-middle">Transaction ID</th>
                                       <th class="align-middle">Transaction Date</th>
                                       <th class="align-middle">Account Number</th>
                                       <th class="align-middle">Receivers's Bank</th>
                                       <th class="align-middle">Amount</th>
                                       <th class="align-middle">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    </tr>
                                    <?php
                                       $query="SELECT * FROM transfers where (sender=".$_SESSION['customerid'].") ";
                                       $rectrans=mysql_query($query);
                                       while($recs = mysql_fetch_array($rectrans))
                                       {	
                                       $transid=$recs['id'];
                                       $transdate=$recs['date'];
                                       $receiveid=$recs['receiver'];
                                       $receivebank=$recs['bank'];
                                           $amount=$recs['amount'];
                                           $date=$recs['date'];
                                           $status=$recs['status'];
                                          $blnce =  number_format($amount,2);
                                       		echo "<tr>
                                               	      <td>TRANS$transid</td>
                                               	      <td>$transdate</td>
                                               	     
                                               	      <td>$receiveid</td>
                                               	      <td>$receivebank</td>
                                                         <td>$cur $blnce</td>
                                               	      "; ?>
                                    <td> <span class="badge badge-pill badge-soft-danger font-size-11"><? if ($status=='0') print "Pending";?></span>
                                       <span class="badge badge-pill badge-soft-success font-size-11"><? if ($status=='1') print "Successful";?></span>
                                    </td>
                                    <?}
                                       ?>
                                    </tr>
                                 </tbody>
                              </table>
                              <tr>
                                 <td colspan="2">
                                    <div align="right">
                                       <input type="button" class="btn btn-primary w-xs waves-effect waves-light" value="Print Transaction Detail" onClick="window.print()">
                              </tr>
                              </td></div>
                              </tbody>
                              </table>
                           </div>
                           <!-- end table-responsive -->
                        </div>
                        
                        </div>
                        
                     </div>
                  </div>
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
         <!-- End Page-content -->
         <!-- Transaction Modal -->
         <!-- end modal -->
         <!-- subscribeModal -->
         <!-- end modal -->
         <?php include 'footer.php' ?>
      </div>
      <!-- end main content-->
   </div>
   <!-- END layout-wrapper -->
   <!-- Right Sidebar -->
   
   <!-- /Right-bar -->
   <!-- Right bar overlay-->
   <div class="rightbar-overlay"></div>
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
   
   

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script> 


</body>
</html>