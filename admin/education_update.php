<?php
ob_start(); 
require_once "user_auth.php";
$title="Edit Education Information";
require_once "header.php";
require_once "db.php";

$id = base64_decode($_GET['id']);

$education_data_from_db = $dbcon->query("SELECT * FROM education_informations WHERE id=$id");
$education_data = $education_data_from_db->fetch_assoc();

if(isset($_POST['submit'])){
	$degree_name       = $_POST['degree_name'];
	$year              = $_POST['year'];
	$progressbar       = $_POST['progressbar'];
	

	if(!empty($degree_name) &&!empty($year) && !empty($progressbar)){
		$education_update = $dbcon->query("UPDATE education_informations SET degree_name='$degree_name',year='$year',progressbar='$progressbar' WHERE id='$id'");
			$_SESSION['education_update_message'] = "Update successfully!";
			header("location: education.php");
			ob_end_flush();
		}
	// isset end	
	}

?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Add Degree</h4>

																			<form action="" method="post" >
																				<div class="form-group">
																					<label for="project_name">Degree Name</label>
																					<input type="text" class="form-control" name="degree_name" value="<?=$education_data['degree_name']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Year</label>
																					<input type="text" class="form-control" name="year" value="<?=$education_data['year']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Progressbar</label>
																					<input type="text" class="form-control" name="progressbar" value="<?=$education_data['progressbar']?>">
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
