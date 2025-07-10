<? 
   if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
       header('Location:login.php?error=plslogin');
       
       $mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status='New' ");
   
   if(isset($_GET["mailid"]))
   {
   	
   }
   else if(isset($_SESSION['customerid']))
       $result= mysql_query("SELECT * FROM mail where reciverid='$_SESSION[customerid]' AND status='New' ");
       
   ?>
<?
   
   
   $query="SELECT * from system_settings"; 
    $result = mysqli_query($con,$query);
   
   while($row = mysqli_fetch_array($result))
   {
   $cur= $row['currency'];
   $sbank=$row['bank_name'];
   
   $color=$row['theme_color'];
   
   
   								   
    }
    
    
   $result1 = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
   $rowrec1 = mysql_fetch_array($result1);
    
    ?>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Dashboard | Secure Banking Solutions for Your Financial Future
      </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="" name="description" />
      <meta content="" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.png">
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
      <script src="assets/libs2/custom/sweetalert.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&family=Rubik:wght@400;500;600;700;800&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <style>
         td, th {font-size:13px;}
         /** Custom Select **/
         .rubikfont{
         font-family:Rubik;
         }
         body{
         font-family: "Epilogue" !Important;
         }
         .header-profile-user {
         height: 46px;
         width: 46px;
         object-fit: cover;
         }
         @media (max-width:991px){
         .exp{
         border-top-left-radius: 0px;
         border-bottom-left-radius: 0px;
         line-height: 23px;
         }
         }
         .smartsupp-chat-container {
         display: none !important; 
         }
      </style>
   </head>
   <body>
      <header id="page-topbar">
         <div class="navbar-header">
            <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box">
                  <a href="#" class="logo logo-dark">
                  <span class="logo-sm">
                  <img src="rename.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                  <img src="lags.png" alt="" height="17" style="margin-top: 20px;">
                  </span>
                  </a>
                  <a href="dashboard.php" class="logo logo-light">
                  <span class="logo-sm">
                  <img src="rename.png" alt="" height="22" style="margin-top: 20px;">
                  </span>
                  <span class="logo-lg">
                  <img src="lags3.png" style="    margin-top: 30px;     filter: drop-shadow(0px 1000px 0 white);
    transform: translateY(-2px);"  alt="" height="29">
                  </span>
                  </a>
               </div>
               <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
               <i class="fa fa-fw fa-bars"></i>
               </button>
               <!-- App Search-->
               <form class="app-search d-none d-lg-block" action="statement.php" method="post">
                  <div class="position-relative">
                     <input type="text" class="form-control" placeholder="Type credit or debit...">
                     <span class="bx bx-search-alt"></span>
                  </div>
               </form>
            </div>
            <div class="d-flex">
               <div class="dropdown d-inline-block d-lg-none ms-2">
                  <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-magnify"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">
                     <form class="p-3" action="statement.php" method="post">
                        <div class="form-group m-0">
                           <div class="input-group">
                              <input type="text" name="query" class="form-control" placeholder="Type credit or debit..." aria-label="Recipient's Details">
                              <div class="input-group-append">
                                 <button class="btn btn-primary exp" type="submit"><i class="mdi mdi-magnify"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- Lang -->
               <div class="dropdown d-inline-block waves-effect" style="background: #eeeeee47;">
                  <div style="" class="ift">
                     <style type="text/css">
                        <!--
                           a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
                           a.gflag img {border:0;}
                           a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
                           #goog-gt-tt {display:none !important;}
                           .goog-te-banner-frame {display:none !important;}
                           .goog-te-menu-value:hover {text-decoration:none !important;}
                           body {top:0 !important;}
                           #google_translate_element2 {display:none!important;}
                           -->
                        select.up2 {
                        color: #80661f !important;
                        padding-left: 10px;
                        border-radius: 5px;
                        font-weight: 600;
                        width: 120px;
                        appearance: none;
                        background:transparent;
                        outline: none;
                        }
                        /* Hide SmartSupp chat widget by default */
                        .smartsupp-chat-container {
                        display: none !important; /* Hides the chat widget */
                        }
                     </style>
                     <select class="up2 header-item waves-effect" data-bs-toggle="dropdown" aria-expanded="true"   id="ava" onchange="doGTranslate(this);">
                        <span><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i>
                        <option value="">Choose Lang</option>
                        <option value="en|af">Afrikaans</option>
                        <option value="en|sq"> <img src="https://flagdownload.com/wp-content/uploads/Flag_of_Albania_Flat_Round-128x128.png" class="me-1" height="12"> Albanian</option>
                        <option value="en|ar">Arabic</option>
                        <option value="en|hy">Armenian</option>
                        <option value="en|az">Azerbaijani</option>
                        <option value="en|eu">Basque</option>
                        <option value="en|be">Belarusian</option>
                        <option value="en|bg">Bulgarian</option>
                        <option value="en|ca">Catalan</option>
                        <option value="en|zh-CN">Chinese (Simpoptionfied)</option>
                        <option value="en|zh-TW">Chinese (Traditional)</option>
                        <option value="en|hr">Croatian</option>
                        <option value="en|cs">Czech</option>
                        <option value="en|da">Danish</option>
                        <option value="en|nl">Dutch</option>
                        <option value="en|en">English</option>
                        <option value="en|et">Estonian</option>
                        <option value="en|tl">Fioptionpino</option>
                        <option value="en|fi">Finnish</option>
                        <option value="en|fr">French</option>
                        <option value="en|gl">Gaoptioncian</option>
                        <option value="en|ka">Georgian</option>
                        <option value="en|de">German</option>
                        <option value="en|el">Greek</option>
                        <option value="en|ht">Haitian Creole</option>
                        <option value="en|iw">Hebrew</option>
                        <option value="en|hi">Hindi</option>
                        <option value="en|hu">Hungarian</option>
                        <option value="en|is">Icelandic</option>
                        <option value="en|id">Indonesian</option>
                        <option value="en|ga">Irish</option>
                        <option value="en|it">Itaoptionan</option>
                        <option value="en|ja">Japanese</option>
                        <option value="en|ko">Korean</option>
                        <option value="en|lv">Latvian</option>
                        <option value="en|lt">Lithuanian</option>
                        <option value="en|mk">Macedonian</option>
                        <option value="en|ms">Malay</option>
                        <option value="en|mt">Maltese</option>
                        <option value="en|no">Norwegian</option>
                        <option value="en|fa">Persian</option>
                        <option value="en|pl">Pooptionsh</option>
                        <option value="en|pt">Portuguese</option>
                        <option value="en|ro">Romanian</option>
                        <option value="en|ru">Russian</option>
                        <option value="en|sr">Serbian</option>
                        <option value="en|sk">Slovak</option>
                        <option value="en|sl">Slovenian</option>
                        <option value="en|es">Spanish</option>
                        <option value="en|sw">Swahioption</option>
                        <option value="en|sv">Swedish</option>
                        <option value="en|th">Thai</option>
                        <option value="en|tr">Turkish</option>
                        <option value="en|uk">Ukrainian</option>
                        <option value="en|ur">Urdu</option>
                        <option value="en|vi">Vietnamese</option>
                        <option value="en|cy">Welsh</option>
                        <option value="en|yi">Yiddish</option>
                     </select>
                     <div id="google_translate_element2">
                        <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                           <div id=":0.targetLanguage">
                              <select class="goog-te-combo" aria-label="Language Translate Widget">
                                 <option value="">Select Language</option>
                                 <option value="af">Afrikaans</option>
                                 <option value="sq">Albanian</option>
                                 <option value="am">Amharic</option>
                                 <option value="ar">Arabic</option>
                                 <option value="hy">Armenian</option>
                                 <option value="az">Azerbaijani</option>
                                 <option value="eu">Basque</option>
                                 <option value="be">Belarusian</option>
                                 <option value="bn">Bengali</option>
                                 <option value="bs">Bosnian</option>
                                 <option value="bg">Bulgarian</option>
                                 <option value="ca">Catalan</option>
                                 <option value="ceb">Cebuano</option>
                                 <option value="ny">Chichewa</option>
                                 <option value="zh-CN">Chinese (Simplified)</option>
                                 <option value="zh-TW">Chinese (Traditional)</option>
                                 <option value="co">Corsican</option>
                                 <option value="hr">Croatian</option>
                                 <option value="cs">Czech</option>
                                 <option value="da">Danish</option>
                                 <option value="nl">Dutch</option>
                                 <option value="eo">Esperanto</option>
                                 <option value="et">Estonian</option>
                                 <option value="tl">Filipino</option>
                                 <option value="fi">Finnish</option>
                                 <option value="fr">French</option>
                                 <option value="fy">Frisian</option>
                                 <option value="gl">Galician</option>
                                 <option value="ka">Georgian</option>
                                 <option value="de">German</option>
                                 <option value="el">Greek</option>
                                 <option value="gu">Gujarati</option>
                                 <option value="ht">Haitian Creole</option>
                                 <option value="ha">Hausa</option>
                                 <option value="haw">Hawaiian</option>
                                 <option value="iw">Hebrew</option>
                                 <option value="hi">Hindi</option>
                                 <option value="hmn">Hmong</option>
                                 <option value="hu">Hungarian</option>
                                 <option value="is">Icelandic</option>
                                 <option value="ig">Igbo</option>
                                 <option value="id">Indonesian</option>
                                 <option value="ga">Irish</option>
                                 <option value="it">Italian</option>
                                 <option value="ja">Japanese</option>
                                 <option value="jw">Javanese</option>
                                 <option value="kn">Kannada</option>
                                 <option value="kk">Kazakh</option>
                                 <option value="km">Khmer</option>
                                 <option value="rw">Kinyarwanda</option>
                                 <option value="ko">Korean</option>
                                 <option value="ku">Kurdish (Kurmanji)</option>
                                 <option value="ky">Kyrgyz</option>
                                 <option value="lo">Lao</option>
                                 <option value="la">Latin</option>
                                 <option value="lv">Latvian</option>
                                 <option value="lt">Lithuanian</option>
                                 <option value="lb">Luxembourgish</option>
                                 <option value="mk">Macedonian</option>
                                 <option value="mg">Malagasy</option>
                                 <option value="ms">Malay</option>
                                 <option value="ml">Malayalam</option>
                                 <option value="mt">Maltese</option>
                                 <option value="mi">Maori</option>
                                 <option value="mr">Marathi</option>
                                 <option value="mn">Mongolian</option>
                                 <option value="my">Myanmar (Burmese)</option>
                                 <option value="ne">Nepali</option>
                                 <option value="no">Norwegian</option>
                                 <option value="or">Odia (Oriya)</option>
                                 <option value="ps">Pashto</option>
                                 <option value="fa">Persian</option>
                                 <option value="pl">Polish</option>
                                 <option value="pt">Portuguese</option>
                                 <option value="pa">Punjabi</option>
                                 <option value="ro">Romanian</option>
                                 <option value="ru">Russian</option>
                                 <option value="sm">Samoan</option>
                                 <option value="gd">Scots Gaelic</option>
                                 <option value="sr">Serbian</option>
                                 <option value="st">Sesotho</option>
                                 <option value="sn">Shona</option>
                                 <option value="sd">Sindhi</option>
                                 <option value="si">Sinhala</option>
                                 <option value="sk">Slovak</option>
                                 <option value="sl">Slovenian</option>
                                 <option value="so">Somali</option>
                                 <option value="es">Spanish</option>
                                 <option value="su">Sundanese</option>
                                 <option value="sw">Swahili</option>
                                 <option value="sv">Swedish</option>
                                 <option value="tg">Tajik</option>
                                 <option value="ta">Tamil</option>
                                 <option value="tt">Tatar</option>
                                 <option value="te">Telugu</option>
                                 <option value="th">Thai</option>
                                 <option value="tr">Turkish</option>
                                 <option value="tk">Turkmen</option>
                                 <option value="uk">Ukrainian</option>
                                 <option value="ur">Urdu</option>
                                 <option value="ug">Uyghur</option>
                                 <option value="uz">Uzbek</option>
                                 <option value="vi">Vietnamese</option>
                                 <option value="cy">Welsh</option>
                                 <option value="xh">Xhosa</option>
                                 <option value="yi">Yiddish</option>
                                 <option value="yo">Yoruba</option>
                                 <option value="zu">Zulu</option>
                              </select>
                              <select class="goog-te-combo" aria-label="Widget &quot;Sprache übersetzen&quot;">
                                 <option value="">Sprache auswählen</option>
                                 <option value="de">Deutsch</option>
                                 <option value="af">Afrikaans</option>
                                 <option value="sq">Albanisch</option>
                                 <option value="am">Amharisch</option>
                                 <option value="ar">Arabisch</option>
                                 <option value="hy">Armenisch</option>
                                 <option value="az">Aserbaidschanisch</option>
                                 <option value="eu">Baskisch</option>
                                 <option value="be">Belarussisch</option>
                                 <option value="bn">Bengalisch</option>
                                 <option value="my">Birmanisch</option>
                                 <option value="bs">Bosnisch</option>
                                 <option value="bg">Bulgarisch</option>
                                 <option value="ceb">Cebuano</option>
                                 <option value="ny">Chichewa</option>
                                 <option value="zh-TW">Chinesisch (traditionell)</option>
                                 <option value="zh-CN">Chinesisch (vereinfacht)</option>
                                 <option value="da">Dänisch</option>
                                 <option value="eo">Esperanto</option>
                                 <option value="et">Estnisch</option>
                                 <option value="tl">Filipino</option>
                                 <option value="fi">Finnisch</option>
                                 <option value="fr">Französisch</option>
                                 <option value="fy">Friesisch</option>
                                 <option value="gl">Galizisch</option>
                                 <option value="ka">Georgisch</option>
                                 <option value="el">Griechisch</option>
                                 <option value="gu">Gujarati</option>
                                 <option value="ht">Haitianisch</option>
                                 <option value="ha">Hausa</option>
                                 <option value="haw">Hawaiisch</option>
                                 <option value="iw">Hebräisch</option>
                                 <option value="hi">Hindi</option>
                                 <option value="hmn">Hmong</option>
                                 <option value="ig">Igbo</option>
                                 <option value="id">Indonesisch</option>
                                 <option value="ga">Irisch</option>
                                 <option value="is">Isländisch</option>
                                 <option value="it">Italienisch</option>
                                 <option value="ja">Japanisch</option>
                                 <option value="jw">Javanisch</option>
                                 <option value="yi">Jiddisch</option>
                                 <option value="kn">Kannada</option>
                                 <option value="kk">Kasachisch</option>
                                 <option value="ca">Katalanisch</option>
                                 <option value="km">Khmer</option>
                                 <option value="rw">Kinyarwanda</option>
                                 <option value="ky">Kirgisisch</option>
                                 <option value="ko">Koreanisch</option>
                                 <option value="co">Korsisch</option>
                                 <option value="hr">Kroatisch</option>
                                 <option value="ku">Kurdisch (Kurmandschi)</option>
                                 <option value="lo">Lao</option>
                                 <option value="la">Lateinisch</option>
                                 <option value="lv">Lettisch</option>
                                 <option value="lt">Litauisch</option>
                                 <option value="lb">Luxemburgisch</option>
                                 <option value="mg">Malagasy</option>
                                 <option value="ml">Malayalam</option>
                                 <option value="ms">Malaysisch</option>
                                 <option value="mt">Maltesisch</option>
                                 <option value="mi">Maori</option>
                                 <option value="mr">Marathi</option>
                                 <option value="mk">Mazedonisch</option>
                                 <option value="mn">Mongolisch</option>
                                 <option value="ne">Nepalesisch</option>
                                 <option value="nl">Niederländisch</option>
                                 <option value="no">Norwegisch</option>
                                 <option value="or">Odia (Oriya)</option>
                                 <option value="ps">Paschtu</option>
                                 <option value="fa">Persisch</option>
                                 <option value="pl">Polnisch</option>
                                 <option value="pt">Portugiesisch</option>
                                 <option value="pa">Punjabi</option>
                                 <option value="ro">Rumänisch</option>
                                 <option value="ru">Russisch</option>
                                 <option value="sm">Samoanisch</option>
                                 <option value="gd">Schottisch-Gälisch</option>
                                 <option value="sv">Schwedisch</option>
                                 <option value="sr">Serbisch</option>
                                 <option value="st">Sesotho</option>
                                 <option value="sn">Shona</option>
                                 <option value="sd">Sindhi</option>
                                 <option value="si">Singhalesisch</option>
                                 <option value="sk">Slowakisch</option>
                                 <option value="sl">Slowenisch</option>
                                 <option value="so">Somali</option>
                                 <option value="es">Spanisch</option>
                                 <option value="sw">Suaheli</option>
                                 <option value="su">Sundanesisch</option>
                                 <option value="tg">Tadschikisch</option>
                                 <option value="ta">Tamil</option>
                                 <option value="tt">Tatarisch</option>
                                 <option value="te">Telugu</option>
                                 <option value="th">Thailändisch</option>
                                 <option value="cs">Tschechisch</option>
                                 <option value="tr">Türkisch</option>
                                 <option value="tk">Turkmenisch</option>
                                 <option value="ug">Uigurisch</option>
                                 <option value="uk">Ukrainisch</option>
                                 <option value="hu">Ungarisch</option>
                                 <option value="ur">Urdu</option>
                                 <option value="uz">Usbekisch</option>
                                 <option value="vi">Vietnamesisch</option>
                                 <option value="cy">Walisisch</option>
                                 <option value="xh">Xhosa</option>
                                 <option value="yo">Yoruba</option>
                                 <option value="zu">Zulu</option>
                              </select>
                           </div>
                           Powered by <span style="white-space:nowrap"><a class="goog-logo-link" href="https://translate.google.com" target="_blank"><img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" width="37px" height="14px" style="padding-right: 3px" alt="Google Translate">Translate</a></span>
                        </div>
                        <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                           <div id=":0.targetLanguage"></div>
                           Powered by <span style="white-space:nowrap"><a class="goog-logo-link" href="https://translate.google.com" target="_blank"><img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" width="37px" height="14px" style="padding-right: 3px" alt="Google Google Übersetzer">Google Übersetzer</a></span>
                        </div>
                     </div>
                  </div>
               </div>
               <!--lang-->
               <div class="dropdown d-none d-lg-inline-block ms-1">
                  <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                  <i class="bx bx-fullscreen"></i>
                  </button>
               </div>
               <div class="dropdown d-inline-block">
                  <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php if(empty($rowrec1['image'])) { ?>
                  <img class="rounded-circle header-profile-user au" style="object-fit:cover" src="assets/images/users/avatar-1.jpg"
                     alt="Header Avatar">
                  <?php } else {  ?>
                  <img class="rounded-circle header-profile-user au" style="object-fit:cover" src="assets/images/users/<?php echo $rowrec1['image'] ?>"
                     alt="User Profile Photo">
                  <?php } ?>	
                  <span class="d-none d-xl-inline-block ms-1"><?php echo $_SESSION[customername]; ?></span>
                  <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a class="dropdown-item" href="myprofile.php"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                     <a class="dropdown-item" href="password.php"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Password</span></a>
                     <a class="dropdown-item d-block" href="profileimage.php"><i class="bx bx-upload font-size-16 align-middle me-1"></i> <span key="t-settings">Upload Image</span></a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">
         <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title" key="t-menu">Menu</li>
                  <li>
                     <a href="dashboard.php" class="waves-effect">
                     <i class="bx bx-home-circle"></i>
                     <span key="t-dashboards">Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="myprofile.php" class="waves-effect">
                     <i class='bx bx-user'></i>
                     <span>Account Details</span>
                     </a>
                  </li>
                  <li>
                     <a href="statement.php" class="waves-effect">
                     <i class="bx bx-calendar"></i>
                     <span>Account Summary</span>
                     </a>
                  </li>
                  <li class="menu-title" key="t-components">Fund Transfer</li>

                   <li>
                     <a href="international.php" class="waves-effect">
                     <i class='bx bx-credit-card-alt'></i>
                     <span>International Transfer</span>
                     </a>
                  </li>

                  <li>
                     <a href="international.php" class="waves-effect">
                     <i class='bx bx-credit-card-alt'></i>
                     <span>Bank Transfer</span>
                     </a>
                  </li>
                  <li>
                     <a href="transferhistory.php" class="waves-effect">
                     <i class='bx bx-calendar-plus'></i>
                     <span>Transfer History</span>
                     </a>
                  </li>
                  <li class="menu-title" key="t-components">Messages</li>
                  <li>
                     <a href="#" onclick="openChat(); return false;" class="waves-effect">
                     <i class="bx bx-chat"></i>
                     <span>Support</span>
                     </a>
                  </li>
                  <li>
                     <a href="#" onclick="openChat(); return false;" class="waves-effect">
                     <i class='bx bx-message-square-dots'></i>
                     <span>Sent Chat</span>
                     </a>
                  </li>
                  <li class="menu-title" key="t-components">Account</li>
                  <!--<li>
                     <a href="mycard.php" class="waves-effect">
                         <i class='bx bxs-user-voice'></i>
                         <span>My Card</span>
                     </a>
                     </li> -->
                  <li>
                     <a href="card.php" class="waves-effect">
                     <i class='bx bx-credit-card-alt'></i>
                     <span>ATM Card</span>
                     </a>
                  </li>
                  <li>
                     <a href="pin.php" class="waves-effect">
                     <i class='bx bx-map-pin'></i>
                     <span>Transaction Pin</span>
                     </a>
                  </li>
                  <li>
                     <a href="password.php" class="waves-effect">
                     <i class='bx bx-pin' ></i>
                     <span>Account Password</span>
                     </a>
                  </li>
                  <li class="menu-title" key="t-components">Account</li>
                  <li>
                     <a href="logout.php" class="waves-effect">
                     <i class='bx bx-log-out-circle' ></i>
                     <span>Logout</span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- Sidebar -->
         </div>
      </div>
      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>
      <!-- JAVASCRIPT -->
      <script src="assets/libs/jquery/jquery.min.js"></script>
      <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/libs/metismenu/metisMenu.min.js"></script>
      <script src="assets/libs/simplebar/simplebar.min.js"></script>
      <script src="assets/libs/node-waves/waves.min.js"></script>
      <!-- apexcharts -->
      <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
      <!-- dashboard init -->
      <script src="assets/js/pages/dashboard.init.js"></script>
      <!-- App js -->
      <script src="assets/js/app.js"></script>
      <script src="assets/libs2/node_modules/sweetalert2/dist/sweetalert2.js"></script>
      <script src="assets/libs2/customizer.js"></script>
      <script src="assets/libs2/script.js"></script>
      <script src="assets/libs2/custom/sweet-alert.js"></script>
      <!-- CUstom JS -->
      <script src="assets/validator.min.js"></script>
      <script src="assets/signup-form.js"></script>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'f920d2a80cac80b4974b1d8d6e4005d1565767ba';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>



      <script>
         window.onload = function() {
             smartsupp('chat:hide');
         };
         
         
         function openChat() {
             smartsupp('chat:show');  
             smartsupp('chat:open');  
         }
         
         
         function hideChatOnMinimize() {
             smartsupp('chat:hide');
         }
         
         
         window.smartsupp = window.smartsupp || {};
         window.smartsupp.on = window.smartsupp.on || function(event, callback) {
             if (event === 'widget:close') {
                 hideChatOnMinimize(); 
             }
         };
      </script>
      <!--<script>
         (function() {
         function onTidioChatApiReady() {
         window.tidioChatApi.hide();
         window.tidioChatApi.on("close", function() {
         window.tidioChatApi.hide();
         });
         }
         
         if (window.tidioChatApi) {
         window.tidioChatApi.on("ready", onTidioChatApiReady);
         } else {
         document.addEventListener("tidioChat-ready", onTidioChatApiReady);
         }
         
         document.querySelector(".chat-button").addEventListener("click", function() {
         window.tidioChatApi.show();
         window.tidioChatApi.open();
         });
         })();
         </script> -->
      <script type="text/javascript">
         function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
      </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
      <script type="text/javascript">
         /* <![CDATA[ */
         eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
         /* ]]> */
      </script>
      <script>
         $(".c-select").each(function() {
         var classes = $(this).attr("class"),
         id      = $(this).attr("id"),
         name    = $(this).attr("name");
         var template =  '<div class="' + classes + '">';
         template += '<span class="c-select-trigger">' + $(this).attr("placeholder") + '</span>';
         template += '<div class="c-options">';
         $(this).find("option").each(function() {
         template += '<span class="c-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
         });
         template += '</div></div>';
         
         $(this).wrap('<div class="c-select-wrapper"></div>');
         $(this).hide();
         $(this).after(template);
         });
         $(".c-option:first-of-type").hover(function() {
         $(this).parents(".c-options").addClass("option-hover");
         }, function() {
         $(this).parents(".c-options").removeClass("option-hover");
         });
         $(".c-select-trigger").on("click", function() {
         $('html').one('click',function() {
         $(".c-select").removeClass("opened");
         });
         $(this).parents(".c-select").toggleClass("opened");
         event.stopPropagation();
         });
         $(".c-option").on("click", function() {
         $(this).parents(".c-select-wrapper").find("select").val($(this).data("value"));
         $(this).parents(".c-options").find(".c-option").removeClass("selection");
         $(this).addClass("selection");
         $(this).parents(".c-select").removeClass("opened");
         $(this).parents(".c-select").find(".c-select-trigger").text($(this).text());
         });
         
      </script>
   </body>
</html>