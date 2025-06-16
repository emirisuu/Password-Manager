<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
session_start();
if(isset($_SESSION['username'])) session_unset();
include "db_config.php";
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<div>
    <h1 style="text-align:center;"> Password Manager </h1>
</div>
<div>
    <h2> Log in </h2>
    <form autocomplete="off" action="functions/log_in.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" autofocus required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" class='btn btn-primary btn-sm'>
    </form>
</div>
<div>
    <h2> Sign up </h2>
    <form autocomplete="off" action="functions/sign_up.php" target="_self" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm-password">Confirm Password:</label><br>
        <input type="password" id="confirm-password" name="confirm-password" required><br><br>
        <input type="submit" class='btn btn-primary btn-sm'>
    </form>
    <?php isset($_SESSION['message']) ? print($_SESSION['message']) : print(""); ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>