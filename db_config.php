<?php

$host = "localhost";
$db_name = "password_manager";
$username = "root";
$password = "";

$db = new mysqli($host, $db_name, $username, $password);

if ($db -> connect_error) {
    die("Connection failed: ". $db -> connect_error);
}