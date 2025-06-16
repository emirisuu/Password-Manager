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
        <input type="submit" value="Add new password"> <br>
        <button type="button" onclick="location.href='index.php'">Log out</button>
    </form>
</div>
<div class="table-container">
    <table class="table table-bordered table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
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
                        <a href='functions/delete_password.php?id=$id'>Delete</a>
                      </td>
                    </tr>
                ");
            }
        }
        ?>
    </tbody>
    </table>
</div>
</body>
</html>