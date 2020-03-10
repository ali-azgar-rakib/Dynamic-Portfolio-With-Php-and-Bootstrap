<?php 
require_once "user_auth.php";
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
                                    <h4 class="header-title mb-4">Add Logo</h4>

																			<form action="" method="post" enctype="multipart/form-data">
																				
																				<div class="form-group">
																					<input class="form-control" type="file" name="photo">
																					<label for="">Upload photo</label>
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
