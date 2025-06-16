<?php
    require_once "../functions/add_password.php";
    require_once "../db_config.php";
    require_once "../classes/password_generator.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $website_name = $_POST['website'];
        $uppercase_characters = $_POST['uppercase'];
        $lowercase_characters = $_POST['lowercase'];
        $numerical_characters = $_POST['numerical'];
        $special_characters = $_POST['special'];

        $password_generator = new PasswordGenerator($uppercase_characters, $lowercase_characters, $numerical_characters, $special_characters);
        $password = $password_generator -> generate_password();
        add_password($website_name, $password, $db);
    }
?>
<html lang="en">
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
    <form action="generated.php" method="post" autocomplete="off">
        <label for="website">Website name</label><br>
        <input type="text" id="website" name="website" required><br>
        <label for="uppercase">Uppercase characters</label><br>
        <input type="number" id="uppercase" name="uppercase" min="1" max="8" required><br>
        <label for="lowercase">Lowercase characters</label><br>
        <input type="number" id="lowercase" name="lowercase" min="1" max="8" required><br>
        <label for="numerical">Numerical characters</label><br>
        <input type="number" id="numerical" name="numerical" min="1" max="8" required><br>
        <label for="special">Special characters</label><br>
        <input type="number" id="special" name="special" min="1" max="8" required><br>
        <input type="submit" value="Generate" class='btn btn-primary btn-sm'>
    </form>
</div>
</body>
</html>