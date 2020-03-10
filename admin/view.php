<?php 
require_once "user_auth.php";
$title = "View guest message";
require_once "header.php";
require_once "db.php";

$id = base64_decode($_GET['id']);

$message_query = $dbcon->query("SELECT * FROM guest_messages WHERE id=$id");
$message = $message_query->fetch_assoc();

if($message['status']==1){
	echo "yes";
	$upadate = $dbcon->query("UPDATE guest_messages SET status=2 WHERE id=$id");
}

?>

<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Message</h4>

																			<?=$message['message']?>

                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>