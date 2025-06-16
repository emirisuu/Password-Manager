<?php
require_once "db_config.php";
require_once "classes/aes.php";
session_start();

$username = $_SESSION['username'];

$query = "SELECT AES_Key FROM accounts WHERE Username='$username'";
$result = $db -> query($query);
$result = $result -> fetch_assoc();
$aes_key = $result['AES_Key'];

$query = "SELECT * FROM passwords WHERE Owner_Username='$username'";
$result = $db -> query($query);


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
    <h2> Welcome <?php echo $_SESSION['username'] ?> </h2>
    <form id="choice">
        <input type="radio" onclick="document.getElementById('choice').action='password_choice/manual.php';" id="manual" name="password-type" value="Manual">
        <label for="manual">Manual</label><br>
        <input type="radio" onclick="document.getElementById('choice').action='password_choice/generated.php';" id="generated" name="password-type" value="Generated">
        <label for="generated">Generated</label> <br>
        <input type="submit" value="Add new password" class='btn btn-primary btn-sm'> <br>
        <button type="button" onclick="location.href='index.php'" class='btn btn-danger btn-sm'>Log out</button>
    </form>
</div>
<div">
    <table class="table table-striped table-bordered">
    <thead>
        <tr class="table-dark">
            <th>Website</th>
            <th>Password</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $password_decrypter = new AES($aes_key);
        if($result && $result -> num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
                // echo $row['Password'];
                // echo $row['Date_Created'];
                $original_password = $password_decrypter -> decrypt($row['Password'], $row['IV']);
                $id = $row['ID'];
                echo ("
                    <tr>
                      <td>" . $row['Website'] . "</td>
                      <td>" . $original_password . "</td>
                      <td>" . $row['Date_Created'] . "</td>
                      <td>
                        <a href='functions/delete_password.php?id=$id' class='btn btn-danger btn-sm'>Delete</a>
                      </td>
                    </tr>
                ");
            }
        }
        ?>
    </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>