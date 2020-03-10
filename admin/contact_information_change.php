<?php 
require_once "user_auth.php";
ob_start();
$title="Contact Information";
require_once "header.php";
require_once "db.php";

$query = "SELECT * FROM contact_information";
$result = $dbcon -> query($query);

$row = $result -> fetch_assoc();

if(isset($_POST['submit'])){
	$small_text = $_POST['small_text'];
	$office = $_POST['office'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];


	if(!empty($small_text) && !empty($office) && !empty($address) && !empty($phone) && !empty($email)){
		$fact_information_update = $dbcon->query("UPDATE contact_information SET small_text='$small_text',office='$office',address='$address',phone='$phone',email='$email' WHERE id=1");
		$_SESSION['contact_information_change'] = "Information change successfully!";
		header('location: contact_information.php');
		ob_end_flush();
		 
	}

}




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Contact Information</h4>

																			<form action="" method="post" >
																				<div class="form-group">
																					<label for="project_name">Details</label>
																					<input type="text" class="form-control" name="small_text" value="<?=$row['small_text']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Office</label>
																					<input type="text" class="form-control" name="office" value="<?=$row['office']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Address</label>
																					<input type="text" class="form-control" name="address" value="<?=$row['address']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Phone</label>
																					<input type="text" class="form-control" name="phone" value="<?=$row['phone']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Email</label>
																					<input type="text" class="form-control" name="email" value="<?=$row['email']?>">
																				</div>
																				
																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Update" name="submit">
																				</div>

																			</form>


                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
