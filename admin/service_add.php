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
			$_SESSION['service_add'] = "Add successfully!";
			header("location: services.php");
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
                                    <h4 class="header-title mb-4">Add Service</h4>

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
																					<input type="text" class="form-control" name="some_text">
																				</div>

																				


																				
																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Add" name="submit">
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
