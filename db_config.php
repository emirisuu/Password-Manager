<?php

$host = "localhost";
$db_name = "password_manager";
$username = "root";
$password = "";

$db = new mysqli($host, $username, $password, $db_name);

if ($db -> connect_error) {
    die("Connection failed: ". $db -> connect_error);
}