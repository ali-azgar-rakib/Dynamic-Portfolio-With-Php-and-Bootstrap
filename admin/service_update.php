<?php 
require_once "user_auth.php";
ob_start();
$title="Add Services";
require_once "header.php";
require_once "db.php";

$id = base64_decode($_GET['id']);

$service_from_db = $dbcon->query("SELECT * FROM services WHERE id=$id");
$service_data = $service_from_db->fetch_assoc();

if(isset($_POST['submit'])){
	$title        = $_POST['title'];
	$some_text    = $_POST['some_text'];
 	

	if(!empty($title) &&!empty($some_text)){
		$service_update = $dbcon->query("UPDATE services SET title='$title',some_text='$some_text' WHERE id=$id");
		if($service_update){
			$_SESSION['service_update'] = "Update Successfully!";
			header('location: services.php');
			ob_end_flush();

		}
		
	}

}




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Add Service</h4>

																			<form action="" method="post" >
																				<div class="form-group">
																					<label for="project_name">Service Name</label>
																					<input type="text" class="form-control" name="title" value="<?=$service_data['title']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Add Details</label>
																					<input type="text" class="form-control" name="some_text" value="<?=$service_data['some_text']?>">
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
