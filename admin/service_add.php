<?php 
require_once "user_auth.php";
ob_start();
$title="Add Services";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$icon         = $_POST['icon'];
	$title        = $_POST['title'];
	$some_text    = $_POST['some_text'];
 	

	if(!empty($title) && !empty($some_text)){
		$query = "INSERT INTO services (icon,title,some_text) VALUES('$icon','$title','$some_text')";
			$service_insert = $dbcon->query($query);
			if($service_insert){
			$_SESSION['service_add'] = "Add successfully!";
			header("location: services.php");
			ob_end_flush();
			}		
		}
		
	}






?>


<!-- Start Page content -->
 	<div class="card text-dark mb-3" >
	  <div class="card-header bg-success text-center "><h2>Services</h2></div>
	  <div class="card-body">

					<form action="" method="post" >
						<div class="form-group">
							<label for="project_name">Service Name</label>
							<input type="text" class="form-control" name="title">
						</div>

						<div class="form-group">
							<label for="project_name">Service Icon</label>
							<input type="text" class="form-control" name="icon">
						</div>

						<div class="form-group">
							<label for="project_catagory">Add Details</label>
							<textarea name="some_text" class="form-control"></textarea>
						</div>

						
						<div class="form-group">
							<input class="btn btn-block btn-success" type="submit" value="Add" name="submit">
						</div>

					</form>
				</div>
			</div>


                               
<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
