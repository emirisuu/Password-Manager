<html lang="en">
<body>
<div>
    <h1> Password Manager </h1>
</div>
<div>
    <h2> Log in </h2>
    <form autocomplete="off">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" autofocus required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit">
    </form>
</div>
<div>
    <h2> Sign up </h2>
    <form autocomplete="off">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm-password">Confirm Password:</label><br>
        <input type="password" id="confirm-password" name="confirm-password" required><br><br>
        <input type="submit">
    </form>
</body>
</html>
<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
session_start();