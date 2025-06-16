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
        <input type="submit" value="Add">
    </form>
</div>
</body>
</html>