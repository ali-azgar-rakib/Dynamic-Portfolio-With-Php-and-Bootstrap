<?php
session_start(); 
require_once "db.php";

$id = base64_decode($_GET['id']);


$select_photo_query = $dbcon->query("SELECT photo FROM testimonials WHERE id=$id");
$select_photo = $select_photo_query->fetch_assoc();
$photo_link = "image/customers/".$select_photo['photo'];
unlink($photo_link);

$update_query = $dbcon->query("DELETE FROM testimonials WHERE id=$id");
$_SESSION['testimonial_delete'] = "Delete Successfully!";
header('location: all_testimonials.php');

?>