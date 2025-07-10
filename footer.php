<?

$dts =  date("l jS \of F Y ");

$query="SELECT * from system_settings"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$bname=$row['bank_name'];
								   
 }?>


<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                              ©  <script>document.write(new Date().getFullYear())</script> Internet Banking, All Rights Reserved.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Innovate & Execute by Internet Banking Bank
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

