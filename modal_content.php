<?php if ($transferCount > 0): ?>
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="box-shadow: 0px 0px 10px #eee;"><i class="mdi mdi-close"></i></button>
      <h4 class="modal-title" style="font-size:14px;">Fill In The Details</h4>
      </div>
      <div class="modal-body">
                              
                      <!-- Grid Item -->
                      
                      <div class="section-wrap">
                                                <div id="section-1" class="section ghostup" style="">
                                                    <!--<h3 class="section-title">Step 1 of 4</h3> -->
                                                    <p class="">COT Fee = 15.5% of your transaction fee N/B if you dont have this code contact the <span style="color:red;">livechat customer support</span>.</p>
                                                    <p class="badge badge-pill badge-soft-danger font-size-11">Cost of Transfer Fee: <?php echo "$cur $cot_amount"; ?><p>
                                                    
                                                    <fieldset>
                                                        <h3 class="section-form-title">Cost Of Transfer Code</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        
                                                        <div class="form-group validcot">
                                                            <input class="form-control" name="cot" id="cot" type="text" placeholder="Enter COT Code" required data-error="Please enter COT" />
                                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="thecot" id="thecot" type="text" value="<?php echo $arrpayment1['cot']; ?>" required data-error="Please enter cot code" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        
                                                        <div class="form-group signUpForm-step-1">
                                                            <button class="btn btn-default disable" type="button" style="display:none;">Are you ready!</button>
                                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" onclick="nextStep2()" type="button">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div id="section-2" class="section slide-right">
                                                    
                                                    <fieldset>
                                                        <div class="form-layer-steps form-layer-tolal-steps-4">
                                                            <!--<div class="form-layer-progress"><div class="form-layer-progress-line" style="width: 37.25%;"></div></div> -->
                                                        <p class="">IMF Fee = 10% of your transaction fee N/B if you dont have this code contact the <span style="color:red;">livechat customer support</span>.</p>
                                                        <p class="badge badge-pill badge-soft-danger font-size-11">International Montetary Funds Fee: <?php echo "$cur $imf_amount"; ?><p>    
														
                                                        
                                                        <h3 class="section-form-title">International Montetary Funds Code</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        
                                                        <div class="form-group validactivationcode">
                                                            <input class="form-control" name="imf" id="activationcode" type="text" placeholder="Enter Internation Monetary Funds Code" required data-error="Please enter Activation Code" />
                                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="theactivationcode" id="theactivationcode" type="text" value="<?php echo $arrpayment1['imf']; ?>" required data-error="Please enter activation code" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        
                                                        
                                                        
															
                                                            
                                                        <div class="form-group signUpForm-step-2">
                                                            <button class="btn btn-custom" type="button" onclick="previousStep1()"><span class="mdi mdi-chevron-left-circle-outline"></span> Back</button>
                                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" type="button" onclick="nextStep3()">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div id="section-3" class="section slide-right">
                                                    
                                                    <p class="">Anti Terrorism Ref Fee = 10% of your transaction fee N/B if you dont have this code contact the <span style="color:red;">livechat customer support</span>.</p>
                                                        <p class="badge badge-pill badge-soft-danger font-size-11">Anti Terrorism Ref Fee: <?php echo "$cur $anti_amount"; ?><p>    
														
                                                    
                                                    <fieldset>
                                                        
                                                        
                                                        
														<h3 class="section-form-title">Anti Terrorism Ref Code</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        
                                                        <div class="form-group validatc">
                                                            <input class="form-control" name="atc" id="atc" type="text" placeholder="Enter Anti Terrorism Ref Code" required data-error="Please enter ATC" />
                                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="theatc" id="theatc" type="text" value="<?php echo $arrpayment1['activationcode']; ?>" required data-error="Please enter atc code" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group signUpForm-step-3">
                                                            <button class="btn btn-custom" type="button" onclick="previousStep2()"><span class="mdi mdi-chevron-left-circle-outline"></span> Back</button>
                                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" type="button" onclick="nextStep4()">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                                        </div>
                                                    </fieldset>
                                                </div>
												
												
												<div id="section-4" class="section slide-right">
												    
												    <p class="">Tax Code Fee = 4% of your transaction fee N/B if you dont have this code contact the <span style="color:red;">livechat customer support</span>.</p>
                                                        <p class="badge badge-pill badge-soft-danger font-size-11">Tax Code Fee: <?php echo "$cur $tax_amount"; ?><p>    
                                                    
                                                    <fieldset>
                                                        
                                                        
                                                        
														<h3 class="section-form-title">Tax Code</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        
                                                        <div class="form-group validtaxcode">
                                                            <input class="form-control" name="taxcode" id="taxcode" type="text" placeholder="Enter TaxCode" required data-error="Please enter Tax Code" />
                                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="theatc" id="thetaxcode" type="text" value="<?php echo $arrpayment1['taxcode']; ?>" required data-error="Please enter taxcode" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group signUpForm-step-4">
                                                            <button class="btn btn-custom" type="button" onclick="previousStep3()"><span class="mdi mdi-chevron-left-circle-outline"></span> Back</button>
                                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" type="button" onclick="nextStep5()">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                                        </div>
                                                    </fieldset>
                                                </div>
												
												
                                                <div id="section-5" class="section review-submit-section slide-right">
                                                    
                                                    <fieldset>
                                                        
                                                        <h3 class="section-form-title">Transfer Now</h3>
                                                        <div class="row">
                                                            
                                                            
                                                            <div class="help-block with-errors mandatory-error"></div>
                                                            
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <div id="AggreData"><strong>All fields validated:</strong> <input name="aggre" id="aggre" value="1" checked disabled type="checkbox" /></div>
                                                                </div>
                                                                <div id="mgsFormSubmit" class="hidden"></div>
                                                                <div id="final-step-buttons" class="form-group signUpForm-step-4">
                                                                    <button style="display:none;" class="btn btn-custom" type="button" onclick="previousStep3()"><span class="fas fa-arrow-left"></span> Back</button>
                                                                    <button id="Submit" name="pay2" id="pay2" class="btn btn-secondary float-right w-xs waves-effect waves-light" type="submit">Transfer Now. . .</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                      
                      
                      
                      <!-- / grid item -->
      </div>
      <!--<div class="modal-footer">
        
      </div>
    </div> -->

  </div>
</div>

                <!-- /card footer -->
 </form>
                        </div>
                        <?php endif; ?>
                        
                        
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var transferCount = <?php echo isset($transferCount) ? $transferCount : 0; ?>;
        if (transferCount > 0) {
            $('#transferModal').modal('show');
        }
    });
</script>
