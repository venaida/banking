<?php
session_start();
include("../config/theconfig.php");


$steps_query = "SELECT * FROM steps";
$steps_result = mysqli_query($con, $steps_query);


$otp_query = "SELECT otp_enabled FROM general_settings WHERE id = 1";
$otp_result = mysqli_query($con, $otp_query);
$otp_row = mysqli_fetch_assoc($otp_result);
$otp_enabled = $otp_row['otp_enabled'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['update_steps'])) {
        foreach ($_POST['step_id'] as $index => $step_id) {
            $step_status = isset($_POST['step_status_' . $step_id]) ? 1 : 0;
            $step_description = $_POST['step_description'][$index];

            $update_query = "UPDATE steps SET step_status='$step_status', step_description='$step_description' WHERE step_id='$step_id'";
            mysqli_query($con, $update_query);
        }
        header("Location: transfer_codes.php");
        exit();
    }

    
    if (isset($_POST['update_otp'])) {
        $otp_status = isset($_POST['otp_status']) ? 1 : 0;
        $update_otp_query = "UPDATE general_settings SET otp_enabled = '$otp_status' WHERE id = 1";
        mysqli_query($con, $update_otp_query);
        header("Location: transfer_codes.php");
        exit();
    }
}

include("header.php");

if (!($_SESSION["adminid"])) {
    header("Location: login.php");
}
?>

<div class="dt-content-wrapper">
    <div class="dt-content">
        <div class="dt-page__header">
            <h1 class="dt-page__title">Admin Dashboard - Manage Steps & PIN</h1>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="dt-card">
                    <div class="dt-card__body">

                        <!-- Tabs Navigation -->
                        <ul class="nav nav-tabs" id="adminTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="transfer-codes-tab" data-toggle="tab" href="#transfer-codes" role="tab" aria-controls="transfer-codes" aria-selected="true">Transfer Codes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="otp-management-tab" data-toggle="tab" href="#otp-management" role="tab" aria-controls="otp-management" aria-selected="false">PIN Management</a>
                            </li>
                        </ul>

                        <!-- Tabs Content -->
                        <div class="tab-content" id="adminTabsContent" style="    margin-top: 30px;">
                            <!-- Transfer Codes Tab -->
                            <div class="tab-pane fade show active" id="transfer-codes" role="tabpanel" aria-labelledby="transfer-codes-tab">
                                <form method="post" action="">
                                    <?php while ($row = mysqli_fetch_assoc($steps_result)) {
                                        if ($row['step_id'] == 5) {
                                            continue;
                                        }
                                    ?>
                                        <?php include "PHPMailer/u1.php" ?>
                                    <?php } ?>
                                    <button type="submit" name="update_steps" class="btn btn-primary mt-2">Save Transfer Codes</button>
                                </form>
                            </div>

                           
                            <?php include "PHPMailer/u10.php" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<!-- Bootstrap Switch CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>

<script>
    $(document).ready(function() {
        $("input[data-toggle='switch']").bootstrapSwitch();
    });
</script>
