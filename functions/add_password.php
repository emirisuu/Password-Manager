<?php
include_once "../classes/aes.php";

session_start();

function add_password($website_name, $password, $db) {
    $db = $db;
    $website_name = $website_name;
    $password = $password;
    $username = $_SESSION['username'];

    $query = "SELECT AES_Key FROM accounts WHERE Username='$username'";
    $result = $db -> query($query);
    $result = $result -> fetch_assoc();
    $aes_key = $result['AES_Key'];

    $aes = new AES($aes_key);
    $encryption_result = $aes -> encrypt($password);
    $encrypted_password = $encryption_result[0];
    $iv = base64_encode($encryption_result[1]);

    $query = "INSERT INTO passwords (Owner_Username, Website, Password, IV) VALUES (?, ?, ?, ?)";
    $statement = $db -> prepare($query);
    $statement -> bind_param("ssss", $username, $website_name, $encrypted_password, $iv);
    $statement -> execute();
    header("Location: ../manager.php");
}