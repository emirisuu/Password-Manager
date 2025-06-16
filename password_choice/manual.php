<?php
    require_once "../functions/add_password.php";
    require_once "../db_config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $website_name = $_POST['website'];
        $password = $_POST['password'];
        add_password($website_name, $password, $db);
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<div>
    <h1 style="text-align:center">Password Manager</h1>
</div>
<div>
    <form action="manual.php" method="post" autocomplete="off">
        <label for="website">Website name</label><br>
        <input type="text" id="website" name="website" required><br>
        <label for="password">Password</label><br>
        <input type="text" id="password" name="password" required><br>
        <input type="submit" value="Add" class='btn btn-primary btn-sm'>
    </form>
</div>
</body>
</html>