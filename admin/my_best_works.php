<?php 
require_once "user_auth.php";
$title="Add my best works";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$work_name = $_POST['work_name'];
	$work_catagory = $_POST['project_catagory'];
	$photo     = $_FILES['photo']['name'];
	$photo_ext = explode('.', $photo);
	$photo_name = $work_name.".".end($photo_ext);

	if(!empty($work_name) &&!empty($work_catagory) && !empty($photo_name)){
		$work_insert = $dbcon->query("INSERT INTO my_best_works (works_name,catagory,photo) VALUES('$work_name','$work_catagory','$photo_name')");
		if($work_insert){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'image/my_best_works/'.$photo_name);
			echo "done";
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
                                    <h4 class="header-title mb-4">My best work add form</h4>

																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="form-group">
																					<label for="project_name">Project Name</label>
																					<input type="text" class="form-control" name="work_name">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Catagory</label>
																					<input type="text" class="form-control" name="project_catagory">
																				</div>
																				<div class="form-group">
																					<input class="form-control" type="file" name="photo">
																					<label for="">Upload photo</label>
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
