<?php
session_start();
require_once 'db.php'; 

$id = base64_decode($_GET['id']);
$dbcon->query("DELETE FROM my_best_works WHERE id=$id");
$_SESSION['best_works_delete'] = 'Delete Successfully!';
header('location: best_works.php');


?>