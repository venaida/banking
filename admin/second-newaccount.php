<?php session_start();
error_reporting(0);
include("../config/theconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}

$m=date("Y-m-d");
if(isset($_POST["button"]))
{
    $sql="SELECT * FROM customers WHERE loginid='".$_POST['loginid']."'";
    if(mysql_num_rows(mysql_query($sql)) > 0)
    {
        $logmsg="LOGIN ID ALREADY EXIST";
    }
    else
    {
   // $sql="INSERT INTO customers (accountno, phone, email, acctype, ifsccode,firstname, lastname,loginid,accpassword,transpassword,accstatus,country,state,city,accopendate) VALUES ('$_POST[acc]','$_POST[phone]','$_POST[email]','$_POST[acctype]','$_POST[brname]','$_POST[firstname]','$_POST[lastname]','$_POST[loginid]','$_POST[accountpassword]','$_POST[transactionpassword]','$_POST[accstatus]','$_POST[country]','$_POST[state]','$_POST[city]','$m')";
    $sql="INSERT INTO customers (accountno, cot, imf, phone, email, acctype, ifsccode,firstname, lastname,loginid,accpassword,transpassword,accstatus,country,state,city,accopendate,dob,gender,activationcode,taxcode,regstatus) VALUES ('$_POST[acc]','$_POST[cot]','$_POST[imf]','$_POST[phone]','$_POST[email]','$_POST[acctype]','$_POST[brname]','$_POST[firstname]','$_POST[lastname]','$_POST[loginid]','$_POST[accountpassword]','$_POST[transactionpassword]','$_POST[accstatus]','$_POST[country]','$_POST[state]','$_POST[city]','$_POST[accopendate]','$_POST[dob]','$_POST[gender]','$_POST[activationcode]','$_POST[taxcode]','$_POST[regstatus]')";
    mysql_query($sql);
    $ree=mysql_query("SELECT * FROM customers WHERE loginid='$_POST[loginid]'");
    $arra=  mysql_fetch_array($ree);
    $cusid=$arra['customerid'];
    $sql="INSERT INTO accounts(accno,customerid,accstatus,accopendate,accounttype,accountbalance) VALUES ('$_POST[acc]','$cusid','$_POST[accstatus]','$_POST[accopendate]','$_POST[acctype]','$_POST[balance]')";
    if (!mysql_query($sql))
    {
    die('Error: ' . mysql_error());
    }
     $logmsg ="<script>swal('Succesful!', 'Your account has been created!. Your Account Number is $_POST[acc] Thank you for joining us!', 'success')</script>";
     }
}
$resq = mysql_query("select * from branch");
?>
<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">
<!-- Site Content -->
<div class="dt-content">
   <!-- Page Header -->
   <div class="dt-page__header">
      <h1 class="dt-page__title">New Customer</h1>
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
                  <h3 class="dt-card__title text-black">Create New Customer</h3>
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
         <script language="javascript">
            function isNumberKey(evt)
                 {
            
                    var charCode = (evt.which) ? evt.which : event.keyCode
            	//alert(charCode);
                    if (charCode > 65 && charCode < 91 )
                 	 {              
            	 return true;
             }
             else if (charCode > 96 && charCode < 122 )
                 	 {
            	 return true;
             }
             else
             {
                   alert("should be alphabet");
              	return false;
             }
                }
            
         </script><script type="text/javascript">
            function valid()
            {
            	if(document.form1.brname.value=="")
            	{
            		alert("INVALID BRANCH NAME");
            		return false;
            	}
            	if(document.form1.firstname.value=="")
            	{
            		alert("INVALID FIRST NAME");
            		return false;
            	}
            	if(document.form1.lastname.value=="")
            	{
            		alert("INVALID LAST NAME");
            		return false;
            	}
            	if(document.form1.loginid.value=="")
            	{
            		alert("INVALID LOGIN ID");
            		return false;
            	}
            	if(document.form1.accountpassword.value=="")
            	{
            		alert("INVALID ACCOUNT PASSWORD");
            		return false;
            	}
            	if(document.form1.confirmpassword.value=="")
            	{
            		alert("INVALID CONFIRM PASSWORD");
            		return false;
            	}
                    
                    if(!(document.form1.confirmpassword.value == document.form1.accountpassword.value))
            	{
            		alert("ACCOUNT PASSWORD MISMATCH");
            		return false;
            	}
                    
            	if(document.form1.transactionpassword.value=="")
            	{
            		alert("INVALID TRANSACTION PASSWORD");
            		return false;
            	}
                    if(!(document.form1.transactionpassword.value == document.form1.confirmtransactionpassword.value))
            	{
            		alert("TRANSACTION PASSWORD MISMATCH");
            		return false;
            	}
            	if(document.form1.accstatus.value=="")
            	{
            		alert("INVALID ACCOUNT STATUS");
            		return false;
            	}
            	if(document.form1.country.value=="")
            	{
            		alert("INVALID COUNTRY");
            		return false;
            	}
            	if(document.form1.state.value=="")
            	{
            		alert("INVALID STATE");
            		return false;
            	}
            	if(document.form1.city.value=="")
            	{
            		alert("INVALID CITY");
            		return false;
            	}
            }
         </script>
         <!-- Card Body -->
         <div class="dt-card__body pb-3">
            <!-- Form -->
            <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
               <p>&nbsp;<?php echo $logmsg; ?></p>
               <!-- Grid -->
               <div class="row">
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Add Bank Branch</label>
                        <!-- <input required name="brname"  id="brname" class="form-control"> -->
                        <select name="brname" id="brname" class="custom-select custom-select-sm">
                        <?php
                           while($rta = mysql_fetch_array($resq) )
                               {
                                   echo "<option value='$rta[ifsccode]'>$rta[branchname]</value>";
                               }
                           ?> </select> 
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Customer's First Name</label>
                        <input required name="firstname"  id="firstname" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Customer's Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Customer's Phone</label>
                        <input type="number" name="phone"  class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Customer's Email</label>
                        <input type="email" name="email" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Select Country</label>
                        <select name="country" id="country" class="custom-select custom-select-sm" required>
                           <option value="">Select</option>
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
                        <input name="state" id="state" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Enter City</label>
                        <input name="city" id="city" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <? $tcode=rand(1111111111,9999999999);?>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Account Number</label>
                        <input required type="number" readonly value="<? echo $tcode ?>" name="acc" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <? $loginid = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>
                        <label>Login ID</label>
                        <input required name="loginid" value="<? echo $loginid?>" id="loginid" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Login Password</label>
                        <? $loginpass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>
                        <input required type="text" value="<? echo $loginpass?>" name="accountpassword" id="accountpassword"  class="form-control" required>
                        <?php ?>
                     </div>
                  </div>
                  <!-- / grid item --> 
                  <!-- / grid item --> 
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Transaction Password</label>
                        <input required type="text" value="<? echo $loginpass?>" name="transactionpassword" id="transactionpassword" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Select Account Status</label>
                        <select  name="accstatus" id="accstatus" class="custom-select custom-select-sm" required>
                           <option value="">Select</option>
                           <option value="active">Active</option>
                           <option value="inactive">In-active</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Account Opening Date</label>
                        <input type="date" name="accopendate" placeholder="Account Opening Date" class="form-control" required>
                     </div>
                  </div>
                  <!-- / grid item --> 
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Select Account Type</label>
                        <select name="acctype"  class="custom-select custom-select-sm" required>
                        <?php $re = mysql_query("SELECT * FROM accountmaster");
                           while ($a=  mysql_fetch_array($re))
                           {
                                echo "<option value='$a[accounttype]'>$a[accounttype]</option>";
                           }?>
                        </select>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Opening Balance</label>
                        <input type="number" name="balance" id="balance"  class="form-control" required>
                     </div>
                  </div>
                  <!-- Grid Item -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" name="dob" id="dob"  class="form-control" required>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="custom-select custom-select-sm" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                     </div>
                  </div>
                  <!-- / grid item -->
                  <div class="col-sm-6" style="visibility: hidden;">
                     <div class="form-group">
                        <? $cot = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 10 );?>
                        <input required type="text" value="<? echo $cot?>" hidden name="imf" id="cot"  class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-6" style="visibility: hidden;">
                     <div class="form-group">
                        <? $imf = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 10 );?>
                        <input required type="text" value="<? echo $imf?>" hidden name="cot" id="imf"  class="form-control"> 
                     </div>
                  </div>
                  <div class="col-sm-6" style="visibility: hidden;">
                     <div class="form-group">
                        <? $activationcode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 10 );?>
                        <input required type="text" value="<? echo $activationcode?>" hidden name="activationcode" id="activatecode"  class="form-control"> 
                     </div>
                  </div>
                  <div class="col-sm-6" style="visibility: hidden;">
                     <div class="form-group">
                        <? $taxcode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 10 );?>
                        <input required type="text" value="<? echo $taxcode?>" hidden name="taxcode" id="tax"  class="form-control"> 
						<input required type="regstatus" value="hidden" id="tax"  class="form-control"> 
                     </div>
                  </div>
               </div>
               <!-- /grid -->
               <!-- /form -->
         </div>
         <!-- /card body -->
         <!-- Card Footer -->
         <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
         <tr>
         <td colspan="2"><div align="right">
         <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Create Account" />
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
<link rel="stylesheet" href="css/cus.css">
<?php include'footer.php' ?>
</body>