<?php
require_once "../db_config.php";

session_start();

$username = $_POST['username'];
$password =$_POST['password'];

$query = "SELECT Password FROM accounts WHERE Username='$username'";
$result = $db -> query($query);

if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        if(password_verify($password, $row['Password'])) {
            header("Location: ../manager.php");
        }
        else {
            $_SESSION['message'] = "Incorrect password.";
            header("Location: ../");
        }
    }
}
else {
    $_SESSION['message'] = "No registered user found.";
    header("Location: ../");
}