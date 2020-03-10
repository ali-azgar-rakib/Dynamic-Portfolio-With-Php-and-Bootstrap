<?php
require_once "user_auth.php";
ob_start();
$title="Add About Me";
require_once "header.php";
require_once "db.php";

$data_from_db = $dbcon->query("SELECT * FROM about_me");
$about_me_data = $data_from_db->fetch_assoc();

if(isset($_POST['submit'])){
	$name       = $_POST['name'];
	$intro      = $_POST['intro'];
	$details    = $_POST['details'];
	$photo      = $_FILES['photo']['name'];
	$photo_ext  = explode('.', $photo);
	$photo_name = $name.".".end($photo_ext);

	if(!empty($name) &&!empty($intro) && !empty($details) && !empty($photo_name)){

		// remove present image
		$select_photo =$dbcon->query("SELECT photo FROM about_me WHERE id=1");
		$old_photo_name = $select_photo->fetch_assoc();
		$photo_link = "image/profile/".$old_photo_name['photo'];
		unlink($photo_link);



		$work_insert = $dbcon->query("UPDATE about_me SET name='$name',intro='$intro',details='$details',photo='$photo_name' WHERE id=1");
		if($work_insert){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'image/profile/'.$photo_name);
			$_SESSION['about_me_success'] = "Updated Successfully!";
			header('location: about_me_main.php');
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
                                    <h4 class="header-title mb-4">About me</h4>

																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="form-group">
																					<label for="project_name">Name</label>
																					<input type="text" class="form-control" name="name" value="<?=$about_me_data['name']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Intro</label>
																					<input type="text" class="form-control" name="intro" value="<?=$about_me_data['intro']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Details about me</label>
																					<input type="text" class="form-control" name="details" value="<?=$about_me_data['details']?>">
																				</div>


																				<div class="form-group">
																					<input class="form-control" type="file" name="photo">
																					<label for="">Upload photo</label>
																				</div>
																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Edit Data" name="submit">
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
