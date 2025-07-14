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
    $sql="INSERT INTO customers (accountno, cot, imf, phone, email, acctype, ifsccode,firstname, lastname,loginid,accpassword,transpassword,accstatus,country,state,city,accopendate,dob,gender) VALUES ('$_POST[acc]','$_POST[cot]','$_POST[imf]','$_POST[phone]','$_POST[email]','$_POST[acctype]','$_POST[brname]','$_POST[firstname]','$_POST[lastname]','$_POST[loginid]','$_POST[accountpassword]','$_POST[transactionpassword]','$_POST[accstatus]','$_POST[country]','$_POST[state]','$_POST[city]','$_POST[accopendate]','$_POST[dob],'$_POST[gender]')";
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