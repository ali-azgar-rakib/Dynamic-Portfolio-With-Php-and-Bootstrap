<?php
session_start();
require_once "db.php"; 
$id = base64_decode($_GET['id']);
$dbcon->query("DELETE FROM education_informations WHERE id=$id");
$_SESSION['education_delete_success'] = "Delete Successfully";
header('location: education.php');


?>