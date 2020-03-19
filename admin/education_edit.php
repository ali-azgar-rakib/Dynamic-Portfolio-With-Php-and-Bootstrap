<?php
ob_start(); 
require_once "user_auth.php";
$title="Add Education Information";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$degree_name       = $_POST['degree_name'];
	$year              = $_POST['year'];
	$progressbar       = $_POST['progressbar'];
	

	if(!empty($degree_name) &&!empty($year) && !empty($progressbar)){
		$work_insert = $dbcon->query("INSERT INTO education_informations(degree_name,year,progressbar) VALUES('$degree_name','$year','$progressbar')");
		if($work_insert){
			$_SESSION['education_add_success'] = "Degree add Successfully!";
			header('location: education.php');
			ob_end_flush();
		}
		
	}

}




?>


<!-- Start Page content -->
 	<div class="card text-dark mb-3" >
	  <div class="card-header bg-success text-center "><h2>Add Degree</h2></div>
	  <div class="card-body">

			<form action="" method="post" >
				<div class="form-group">
					<label for="project_name">Degree Name</label>
					<input type="text" class="form-control" name="degree_name">
				</div>

				<div class="form-group">
					<label for="project_catagory">Year</label>
					<input type="text" class="form-control" name="year">
				</div>

				<div class="form-group">
					<label for="project_catagory">Progressbar</label>
					<input type="text" class="form-control" name="progressbar">
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
