<?php
ob_start();
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where customerid='".$_SESSION['customerid']."'");
?>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
           <?php include'header.php' ?>
            
           
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
                                    <h4 class="mb-sm-0 font-size-18">Bank Transfer</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dasboard</a></li>
                                            <li class="breadcrumb-item active">Bank Transfer</li>
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
                                        <h5 class="card-title">Failed Transaction</h5>
                                         

                                        
										
										<!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
                   
                            <!-- Module -->
                            <div class="dt-module">

                                <!-- Module Sidebar -->
                                <div class="dt-module__sidebar">

                                    <!-- Sidebar Header -->
                                    <div class="dt-module__sidebar-header border-bottom">
                                        <div class="d-none d-md-flex align-items-center">
                                            <i class="icon icon-open-mail icon-1x mr-3 text-dark"></i>
                                            <span class="h3 mb-0">Messages</span>
                                        </div>

                                        <!-- App Quick Menu -->
                                        <div class="quick-menu-list d-md-none">

                                            <!-- Search Box -->
                                            <form class="search-box d-md-none">
                                                <input class="form-control" type="search" id="address" name="address"
                                                       placeholder="Search in app...">
                                                <button type="submit" class="search-icon"><i
                                                            class="icon icon-search icon-lg"></i></button>
                                            </form>
                                            <!-- /search box -->

                                            <a href="javascript:void(0)" class="quick-menu d-none d-md-block"
                                               data-toggle="mdrawer" data-target="#drawer-search-bar"><i
                                                        class="icon icon-search"></i></a>
                                            <a href="javascript:void(0)" class="quick-menu" data-open="compose"><i
                                                        class="icon icon-editors"></i></a>
                                            <a href="javascript:void(0)" class="quick-menu" data-toggle="mdrawer"
                                               data-target="#drawer-notifications"><i
                                                        class="icon icon-notification2"></i></a>
                                            <a href="javascript:void(0)" class="quick-menu d-md-none"
                                               data-toggle="msidebar-content"><i class="icon icon-menu"></i></a>
                                        </div>
                                        <!-- /app quick menu -->
                                    </div>
                                    <!-- /sidebar header -->

                                    <!-- Sidebar Menu -->
                                    <div class="dt-module__sidebar-content ps-custom-scrollbar">

                                        <!-- Button -->
                                        <div class="action-area mt-5 mb-7 d-none d-md-block">
                                            <a href="javascript:void(0)"
                                               class="btn btn-shadow btn-default compose-btn btn-rounded"
                                               data-open="compose">
                                                <i class="icon icon-editors icon-fw mr-2"></i>Compose</a>
                                        </div>
                                        <!-- /button -->

                                        <!-- Sidebar Navigation -->
                                        <ul class="dt-module-side-nav">

                                            <!-- Menu Header -->
                                            <li class="dt-module-side-nav__header">
                                                <span class="dt-module-side-nav__text">main</span>
                                            </li>
                                            <!-- /menu header -->

                                            <!-- Menu Item -->
                                            <li class="dt-module-side-nav__item active">
                                                <a href="javascript:void(0)" class="dt-module-side-nav__link">
                                                    <i class="icon icon-inbox icon-fw icon-lg"></i>
                                                    <span class="dt-module-side-nav__text">Inbox</span> </a>
                                            </li>
                                            <!-- /menu item -->

                                            <!-- Menu Item -->
                                            <li class="dt-module-side-nav__item">
                                                <a href="sent.php" class="dt-module-side-nav__link">
                                                    <i class="icon icon-send icon-fw icon-lg"></i>
                                                    <span class="dt-module-side-nav__text">Sent</span> </a>
                                            </li>
                                            <!-- /menu item -->

                                           

                                        </ul>
                                        <!-- /sidebar navigation -->

                                        </div>
                                    <!-- /sidebar Menu -->

                                </div>
                                <!-- /module sidebar -->

                                <!-- Module Container -->
                                <div class="dt-module__container">

                                    <!-- Module Header -->
                                    <div class="dt-module__header d-none d-md-flex">

                                        <!-- Search Box -->
                                        <form class="search-box ml--15">
                                            <input class="form-control border-0 shadow-none bg-focus form-control-sm"
                                                   placeholder="Search in app..." value=""
                                                   type="search"> <span class="search-icon"><i
                                                        class="icon icon-search icon-lg"></i></span>
                                        </form>
                                        <!-- /search box -->

                              

                                    </div>
                                    <!-- /module header -->

                                    <!-- Module Content -->
                                    <div class="dt-module__content ps-custom-scrollbar">

                                        <!-- Module Content Inner -->
                                        <div class="dt-module__content-inner">

                                            <div class="px-1 pb-4 border-bottom border-width-2 mb-1 mt--5">
                                                <!-- Dropdown -->
                                                <div class="dropdown">

                                                   

                                                    <!-- Dropdown Button -->
                                                    <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false"> Inbox </a>
                                                    <!-- /dropdown button -->

                                                  

                                                </div>
                                                <!-- /dropdown -->
                                            </div>

                                            <!-- Module List -->
                                            <div class="dt-module__list">

<?
while($row = mysql_fetch_array($result))
  				{ $rid=$row['senderid'];
                                  if (!($rid=='admin'))
                                  {
                                      $rres=  mysql_query("SELECT * FROM customers WHERE customerid='".$rid."'");
                                      $rresarr = mysql_fetch_array($rres);
                                      $recid = $rresarr['firstname']." ".$rresarr['lastname'];
                                  }
                                  else
                                      $recid=$rid;

                                               echo " <!-- Module Item -->
                                                <div class='dt-module__list-item'>

                                                    
                                                    <div class='dt-checkbox dt-checkbox-icon dt-checkbox-only mr-5'>
                                                        <input id='icon-checkbox-1' type='checkbox'>
                                                        <label class='font-weight-light dt-checkbox-content'
                                                               for='icon-checkbox-1'>
                                                            <span class='unchecked'><i
                                                                        class='icon icon-box-o icon-fw icon-xl'></i></span>
                                                            <span class='checked'><i
                                                                        class='icon icon-box-check-o icon-fw icon-xl text-primary'></i></span>
                                                        </label>
                                                    </div>
                                                    <!-- /checkbox -->
 $row[status]
                                 
                                                    <!-- Checkbox -->
                                                    <div class='dt-checkbox dt-checkbox-icon dt-checkbox-only mr-5'>
                                                        
                                                    </div>
                                                    <!-- /checkbox -->

                                                    <!-- Avatar -->
                                                    <img class='dt-avatar mr-4' src='../assets/images/icon-account.png'
                                                         alt='Reece Jacklin''>
                                                    <!-- /avatar -->

                                                    <!-- Module Content -->
                                                    <div class='dt-module__list-item-content'
                                                         data-location='readmessage.php?mailid=$row[mailid]'>
                                                        <div class='user-detail'>
                                                            <span class='user-name'>$recid</span>
                                                            <span class='dt-separator-v'>&nbsp;</span>
                                                            <span class='designation'>Subject: $row[subject]</span>
                                                        </div>
                                                        <p class='mb-0 text-light-gray text-truncate'>Message ID Number Is $row[mailid]</p>
                                                    </div>
                                                    <!-- /module content -->

                                                    <!-- Module Info -->
                                                    <div class='dt-module__list-item-info'>
                                                        <div class='badge-group'>
                                                           <a href='readmessage.php?mailid=$row[mailid]'> <span class='badge bg-dark-blue text-white'>Read Message</span><?a>
                                                           <a href='inbox.php?mailid=$row[mailid]'> <span class='badge badge-danger'>Delete Message</a></span>
                                                     </div>
                                                        <span>$row[mdatetime]</span>
                                                    </div>
                                                    <!-- /module info -->
                                                </div>
                                                <!-- /module item -->";

                                                }
                                                 ?>
                                               
                                               
                                               
                                               

                                            </div>
                                            <!-- /module list -->

                                        </div>
                                        <!-- /module content inner -->

                                    </div>
                                    <!-- /module content -->

                                </div>
                                <!-- /module container -->

                               
                            </div>
                            <!-- /module -->

                        </div>
                        <!-- /grid item -->

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
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    
