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
   <style>
    .alert-icon {
      margin-right: 10px;
          font-size: 25px;
    }
    .alert-content {
      display: flex;
      align-items: top;
    }
    .alert{
            padding: 0.75rem 1rem !Important;
    }
    /* Custom styles */
    .icon-circle {
      display: flex;
      align-items: center;
      flex-direction: column;
      margin: 0 10px; /* Adjust the spacing between icons */
    }
    .icon-circle i {
      border: 2px solid #b6922e;
      border-radius: 50%;
      padding: 10px;
      font-size: 17px;
      margin-bottom: 7px;
      color:#b6922e;
    }
    .icon-circle p {
      margin: 0;
      font-size:12.4px;
      font-weight:600;
    }
    
    /* Custom CSS for icon background size, etc. */
    .icon {
      width: 60px;
      height: 60px;
      line-height: 60px;
      border-radius: 50%;
    }

    .icon-text {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-top: 10px;
    }

    /* Add more styles as needed */
    @media (max-width: 992px) {
      /* Media query for tablets */
      .icon-text {
        margin-top: 0;
      }
    }
    
    .fw-600{
        font-weight:600;
        margin-top:4px;
    }
    .h34{
        height:40px;
        width:40px;
    }
    a.ama{
        color: #495057;
    }
    
    a.ama:hover{
        color: #b6922e;
    }
    @media (max-width:370px){
        .ub{
        font-size: 11px !important;
    }
    }
    
    @media (max-width:600px){
      .bo3{
            border-right:none !important;
        }
    }
    
    .bo3{
            border-right: 1px #eee solid;
    }
   </style>
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
                
                <?
      $result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
      $rowrec = mysql_fetch_array($result);?>
   <?
      $result = mysql_query("select * from fixed_deposit WHERE customerid='$_SESSION[customerid]'");
      $rowrec2 = mysql_fetch_array($result);?>
                
               
               
               <div class="row d-none d-md-block">
                  <div class="col-12">
                      <div class="alert border border-primary  border-1 alert-dismissible fade show" style="background:#fff; border-left-width: 7px !important; border-radius: 5px; !important;" role="alert">
    <div class="alert-content">
      <i class="bx bx-hash alert-icon text-primary"></i>
     
      <span>
          <strong style="display:block;" class="mb-1">Internet Banking Here to help you succeed.</strong>
          explore LifeSkills for workplace success and boost your online confidence with Digital Eagles.</span>   
    </div>
    
  </div>
                  </div>
               </div>
               
               <!-- start page title -->
               <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-sm-0 font-size-18" style="text-transform:capitalize;">Welcome To Skyboard Finance Bank 👋🏼 </h4>
                <small class="mb-sm-0 font-size-12">Last log in, <?php echo $_SESSION[lastlogin]; ?></small>
            </div>
            <div style="font-weight: 600;">
                <a href="financial.php"> <i class="bx bx-rocket"></i> Get a financial advice.</a>
            </div>
        </div>
    </div>
</div>
               <!-- end page title -->
               
               
               
               <!-- account holder details -->
               <?
         $result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
         $rowrec = mysql_fetch_array($result);?>
      <?
         $result = mysql_query("select * from fixed_deposit WHERE customerid='$_SESSION[customerid]'");
         $rowrec2 = mysql_fetch_array($result);?>
               
               <div class="row">
                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                <?php if(empty($rowrec1['image'])) { ?>
                <img src="assets/images/users/avatar-1.jpg" alt="" style="object-fit:cover" class="avatar-md rounded-circle img-thumbnail" alt="profile photo">
                <?php } else {  ?>
                <img src="assets/images/users/<?php echo $rowrec1['image'] ?>" style="object-fit:cover" alt="" class="avatar-md rounded-circle img-thumbnail" alt="profile photo">
                <?php } ?>	
                                                    </div>
            <div class="flex-grow-1 align-self-center"> 
            <div class="text-muted">
            <h5 class="mb-2" style=" font-family: 'dm sans';"><?php echo $_SESSION[customername]; ?>,<?php echo $rowrec[accounttype]; ?> <b>A/C</b> <i class="bx bx-chevron-right"></i></h5>
           <small class="mb-1 font-size-12" style="font-weight:500; display:block; font-family: 'dm sans';"><b>Account No:</b> <?php echo $rowrec[accno]; ?></small>
            <small class="mb-0 font-size-12" style="font-weight:500; text-decoration:underline;"><a href="#trans">Show recent transactions</a></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
        <div class="col-lg-3 col-6 align-self-center">
        <div class="text-lg-center mt-4 mt-lg-0">
        <div class="row">
        <div class="col-12">
        <div>
                                                                
        <h4 class="mb-0 rubikfont"><?php echo $cur.''.number_format($rowrec[accountbalance],2) ?></h4>
        <small class="font-size-12 text-truncate mb-2" style="font-weight:600;">Avialable Balance</small>
            </div>
        </div>
                                                        
                                                        
         </div>
                    </div>
        </div>
                
    <div class="col-lg-3 col-6">
    <div class="clearfix mt-4 mt-lg-0">
        <div class="dropdown float-end">
            <div class="row">
    <div class="col-4">
        <a href="logout.php" class="text-decoration-none">
            <div class="icon-circle text-center">
                <i class="bx bx-log-out-circle"></i>
                <p class="ub">Signout</p>
            </div>
        </a>
    </div>
    <div class="col-4">
        <a href="international.php" class="text-decoration-none">
            <div class="icon-circle text-center">
                <i class="bx bx-transfer"></i>
                <p class="ub">Transfer</p>
            </div>
        </a>
    </div>
    <div class="col-4">
        <a href="insurance.php" class="text-decoration-none">
            <div class="icon-circle text-center">
                <i class="bx bx-dots-vertical-rounded"></i>
                <p class="ub">More</p>
            </div>
        </a>
    </div>
    <!-- Add more columns for additional icons -->
</div>
        </div>
    </div>
</div>
</div>
<!-- end row -->
            </div>
            </div>
            </div>
        </div>
               
               
               
               <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="d-flex">
                                                    
                                                    <div class="flex-grow-1 align-self-center bo3">
                                                        <div class="text-muted">
                                                            <h5 class="mb-3 text-primary">Help Bank their future with life insurance</h5>
                                                             <div class="row">
                                                            <div class="col-md-6">
            <div class="d-flex">
                <i class="bx bx-check-circle fs-4 me-3"></i>
                <p>It's quick and easy to apply for an Insurance.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex">
                <i class="bx bx-check-circle fs-4 me-3"></i>
                <p>You could get a quote in 2 minutes</p>
            </div>
        </div>
        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
               
            <div class="col-lg-5 align-self-center">
            <div class="text-lg-left mt-4 mt-lg-0">
            <div class="row">
            <div class="col-12">
            <div>
                                                                
            <h5 class="mb-2">T&C's Apply</h5>
            <a href="insurance.php" class="btn btn-primary btn-rounded waves-effect waves-light">Get a quote</a>
                        </div>
            </div>
                                                        
                                 
                   



                                                    </div>
                                                </div>
                                            </div>
                
                                            
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
               
               
               
    <!--end account holder details -->
               
               
    <!-- second phase -->       
    <a href="" class="contactLink2 ama">          
    <div class="row row-cols-2 mb-3 mt-3 mb-md-5 mt-md-3 row-cols-md-5 g-3">
    <div class="col mb-3 d-flex justify-content-center">
      <div class="text-center icon-text" style="border-radius:50px;">
        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
        <span class="avatar-title" style="border-radius: 50px;">
        <i class="bx bx-no-entry font-size-24"></i>
        </span>
        </div>

        <p class="mt-2 fw-600">Report account issues</p>
      </div>
    </div>
    </a>
    
    <!-- Repeat the structure for other icons and texts -->
    <a href="pin.php" class="ama">
    <div class="col mb-3 d-flex justify-content-center">
      <div class="text-center icon-text" style="border-radius:50px;">
        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
        <span class="avatar-title" style="border-radius: 50px;">
        <i class="bx bxs-keyboard font-size-24"></i>
        </span>
        </div>

        <p class="mt-2 fw-600">Set transaction PIN</p>
      </div>
    </div>
    </a>
    
    
    <a href="transferhistory.php" class="ama">
    <div class="col mb-3 d-flex justify-content-center">
      <div class="text-center icon-text" style="border-radius:50px;">
        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
        <span class="avatar-title" style="border-radius: 50px;">
        <i class="bx bx-log-out-circle font-size-24"></i>
        </span>
        </div>

        <p class="mt-2 fw-600">Transfer History</p>
      </div>
    </div>
    </a>
    
    
    <a href="statement.php" class="ama">
    <div class="col mb-3 d-flex justify-content-center">
      <div class="text-center icon-text" style="border-radius:50px;">
        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
        <span class="avatar-title" style="border-radius: 50px;">
        <i class="bx bx-file-find font-size-24"></i>
        </span>
        </div>

        <p class="mt-2 fw-600">Statements and documents</p>

      </div>
    </div>
    </a>
    
    <a href="financial.php" class="ama">
    <div class="col mb-3 d-flex justify-content-center">
      <div class="text-center icon-text" style="border-radius:50px;">
        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
        <span class="avatar-title" style="border-radius: 50px;">
        <i class="bx bx-spreadsheet font-size-24"></i>
        </span>
    </div>
        <p class="mt-2 fw-600">Marketing prefrences.</p>
      </div>
    </div>
    </a>
    <!-- Add more columns as needed for additional icons and texts -->
  </div>

               
               
               
               
               
               
  <div class="row">
  <div class="col-lg-4">
  <div class="card card-body text-center">
   <p><img src="ss/1aa.png" class="h34 text-center"></p>
   <h4 class="card-title">Mortgage Apply Online</h4>
    <p class="card-text">Whether you're buying a new home, remortgaging, or helping your child onto the property ladder, we have a range of mortgages and tools to help.</p>
    <a href="mortgage.php" style="font-weight:600;" class="">Explore mortgages <i class="bx bx-chevron-right" style="vertical-align: middle;"></i></a>
                                </div>
                            </div>
        
    <div class="col-lg-4 ">
    <div class="card card-body text-center">
    <p> <img src="ss/2aa.png" class="h34 text-center"></p>
    <h4 class="card-title">Loans - see personalized rate</h4>
    <p class="card-text">From home improvements to buying a car or consolidating your debts, there are plenty of reasons you might need a loan.</br></p>
<p class="card-text"><strong>Subject to application, financial circumstances and borrowing history..</strong></p>
<a href="#" class="contactLink" style="font-weight:600;">Apply for a loan <i class="bx bx-chevron-right" style="vertical-align: middle;"></i></a>
                                </div>
                            </div>
        
                            <div class="col-lg-4">
                                <div class="card card-body text-center">
                                    <p><img src="ss/3aa.png" class="h34 text-center"></p>
                                     
<h4 class="card-title">Investments</h4>
<p class="card-text">Investing could make your money work harder – manage it yourself with Smart Investor or let our experts do it for you with Plan & Invest.<br/></p>

<p class="card-text"><strong>The value of investments can fall as well as rise. You may not get back what you invest.</strong></p>
                                    <a href="#" class="contactLink" style="font-weight:600;">Start Investment <i class="bx bx-chevron-right" style="vertical-align: middle;"></i></a>
                                </div>
                            </div>
                        </div>
               
               
               <div class="row  mb-3 justify-content-center">
      <div class="col-auto">
        <a href="" id ="" class="btn btn-outline-primary waves-effect waves-light contactLink">Explore our products</a>
      </div>
    </div>     
    <!-- end second phase -->
               
               
               
               
               
                  
                  
     <!-- end row -->
               
               <!-- end row -->
               <div class="row" id="trans">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title mb-4">Last Transaction</h4>
                           <div class="table-responsive">
                              <table class="table align-middle table-nowrap mb-0">
                                 <tbody class="table-hover">
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
                                       $query = "SELECT * FROM transfers WHERE sender = " . $_SESSION['customerid'] . " ORDER BY date DESC";
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
                                 <td colspan="4">
                                    <div align="left" style="margin-top: 20px;">
                                       <input type="button" class="btn btn-primary" value="Print Transaction Detail" onClick="window.print()">
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
   
   <script src="assets/libs2/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="assets/node_modules/libs2/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/libs2/custom/data-table.js"></script>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Initialize the chart data
      const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
      ];
      
      const categories = ['Withdrawal', 'Deposit', 'Other Transactions'];

      const seriesData = categories.map(category => ({
        name: category,
        data: Array.from({ length: 12 }, () => 0) // Fill each category with 0 for all months
      }));

      // Create the ApexCharts instance
      var options = {
        chart: {
          type: 'line',
          height: 250,
          width: '100%',
          toolbar: {
            show: false
          }
        },
        series: seriesData,
        xaxis: {
          categories: months
        },
        yaxis: {
          title: {
            text: 'Amount'
          }
        },
        legend: {
          position: 'top'
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);

      // Render the chart
      chart.render();
    });
  </script>
  
  <script>
  // Function to handle click event on elements with 'contactLink' class
  document.querySelectorAll('.contactLink').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevents the link from navigating

      // Show SweetAlert popup
      Swal.fire({
        title: 'To find our products and how to get started, contact our customer care.',
        icon: 'info',
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: 'OK'
      });
    });
  });
</script>


 <script>
  // Function to handle click event on elements with 'contactLink' class
  document.querySelectorAll('.contactLink2').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevents the link from navigating

      // Show SweetAlert popup
      Swal.fire({
        title: 'contact our customer care.',
        icon: 'info',
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: 'OK'
      });
    });
  });
</script>


	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
</body>
</html>