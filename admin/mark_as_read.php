<?php
require_once "db.php"; 
$id = base64_decode($_GET['id']);
$upadate_status = $dbcon -> query("UPDATE guest_messages SET status=2 WHERE id=$id");
header('location: all_guest_message.php'); 


?>