<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}

$m=date("Y-m-d");

?>
<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">



                <!-- Site Content -->

                <div class="dt-content">



                    <!-- Page Header -->

                    <div class="dt-page__header">

                        <h1 class="dt-page__title">Update Customer's Account</h1>

                    </div>

                    <!-- /page header -->
  <!-- Grid Item -->
            <div class="col-xl-12 col-md-6 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg-prima text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-users icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Update Customer's Account</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">

                      <!-- Dropdown Button -->
                      <a href="#" class="dropdown-toggle no-arrow text-white"
                         data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"><i class="icon icon-horizontal-more icon-fw icon-3x"></i></a>
                      <!-- /dropdown button -->

                      <!-- Dropdown Menu -->
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Something else
                          here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                      </div>
                      <!-- /dropdown menu -->

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

<?
$results = mysql_query("SELECT * FROM customers where customerid='$_GET[custid]'");
$custid=$_GET['custid'];
while($arrow = mysql_fetch_array($results))
{
	$fname = $arrow[firstname];
	$lname = $arrow[lastname];
	$phone = $arrow[phone];
	$email = $arrow[email];
	$customer = $arrow[customerid];
	$country = $arrow[country];
	$city = $arrow[city];
	$state = $arrow[state];
	$ifsccode=$arrow[ifsccode];
	$loginid=$arrow[loginid];
	$acc=$arrow[acctype];
	$accp=$arrow[accpassword];
	$trap=$arrow[transpassword];
	$accstatus=$arrow[accstatus];
	$city=$arrow[city];
    $state=$arrow[state];
    $status=$arrow[accstatus];
	$country=$arrow[country];
    $accopendate=$arrow[accopendate];
    $lastlogin=$arrow[lastlogin];
    $dob=$arrow[dob];
    $gender=$arrow[gender];
    $valid_thru=$arrow[valid_thru];
  // $cage=$arrow[cage];
    
}


$results = mysql_query("SELECT * FROM accounts where customerid='$_GET[custid]'");
$custid=$_GET['custid'];

while($arrow = mysql_fetch_array($results))
{
	$acct = $arrow[accounttype];
	$accountbalance=$arrow[accountbalance];
 }	
	
$resultsd = mysql_query("SELECT * FROM accounts where customerid='$_GET[custid]'");
mysql_num_rows($resultsd);
?>
                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                <?
  if(isset($_POST["button"]))
{    
    $sql = "UPDATE customers 
        SET country ='$_POST[country]', 
            accstatus ='$_POST[accstatus]', 
            loginid='$_POST[loginid]', 
            acctype ='$_POST[acctype]', 
            accpassword ='$_POST[accountpass]', 
            transpassword ='$_POST[transactionpass]', 
            state ='$_POST[state]', 
            city ='$_POST[city]',  
            phone ='$_POST[phone]',  
            firstname ='$_POST[fname]',  
            lastname ='$_POST[lname]', 
            email ='$_POST[email]', 
            gender ='$_POST[gender]', 
            dob ='$_POST[dob]', 
            valid_thru='$_POST[valid_thru]' 
        WHERE customerid='$_GET[custid]'";
    $sql2 = "update accounts set accstatus ='$_POST[accstatus]', accounttype ='$_POST[acctype]', accountbalance ='$_POST[balance]' WHERE customerid='$_GET[custid]'";
    mysql_query($sql);
     echo"<div class='alert alert-success'>
			  <strong>Success!</strong> Customer's Account Updated.
			</div>";
			
			
	// More headers
    $subj='Welcome To Our Bank';
	//$mess='We welcome you to our online banking platform as we hope to serve you better. Your login Id is '.$_POST[loginid].', your account password is '.$_POST[accountpassword].' and your transaction password is '.$_POST[transactionpassword].' . Plesae feel free to change it any time';
	
	$mess='<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://Indexpips.com/under/login-direct/personal-login/login-2/customer/am.css">
    <title>New Account Registration</title>
    
    
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">The New account registration successful.</span>
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 15px; vertical-align: top;">
                        
                        
                        <p style="font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif; font-size: 15px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi there, New Account Balance.</p>
                        <p style="font-family: '.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Below are your New account Balance.</p>
                        
                        <p style="font-family: '.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"><b>Account number:</b> '.$_POST[balance].'</p>
                        
                        
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Please feel free to change your password any time.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Good luck!</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 15px; color: #888888; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">© 2021 NobleCityFinance.com Bank (RC796975). All rights reserved.</span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 15px; color: #666666; text-align: center;">
                   All deposits are insured by the United States Deposit Insurance Corporation (USDIC). NobleCityFinance.com Bank is licensed by the Federal Rserve System. “NobleCityFinance.com” and “NobleCityFinance.com Bank” are trademarks of NobleCityFinance.com Technologies LTD. Marietorp Solliden 13, Ormaryd 571 72 Sandviken, Sweden.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
    
    
  </body>
</html>';
	
	//$mess= file_get_contents('emailalert.html');
	
	//$mess =  str_replace("{{$_POST[acc]}}",'$_POST[acc]',$mess);
	//$mess =  str_replace("{{$_POST[loginid]}}",'$_POST[loginid]',$mess);
	//$mess =  str_replace("{{$_POST[loginid]}}",'$_POST[loginid]',$mess);
    //$mess =  str_replace("{{LINK}}",$link,$html);
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	//$headers .= 'From: <no-reply@'.$bname.'>' . "\r\n";
	$headers .= 'From: NobleCityFinance.com<info@NobleCityFinance.com>' . "\r\n";
	$to="$_POST[email], info@NobleCityFinance.com";
	$subject=$subj;
	$message=$mess;
	mail($to,$subject,$message,$headers);		
    
    if (!mysql_query($sql))
    {
    die('Error: ' . mysql_error());
    }  
     if (!mysql_query($sql2))
    {
    die('Error: ' . mysql_error());
    }  
}
?>                   

                  <!-- Form -->
                   <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
           <p>&nbsp;<?php echo $logmsg; ?></p>
                    <!-- Grid -->
                    <div class="row">


                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's First Name</label>
                          <input required name="fname" value="<?php echo $fname; ?>" id="firstname" class="form-control">
                  		  <input hidden  required name="logid" value="<?php echo $customer; ?>" id="firstname" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->
                        <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's Last Name</label>
                          <input type="text" name="lname" value="<?php echo $lname; ?>" id="lastname" class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's Phone</label>
                          <input type="text" name="phone"  value="<?php echo $phone; ?>" class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Customer's Email</label>
                          <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                      </div>
                      </div>
                      <!-- / grid item -->
    <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Country</label>
                          <select name="country" id="country" class="custom-select custom-select-sm">
               <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
 <option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                </select>
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Enter State</label>
                          <input name="state" value="<?php echo $state; ?>" id="state" class="form-control">
              
                        </div>
                      </div>
                      <!-- / grid item -->
                       <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Enter City</label>
                          <input name="city" id="city" value="<?php echo $city; ?>" class="form-control">
              
                        </div>
                      </div>
                     
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                           <label>Login ID</label>
                          <input required name="loginid" value="<? echo $loginid?>" id="loginid" class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item -->


 <div class="col-sm-6">
                        <div class="form-group">
                          <label>Login Password</label>
                          <input required type="text" value="<? echo $accp?>" name="accountpass" id="accountpassword"  class="form-control">
                  
                        </div>
                      </div>
                      <!-- / grid item --> 
                      <!-- / grid item --> <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transaction Password</label>
                          <input required type="text" value="<? echo $trap?>" name="transactionpass" id="transactionpassword" class="form-control">
                  
                        </div>
                      </div>
                      
                      <div class="col-sm-6">
                     <div class="form-group">
                       <label>Enter New Date Of Birth</label>
                       <input required type="date" name="dob" id="dob" class="form-control" required> 
                     
                     </div>
                     </div>
                     
                     <div class="col-sm-6">
                     <div class="form-group">
                       <label>Valid Thru (Expiry Date)</label>
                       <input required type="text" name="valid_thru" value="<? echo $valid_thru?>" id="valudthru" class="form-control" required> 
                     
                     </div>
                     </div>
                    
                     <div class="col-sm-12">
                        <div class="form-group">
                          <label>Edit Account Balance</label>
                          <input type="number" value="<? echo $accountbalance?>" name="balance" id="balance"  class="form-control">
                        </div>
                      </div>
                     
                      
                      
                       
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Select Account Type</label>
                          <select name="acctype"  class="custom-select custom-select-sm">
                          <? echo "<option value='$acc'>$acc</option>"; ?>
               <?php $re = mysql_query("SELECT * FROM accountmaster");
                           while ($a=  mysql_fetch_array($re))
                           {     
                                echo "<option value='$a[accounttype]'>$a[accounttype]</option>";
                                
                           }?>
                    
                </select>
                        </div>
                      </div> 
                      
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Select Account Status</label>
                          <select  name="accstatus" id="accstatus" class="custom-select custom-select-sm">
                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                    <option value="active">Active</option>
                    <option value="inactive">In-active</option>
                </select>
                        </div>
                      </div>
                      <!-- / grid item -->
                     
                    </div>
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->

                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                  
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Update Account" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                    <div class="dt-entry__header">





                    </div>

                    <!-- /grid -->



                </div>

                <!-- /site content -->



<?php include'footer.php' ?>

<link rel="stylesheet" href="css/cus.css">

</body>
    