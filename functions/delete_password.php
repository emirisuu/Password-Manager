<?php
require_once "../db_config.php";

$id = $_GET['id'];

$query = "DELETE FROM passwords WHERE ID='$id'";
$db -> query($query);
header("Location: ../manager.php");