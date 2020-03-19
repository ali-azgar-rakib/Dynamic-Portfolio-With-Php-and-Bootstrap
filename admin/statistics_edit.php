<?php 
require_once "user_auth.php";
ob_start();
$title="Update Statistics";
require_once "header.php";
require_once "db.php";

$data_from_db_query = $dbcon->query("SELECT * FROM stastistics");
$data_from_db = $data_from_db_query->fetch_assoc();

if(isset($_POST['submit'])){
	$feature_item = $_POST['feature_item'];
	$active_products = $_POST['active_products'];
	$experience = $_POST['experience'];
	$clients = $_POST['clients'];


	if(!empty($feature_item) && !empty($active_products) && !empty($experience) && !empty($clients)){
		$fact_information_update = $dbcon->query("UPDATE stastistics SET feature_item='$feature_item',active_products='$active_products',experience='$experience',clients='$clients' WHERE id=1");
		$_SESSION['stastistics_update'] = "Update Successfully";
		header('location: statistics.php');
		ob_end_flush();
		 
	}

}




?>


<!-- Start Page content -->
	<div class="card text-dark mb-3" >
		<div class="card-header bg-success text-center"><h2>Update Statistics</h2></div>
			<div class="card-body">

						<form action="" method="post" >
							<div class="form-group">
								<label for="project_name">Feature Item</label>
								<input type="text" class="form-control" name="feature_item" value="<?=$data_from_db['feature_item']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Active Products</label>
								<input type="text" class="form-control" name="active_products" value="<?=$data_from_db['active_products']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Experience</label>
								<input type="text" class="form-control" name="experience" value="<?=$data_from_db['experience']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Clients</label>
								<input type="text" class="form-control" name="clients" value="<?=$data_from_db['clients']?>">
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
