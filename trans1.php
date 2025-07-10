<!-- form 1 -->
                           <form data-toggle="validator" class="signUpForm" enctype="multipart/form-data"   id="form1" name="form1" method="post" action="internationalbankstransfer.php">
                              <input type="hidden" name="payt" value="<?php echo $swift; ?>"  />
                              <input type="hidden" name="payamt" value="<?php echo $payamt; ?>"  />
                              <input type="hidden" name="acct" value="<?php echo $acct; ?>"  />
                              <input type="hidden" name="bank" value="<?php echo $bank; ?>"  />
                              <input type="hidden" name="name" value="<?php echo $rname; ?>"  />
                              <input type="hidden" name="addr" value="<?php echo $bankadd; ?>"  />
                              <input type="hidden" name="swift" value="<?php echo $swift; ?>"  />
                              <!-- Grid -->
                              <div class="row">
                                 <!-- Grid Item -->
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label><?php
                                          if(isset($_POST['pay']))
                                          {               echo "<br><b>&nbsp;Bank Name: </b> $bank";
                                          echo "<br><b>&nbsp;Bank Address: </b> $bankadd";
                                          echo "<br><b>&nbsp;Account Number: </b> $acct";
                                          echo "<br><b>&nbsp;Account Name: </b> $rname";
                                          echo "<br><b>&nbsp;Swift Code: </b> $swift";
                                          echo "<br><b>&nbsp;Amount: </b> $cur " . number_format($payamt, 2);
                                          //echo "<br><b>&nbsp;Transfer Fee: </b> $cur $new_amount";
                                          ?></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="alert alert-info mb-3" role="alert">
                                 Enter your password and proceed to transfer.
                              </div>
                              <div class="form-floating mb-3">
                                 <input min="10" name="trpass" type="password" id="trpass" class="form-control" placeholder="Enter Transaction Password" required >
                                 <label for="trpass">Enter Transaction Password</label>
                                 <a href="javascript:void(0)" class="text-white ml-auto">
                                 </a>
                              </div>
                              <div>
                                 <button type="submit" name="pay2" class="btn btn-primary w-md">Transfer</button>
                                 <?    } else {
                                    echo $content['message']; echo "</div></div></div>";
                                    }
                                    ?>


               
                            </form>