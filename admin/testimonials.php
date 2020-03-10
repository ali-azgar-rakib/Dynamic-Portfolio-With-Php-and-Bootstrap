<?php 
require_once "user_auth.php";
$title="Add Testimonials";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$customer_name = $_POST['customer_name'];
	$customer_desegnation = $_POST['customer_desegnation'];
	$customer_comment = $_POST['customer_comment'];
	$photo     = $_FILES['photo']['name'];
	$photo_ext = explode('.', $photo);
	$photo_name = $customer_name.".".end($photo_ext);

	if(!empty($customer_name) &&!empty($customer_desegnation) && !empty($customer_desegnation) && !empty($photo_name)){
		$work_insert = $dbcon->query("INSERT INTO testimonials (customer_name,customer_desegnation,customer_comment,photo) VALUES('$customer_name','$customer_desegnation','$customer_comment','$photo_name')");
		if($work_insert){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'image/customers/'.$photo_name);
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
																					<label for="project_name">Customer Name</label>
																					<input type="text" class="form-control" name="customer_name">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Customer Desegnation</label>
																					<input type="text" class="form-control" name="customer_desegnation">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Customer Comments</label>
																					<input type="text" class="form-control" name="customer_comment">
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
