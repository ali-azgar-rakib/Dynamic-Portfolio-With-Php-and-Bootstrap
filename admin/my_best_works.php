<?php 
require_once "user_auth.php";
ob_start();
$title="Add my best works";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$work_name     = $_POST['work_name'];
	$work_catagory = $_POST['project_catagory'];
	$photo         = $_FILES['photo']['name'];
	$photo_ext_arr = explode('.', $photo);
	$photo_ext     = end($photo_ext_arr);
	

	if(!empty($work_name) && !empty($work_catagory) ){
		$work_insert = $dbcon->query("INSERT INTO my_best_works (works_name,catagory) VALUES('$work_name','$work_catagory')");
		if($work_insert){

			if(!empty($photo)){
				// if not empty
				if($_FILES['photo']['size']<2000000){
					// if photo in specific size
					$accepted_extension_list = ['png','jpg','jpeg'];
					if( in_array(strtolower($photo_ext),$accepted_extension_list) ){

						$last_id = $dbcon->insert_id;
						$photo_name    = $last_id.".".$photo_ext;
						// upload photo
						$update_photo =$dbcon->query("UPDATE my_best_works SET photo='$photo_name' WHERE id=$last_id");


						move_uploaded_file($_FILES['photo']['tmp_name'], 'image/my_best_works/'.$photo_name);
						$_SESSION['best_works_success'] = "Added Successfully!";
						header('location: best_works.php');
						ob_end_flush();
					}
					// photo extension check end
				} 
				// file size check end
			}else{
				// data add without photo
				$_SESSION['best_works_success'] = "Added Successfully!";
				header('location: best_works.php');
				ob_end_flush();			
			} 

				
		}
		// if work end 
	} 
	// if empty check
}
// isset end


?>


															<!-- card start -->
	                          	<div class="card mb-3" >
															  <div class="card-header bg-success text-center"><h2>Add My Best Works</h2></div>

															  <!-- card body start -->
															  <div class="card-body">

																	<!-- content start -->

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

																<!-- content end -->


																	  </div>
																	  <!-- card body end -->

																	</div>
																	<!-- card end -->

																			



<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
