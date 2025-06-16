<?php
require_once "../db_config.php";
include_once "../classes/account.php";
include_once "../classes/aes.php";

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

$error_message = "Usernames must be less than or equal to 30 characters
 and passwords must match in order to create an account";

$_SESSION['message'] = $error_message;  

if (strlen($username) > 30) {
    echo $_SESSION['message'];
}
elseif ($password != $confirm_password) {
    echo $_SESSION['message'];
}
else {
    $query = "SELECT * FROM accounts WHERE Username='$username'";
    $result = $db -> query($query);
    if ($result->num_rows > 0) {
        $_SESSION['message'] = "User already registered, try a different username";
        echo $_SESSION['message'];
    }
    else {
        $aes = new AES($password);
        $aes_key = random_bytes(32);
        $encryption_result = $aes -> encrypt($aes_key);
        $encrypted_aes_key = $encryption_result[0];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $new_account = new Account($username, $hashed_password, $encrypted_aes_key, $db);
        $_SESSION['message'] = $new_account -> register_user();
        
    }
}
header("Location: ../");