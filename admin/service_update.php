<?php 
require_once "user_auth.php";
ob_start();
$title="Update Services";
require_once "header.php";
require_once "db.php";

$id = base64_decode($_GET['id']);

$service_from_db = $dbcon->query("SELECT * FROM services WHERE id=$id");
$service_data = $service_from_db->fetch_assoc();

if(isset($_POST['submit'])){
	$icon         = $_POST['icon'];
	$title        = $_POST['title'];
	$some_text    = $_POST['some_text'];
 	

	if(!empty($title) &&!empty($some_text)){
		$service_update = $dbcon->query("UPDATE services SET icon='$icon',title='$title',some_text='$some_text' WHERE id=$id");
		if($service_update){
			$_SESSION['service_update'] = "Update Successfully!";
			header('location: services.php');
			ob_end_flush();

		}
		
	}

}




?>
	<div class="card text-dark mb-3" >
	  <div class="card-header bg-success text-center display-4">Update Service</div>
	  	<div class="card-body">

						<form action="" method="post" >

							<div class="form-group">
								<label for="project_name">Service Icon</label>
								<input type="text" class="form-control" name="icon" value="<?=$service_data['icon']?>">
							</div>

							<div class="form-group">
								<label for="project_name">Service Name</label>
								<input type="text" class="form-control" name="title" value="<?=$service_data['title']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Add Details</label>
								<textarea name="some_text" class="form-control" cols="100%" rows="10"><?=$service_data['some_text']?></textarea>
							</div>



							<div class="form-group">
								<input class="btn btn-block btn-success" type="submit" value="Update" name="submit">
							</div>

						</form>
				</div>
		</div>



<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
