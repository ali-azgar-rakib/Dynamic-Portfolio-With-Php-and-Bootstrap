<?php 
require_once "user_auth.php";
$title="Add Fact Contact Information";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$feature_item = $_POST['feature_item'];
	$active_products = $_POST['active_products'];
	$experience = $_POST['experience'];
	$clients = $_POST['clients'];


	if(!empty($feature_item) && !empty($active_products) && !empty($experience) && !empty($clients)){
		$fact_information_update = $dbcon->query("UPDATE fact_informations SET feature_item='$feature_item',active_products='$active_products',experience='$experience',clients='$clients' WHERE id=1");
		 
	}

}




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Information</h4>

																			<form action="" method="post" >
																				<div class="form-group">
																					<label for="project_name">Feature Item</label>
																					<input type="text" class="form-control" name="feature_item">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Active Products</label>
																					<input type="text" class="form-control" name="active_products">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Experience</label>
																					<input type="text" class="form-control" name="experience">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Clients</label>
																					<input type="text" class="form-control" name="clients">
																				</div>
																				
																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Add Work" name="submit">
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
