<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$query = "SELECT * FROM steps WHERE step_status = 1 ORDER BY step_id ASC";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

$steps = [];


while ($row = mysqli_fetch_assoc($result)) {
    $steps[$row['step_id']] = $row; 
}
?>

<style>
.section {
    display: none;
}

.section.slide-right{
    display:contents !Important;
}

</style>

<!-- form 2 -->
<form data-toggle="validator" class="signUpForm" enctype="multipart/form-data" id="form1" name="form2" method="post" action="internationalbankstransfer.php">
    <input type="hidden" name="payt" value="<?php echo $swift; ?>" />
    <input type="hidden" name="payamt" value="<?php echo $payamt; ?>" />
    <input type="hidden" name="acct" value="<?php echo $acct; ?>" />
    <input type="hidden" name="bank" value="<?php echo $bank; ?>" />
    <input type="hidden" name="name" value="<?php echo $rname; ?>" />
    <input type="hidden" name="addr" value="<?php echo $bankadd; ?>" />
    <input type="hidden" name="swift" value="<?php echo $swift; ?>" />
    <!-- Grid -->
    <div class="row">
        <!-- Grid Item -->
        <div class="col-sm-6">
            <div class="form-group">
                <label>
                    <?php
                    if (isset($_POST['pay'])) {
                        echo "<br><b>&nbsp;Bank Name: </b> $bank";
                        echo "<br><b>&nbsp;Bank Address: </b> $bankadd";
                        echo "<br><b>&nbsp;Account Number: </b> $acct";
                        echo "<br><b>&nbsp;Account Name: </b> $rname";
                        echo "<br><b>&nbsp;Swift Code: </b> $swift";
                        echo "<br><b>&nbsp;Amount: </b> $cur " . number_format($payamt, 2);
                    }
                    ?>
                </label>
            </div>
        </div>
    </div>
    <div class="alert alert-info mb-3" role="alert">
        Enter your password and proceed to transfer.
    </div>
    <div class="form-floating mb-3">
        <input min="10" name="trpass" type="password" id="trpass" class="form-control" placeholder="Enter Transaction Password" required>
        <label for="trpass">Enter Transaction Password</label>
    </div>
    <div>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary w-md">Transfer</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style=""><i class="mdi mdi-close"></i></button>
                        <h4 class="modal-title" style="font-size:14px;">Fill In The Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="section-wrap">
                            <?php if (isset($steps[1])): ?>
                                <div id="section-1" class="section ghostup">
                                    <h3><?php echo $steps[1]['step_name']; ?></h3>
                                    <p id="step-1-info"><?php echo $steps[1]['step_description']; ?></p>
                                    <fieldset>
                                        <div class="form-group validcot">
                                            <input class="form-control" name="cot" id="cot" type="text" placeholder="Enter COT Code" required data-error="Please enter COT" />
                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="thecot" id="thecot" type="hidden" value="<?php echo $arrpayment1['cot']; ?>" required data-error="Please enter cot code" />
                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group signUpForm-step-1">
                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" onclick="nextStep()" type="button">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($steps[2])): ?>
                                <div id="section-2" class="section">
                                    <h3><?php echo $steps[2]['step_name']; ?></h3>
                                    <p id="step-2-info"><?php echo $steps[2]['step_description']; ?></p>
                                    <fieldset>
                                        <div class="form-group validactivationcode">
                                            <input class="form-control" name="imf" id="activationcode" type="text" placeholder="Enter International Monetary Funds Code" required data-error="Please enter Activation Code" />
                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="theactivationcode" id="theactivationcode" type="text" value="<?php echo $arrpayment1['imf']; ?>" required data-error="Please enter activation code" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                        
                                        
                                        <div class="form-group signUpForm-step-2">
                                            
                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" type="button" onclick="nextStep()">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($steps[3])): ?>
                                <div id="section-3" class="section">
                                    <h3><?php echo $steps[3]['step_name']; ?></h3>
                                    <p id="step-3-info"><?php echo $steps[3]['step_description']; ?></p>
                                    <fieldset>
                                        <h3 class="section-form-title">Antivation Code</h3>
                                        <div class="form-group validatc">
                                            <input class="form-control" name="atc" id="atc" type="text" placeholder="Enter Activation Code" required data-error="Please enter ATC" />
                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="theatc" id="theatc" type="text" value="<?php echo $arrpayment1['activationcode']; ?>" required data-error="Please enter atc code" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                        
                                        
                                        
                                        <div class="form-group signUpForm-step-3">
                                            
                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" type="button" onclick="nextStep()">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($steps[4])): ?>
                                <div id="section-4" class="section">
                                    <h3><?php echo $steps[4]['step_name']; ?></h3>
                                    <p id="step-4-info"><?php echo $steps[4]['step_description']; ?></p>
                                    <fieldset>
                                        <h3 class="section-form-title">Tax Code</h3>
                                        <div class="form-group validtaxcode">
                                            <input class="form-control" name="taxcode" id="taxcode" type="text" placeholder="Enter Tax Code" required data-error="Please enter Tax Code" />
                                            <div class="input-group-icon"><i class="mdi mdi-microsoft-visual-studio-code"></i></div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                                            <input class="form-control" type="hidden" name="theatc" id="thetaxcode" type="text" value="<?php echo $arrpayment1['taxcode']; ?>" required data-error="Please enter taxcode" />
                                                            <div class="input-group-icon" style="display:none;"><i class="fas fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                        
                                        
                                        <div class="form-group signUpForm-step-4">
                                            
                                            <button class="btn btn-secondary float-right w-xs waves-effect waves-light" type="button" onclick="nextStep()">Next <span class="mdi mdi-arrow-right-thin-circle-outline"></span></button>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($steps[5])): ?>
                                <div id="section-5" class="section">
                                    <h3><?php echo $steps[5]['step_name']; ?></h3>
                                    <p id="step-5-info"><?php echo $steps[5]['step_description']; ?></p>
                                    <fieldset>
                                        <div class="form-group signUpForm-step-5">
                                            
                                             <button id="Submit" name="pay2" id="pay2" class="btn btn-secondary float-right w-xs waves-effect waves-light" type="submit">Transfer Now. . .</button>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<script>

var steps = <?php echo json_encode($steps); ?>;
console.log('Steps from PHP:', steps); 


var currentStepIndex = 0;

function nextStep() {
    const sections = document.querySelectorAll('.section');
    const currentSection = sections[currentStepIndex];

    // Get the input value from the current section
    const inputField = currentSection.querySelector('input[type="text"]');
    const hiddenInputField = currentSection.querySelector('input[type="hidden"]');
    

    const errorMessageDiv = currentSection.querySelector('.help-block.with-errors');
    if (errorMessageDiv) {
        errorMessageDiv.innerText = ''; 
    }

    // Validation check
    if (inputField && hiddenInputField) {
        const userInput = inputField.value.trim();
        const expectedValue = hiddenInputField.value.trim();

        if (userInput === expectedValue) {
            
            currentSection.style.display = 'none';
          
            currentStepIndex++;
            
            
            while (currentStepIndex < sections.length && sections[currentStepIndex].style.display === 'block') {
                currentStepIndex++;
            }

            if (currentStepIndex < sections.length) {
                sections[currentStepIndex].style.display = 'block'; 
            }
        } else {
            // Invalid input: Show error message in the help-block
            if (errorMessageDiv) {
                errorMessageDiv.innerText = 'Code entered is incorrect.'; 
            }
        }
    } else {
       
        if (currentStepIndex === sections.length - 1) {
            document.getElementById('pay2').click(); 
        }
    }
}


function hideAllSections() {
    const sections = document.querySelectorAll('.section');
    sections.forEach((section, index) => {
        section.style.display = (index === 0) ? 'block' : 'none'; 
    });
}

// Call the function when the document is ready
document.addEventListener('DOMContentLoaded', () => {
    hideAllSections();
});
</script>








