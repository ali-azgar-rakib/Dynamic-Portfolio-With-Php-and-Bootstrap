<?php 
require_once "user_auth.php";
$title="profile";
require_once "header.php";
require_once "db.php";

$email = $_SESSION['user_email'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = $dbcon -> query($query);
$row = $result -> fetch_assoc();
$id = $row['id'];


?>



                                	<div class="row">
                                		<!-- content row  -->

                                		<div class="col-6">
                                			<!-- first col -->

																		<div class="card text-dark mb-3" >
																		  <div class="card-header bg-success text-center"><h2>Profile</h2></div>
																		  <div class="card-body">
																			<!-- table start here -->
																				<table class="table table-bordered table-striped text-center mx-auto" >
																						<tr>
																							<td colspan="2"><img src="image/users/<?=$row['photo']?>" alt="" width="100" ></td>
																						</tr>

																						<tr>
																							<td>Name</td>
																							<td><?=$row['fname']?></td>
																						</tr>

																						<tr>
																							<td>Email</td>
																							<td><?=$row['email']?></td>
																						</tr>

																						<tr>
																							<td>Status</td>
																							<td><span class="bg-success p-2">Active</span></td>
																						</tr>
																						
																				</table>

																				<a class="btn btn-block btn-success" href="change_password.php">Change Password</a>

																			
                                		</div>
                                	</div>
                                </div>
                                		<!-- first col end -->

                                		<!-- photo col start -->
				                            <div class="col-4 mx-auto">

				                            	<!-- photo empty alert  -->

																		  	<?php if(isset($_SESSION['profile_photo_emty'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_emty']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_emty']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- photo size not valid alert  -->

																		  	<?php if(isset($_SESSION['profile_photo_size'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_size']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_size']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- photo extension not valid alert  -->

																		  	<?php if(isset($_SESSION['profile_photo_extension'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_extension']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_extension']);
																		  	?>

																		  	<!-- aleart end -->


																		  	<!-- photo upload successfully alert  -->

																		  	<?php if(isset($_SESSION['profile_photo_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_success']);
																		  	?>

																		  	<!-- aleart end -->

																			<table class="table-bordered text-center mb-2" width="100%">	
																				<tr class="bg-success">	
																					<th ><h2> Current Image	</h2></th>
																				</tr>

																				<tr> 
																					<td>
																						<img class="mt-0 mb-2" src="image/users/<?=$row['photo']?>" alt="profile image" width='200'>
																					</td>	
																				</tr>

																			</table>
																			
																			

				                            	<form action="profile_img_change.php?id=<?=base64_encode($id)?>" enctype="multipart/form-data" method="post">
				                            		
																					<input  type="file" name="photo" class="form-control">
																					<label for="">Upload photo</label>

																				<input class="btn btn-block btn-success" type="submit" name="photo_submit" value="Change Photo">

				                            	</form>

				                           </div>
				                            <!-- photo column end -->

                                	</div>
                                	<!-- divider row end -->
                                    


<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
