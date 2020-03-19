<?php
require_once "user_auth.php";
ob_start();
$title="Add About Me";
require_once "header.php";
require_once "db.php";

$data_from_db = $dbcon->query("SELECT * FROM about_me");
$about_me_data = $data_from_db->fetch_assoc();

?>


<!-- Start Page content -->

																			<!-- row for item divide -->
                                	<div class="row">

                                			<!-- insert data col -->
                                		<div class="col-6">


                                			<div class="card">
																	  <div class="card-header bg-success text-center"><h2>Change Data</h2></div>
																	  <!-- card body start  -->
																	  <div class="card-body">
																	  	<form action="about_me_update.php" method="post">
																				<div class="form-group">
																					<label for="project_name">Name</label>
																					<input type="text" class="form-control" name="name" value="<?=$about_me_data['name']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Intro</label>
																					<textarea name="intro" class="form-control"><?=$about_me_data['intro']?></textarea>
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Details about me</label>
																					<textarea name="details" class="form-control"><?=$about_me_data['details']?></textarea>
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Facebook Link</label>
																					<input type="text" class="form-control" name="fb_link" value="<?=$about_me_data['fb_link']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Twitter Link</label>
																					<input type="text" class="form-control" name="twitter_link" value="<?=$about_me_data['twitter_link']?>">
																				</div>


																				<div class="form-group">
																					<label for="project_catagory">LinkedIn Link</label>
																					<input type="text" class="form-control" name="instra_link" value="<?=$about_me_data['linkedin_link']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Github link</label>
																					<input type="text" class="form-control" name="github_link" value="<?=$about_me_data['github_link']?>">
																				</div>


																				
																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Edit Data" name="submit">
																				</div>

																			</form>

																	  </div>
																	  <!-- card body end -->
																	</div>
																	<!-- card end -->
                                			
                                		</div>
                                		<!-- data column end -->

																		<!-- photo col start -->
				                            <div class="col-4 mx-auto">

				                            	<!-- photo empty alert  -->

																		  	<?php if(isset($_SESSION['about_photo_emty'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['about_photo_emty']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['about_photo_emty']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- photo size not valid alert  -->

																		  	<?php if(isset($_SESSION['about_photo_size'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['about_photo_size']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['about_photo_size']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- photo extension not valid alert  -->

																		  	<?php if(isset($_SESSION['about_photo_extension'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['about_photo_extension']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['about_photo_extension']);
																		  	?>

																		  	<!-- aleart end -->


																		  	<!-- photo upload successfully alert  -->

																		  	<?php if(isset($_SESSION['about_photo_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['about_photo_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['about_photo_success']);
																		  	?>

																		  	<!-- aleart end -->

																			<table class="table-bordered text-center mb-2" width="100%">	
																				<tr class="bg-success">	
																					<th ><h2> Current Image	</h2></th>
																				</tr>

																				<tr> 
																					<td>
																						<img class="mt-0 mb-2" src="image/profile/<?=$about_me_data['photo']?>" alt="profile image" width='250'>
																					</td>	
																				</tr>

																			</table>
																			
																			

				                            	<form action="about_me_update.php" enctype="multipart/form-data" method="post">
				                            		
																				<div class="form-group">
																					<input class="form-control" type="file" name="photo">
																					<label for="">Upload photo</label>
																				</div>

																				<input class="btn btn-block btn-success" type="submit" name="photo_submit" value="Change Photo">

				                            	</form>

				                            </div>
				                            <!-- photo column end -->

                                	</div>
                                	<!-- item divide row end																		 -->



<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
