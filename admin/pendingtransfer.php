<?php
session_start();
error_reporting(0);
include("../config/theconfig.php");
include("header.php");

if (!($_SESSION["adminid"])) {
    header("Location: login.php");
}

$loan = mysql_query("SELECT * FROM transfers WHERE status=0");
?>

<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

        <!-- Page Header -->
        <div class="dt-page__header">
            <h1 class="dt-page__title">Pending Transfer</h1>
        </div>

        <!-- Grid -->
        <div class="row">
            <?php
            if (isset($_POST["approve"])) {
                $sqq = "UPDATE transfers SET status = 1 WHERE id = '".$_POST["approve"]."'";

                // Approve success SweetAlert with no page reload
                echo "
                    <script>
                        swal({
                            title: 'Successful!',
                            text: 'Cash Transfer Has Been Approved! Please ensure you have credited the account number',
                            icon: 'success',
                            buttons: true
                        }).then(function() {
                            window.location.href = 'pendingtransfer.php';
                           
                        });
                    </script>
                ";

                if (!mysql_query($sqq)) {
                    die('Error: ' . mysql_error());
                }
            }

            if (isset($_POST["backdate"])) {
                $newDateTime = $_POST['new_datetime'];
                $id = $_POST['id'];
                $backdateQuery = "UPDATE transfers SET date = '$newDateTime' WHERE id = '$id'";

                if (mysql_query($backdateQuery)) {
                    // Backdate success SweetAlert with no page reload
                    echo "
                        <script>
                            swal({
                                title: 'Date Updated',
                                text: 'The transfer date and time have been updated successfully',
                                icon: 'success',
                                buttons: true
                            }).then(function() {
                                window.location.href = 'pendingtransfer.php';
                                
                            });
                        </script>
                    ";
                } else {
                    // Backdate error SweetAlert
                    echo "
                        <script>
                            swal({
                                title: 'Error',
                                text: 'Unable to update the date and time',
                                icon: 'error',
                                buttons: true
                            }).then(function() {
                                window.location.href = 'pendingtransfer.php';
                            });
                        </script>
                    ";
                }
            }
            ?>

            <!-- Grid Item -->
            <div class="col-xl-12">

                <!-- Entry Header -->
                <div class="dt-entry__header">
                    <div class="dt-entry__heading">
                        <h3 class="dt-entry__title">Mobile Transfer To Other Banks</h3>
                    </div>
                </div>

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">

                        <!-- Tables -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Receiver's Name</th>
                                    <th>Receiver's Bank</th>
                                    <th>Bank Address</th>
                                    <th>Swift/Routing Number (For International Transfer)</th>
                                    <th>Bank Account No</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                while ($arrvar = mysql_fetch_array($loan)) {
                                    echo "
                                        <tr>
                                            <td>$arrvar[name]</td>
                                            <td>$arrvar[bank]</td>
                                            <td>$arrvar[address]</td>
                                            <td>$arrvar[swift]</td>
                                            <td>$arrvar[receiver]</td>
                                            <td>$cur $arrvar[amount]</td>
                                            <td>$arrvar[date]</td>
                                            <td>
                                                <form method='post' action=''>
                                                    <input hidden value='$arrvar[id]' name='approve'>
                                                    <input type='submit' class='btn btn-primary' name='pay'  value='Approve' />
                                                </form>
                                                <button class='btn btn-info' data-toggle='modal' data-target='#backdateModal-$arrvar[id]'>Backdate</button>
                                            </td>
                                        </tr>

                                        <!-- Modal for Backdate -->
                                        <div class='modal fade' id='backdateModal-$arrvar[id]' tabindex='-1' role='dialog' aria-labelledby='backdateModalLabel-$arrvar[id]' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='backdateModalLabel-$arrvar[id]'>Backdate Transfer</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <form method='post' action=''>
                                                            <div class='form-group'>
                                                                <label for='new_datetime-$arrvar[id]'>Select New Date</label>
                                                                <input type='text' class='form-control datetimepicker' id='new_datetime-$arrvar[id]' name='new_datetime' required>
                                                                <input type='hidden' name='id' value='$arrvar[id]'>
                                                            </div>
                                                            <button type='submit' class='btn btn-primary' name='backdate'>Update Date & Time</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                    $i++;
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Receiver's Name</th>
                                    <th>Receiver's Bank</th>
                                    <th>Bank Address</th>
                                    <th>Swift/Routing Number</th>
                                    <th>Bank Account No</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /tables -->

                    </div>
                    <!-- /card body -->

                </div>
                <!-- /card -->

            </div>
            <!-- /grid item -->

        </div>
        <!-- /grid -->

    </div>
    <!-- /site content -->

<?php include 'footer.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr('.datetimepicker', {
            enableTime: true,
            time_24hr: true,
            enableSeconds: true,
            dateFormat: 'Y-m-d H:i:S'
        });
    });
</script>

<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>
