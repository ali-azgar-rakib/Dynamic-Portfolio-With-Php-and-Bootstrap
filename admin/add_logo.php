<?php 
require_once "user_auth.php";
ob_start();
$title="Add Logo";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$random_number  = mt_rand(1, 99999); 
	$photo      		= $_FILES['photo']['name'];
	$photo_ext  		= explode('.', $photo);
	$photo_name 		= $random_number.".".end($photo_ext);

	if(!empty($photo_name)){
		$work_insert = $dbcon->query("INSERT INTO logo (photo) VALUES('$photo_name')");
		if($work_insert){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'image/logo/'.$photo_name);
			$_SESSION['logo_add'] = "Added Successfully!";
			header('location: logo.php');
			ob_end_flush();
		} 
	}

}




?>


<div class="card text-dark mb-3">

    <div class="card-header bg-success text-center"><h3>Upload logo</h3></div>

          <div class="card-body text-center">

							<form action="" method="post" enctype="multipart/form-data">
								
								<div class="form-group">
									<label for="photo">Upload photo</label>
									<input class="form-control mx-auto m-4" type="file" name="photo" name="photo" style="width: 50%;">
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
