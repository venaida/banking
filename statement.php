<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');


$acc= mysql_query("select * from accounts where accno='$_POST[accno]'");
while($rows = mysql_fetch_array($acc))
{
	$Accountnumber = $rows["accno"];
	$Accountbalance= $rows["accountbalance"];
}
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
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
                        <h4 class="mb-sm-0 font-size-18">Statement Of Account</h4>
                        <div class="page-title-right">
                           <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                              <li class="breadcrumb-item active">Statement Of Account</li>
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
                           
                           <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                           <div class="table-responsive">

<table id="data-table" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable_info"> <div class="row">
<thead class="table-light">
      <tr>
												<th>Date</th>
                                                <th>Transaction ID</th>
                                                <th>Account Charges</th>
                                                <th>Withdrawals</th>
                                                <th>Deposits</th>
                                                <th>Withdrawn By</th>
                                                <th>Deposited By</th>
                                                <th>Amount</th>
      </tr>
      </thead>
                                            <tbody>
    
    <?php 
       
            $customid=$_SESSION['customerid'];
            $count=1;
            $query="SELECT * FROM transactions WHERE (payeeid='$customid') OR (receiveid='$customid') OR (charged='$customid') ORDER BY UNIX_TIMESTAMP (paymentdate) DESC";
            $result=mysql_query($query);
            while(($arrvar = mysql_fetch_array($result)))
            {
                                    echo " <tr> <td>".$arrvar[paymentdate]."</td> ";
                                
                                     echo"<td>".$arrvar['transactionid']."</td>";
                                    if ($arrvar['payeeid']==$customid)
                                    {   echo "<td> </td><td>$cur$arrvar[amount]</td>";
                                        $q="SELECT * FROM registered_payee WHERE slno='".$arrvar['receiveid']."'";
                                         $r=  mysql_query($q);
                                     
                                     $rarry= mysql_fetch_array($r);
                                     echo "<td> </td><td>$_SESSION[customername];</td>";
                                     echo "<td></td><td>$cur$arrvar[amount]</td> ";
                                    }
                              else if ($arrvar['receiveid']==$customid)
                              {echo "<td> </td><td> </td> <td>$cur$arrvar[amount]</td>";
                                  $r=  mysql_query("SELECT * FROM customers WHERE customerid='".$arrvar['payeeid']."'");
                                     $rarry= mysql_fetch_array($r);
                                       echo "<td> </td><td> $_SESSION[customername]; </td>";
                                       echo "<td> $cur $arrvar[amount] </td> ";
                              }
                              
                               if ($arrvar['charged']==$customid)
                              {echo " <td>$cur $arrvar[amount]</td>";
                                       
                                       echo "<td> </td> <td> </td> <td> </td> <td> </td> <td>$cur$arrvar[amount]</td>";
                              }
                              
            }
        
        
    ?>
       </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Transaction ID</th>
                                                <th>Account Charges</th>
                                                <th>Withdrawals</th>
                                                <th>Deposits</th>
                                                <th>Withdrawn By</th>
                                                <th>Deposited By</th>
                                                <th>Amount</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                           
                           
                           <!-- end table-responsive -->
                        </div>
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