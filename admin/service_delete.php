<?php
session_start();
require_once "db.php"; 
$id = base64_decode($_GET['id']);
$dbcon->query("DELETE FROM services WHERE id=$id");
$_SESSION['service_delete'] = "Delete Successfully!";
header('location: services.php');

?>