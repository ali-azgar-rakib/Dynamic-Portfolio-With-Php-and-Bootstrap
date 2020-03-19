<?php 
require_once "user_auth.php";
ob_start();
$title="Add Testimonials";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$customer_name = $_POST['customer_name'];
	$customer_desegnation = $_POST['customer_desegnation'];
	$customer_comment = $_POST['customer_comment'];
	$photo     = $_FILES['photo']['name'];
	$photo_ext = explode('.', $photo);

	if(!empty($customer_name) &&!empty($customer_desegnation) && !empty($customer_desegnation) && !empty($photo)){
		$work_insert = $dbcon->query("INSERT INTO testimonials (customer_name,customer_desegnation,customer_comment) VALUES('$customer_name','$customer_desegnation','$customer_comment')");
		if($work_insert){

			$last_id = $dbcon->insert_id;
			$photo_name = $last_id.".".end($photo_ext);
			$dbcon->query("UPDATE testimonials SET photo='$photo_name' WHERE id=$last_id");
			move_uploaded_file($_FILES['photo']['tmp_name'], 'image/customers/'.$photo_name);
			header('location: all_testimonials.php');
			ob_end_flush();
		} 
	}

}




?>


<!-- Start Page content -->
	<div class="card text-dark mb-3" >
		<div class="card-header bg-success text-center"><h2>Add Testimonial</h2></div>
			<div class="card-body">

					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="project_name">Customer Name</label>
							<input type="text" class="form-control" name="customer_name">
						</div>

						<div class="form-group">
							<label for="project_catagory">Customer Desegnation</label>
							<input type="text" class="form-control" name="customer_desegnation">
						</div>

						<div class="form-group">
							<label for="project_catagory">Customer Comments</label>
							<textarea name="customer_comment" class="form-control"></textarea>

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





<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
