<?php 
require_once "user_auth.php";
ob_start();
$title="Update Testimonials";
require_once "header.php";
require_once "db.php";



$id = base64_decode($_GET['id']);

$testimonial_data_from_db = $dbcon->query("SELECT * FROM testimonials WHERE id=$id");
$testimonial_data = $testimonial_data_from_db->fetch_assoc(); 


?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12 m-auto">
                                <div class="card-box">
                                	<!-- row for content divide -->
                                	<div class="row">
                                		<!-- col for first form -->
                                		<div class="col-6">

                                			<form action="testimonial_update_check.php?id=<?=base64_encode($id)?>" method="post">
																				<div class="form-group">
																					<label for="project_name">Customer Name</label>
																					<input type="text" class="form-control" name="customer_name" value="<?=$testimonial_data['customer_name']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Customer Desegnation</label>
																					<input type="text" class="form-control" name="customer_desegnation" value="<?=$testimonial_data['customer_desegnation']?>">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Customer Comments</label>
																					<input type="text" class="form-control" name="customer_comment" value="<?=$testimonial_data['customer_comment']?>">
																				</div>


																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Update" name="submit">
																				</div>

																			</form>


                                			
                                		</div>
                                		<!-- end first col -->

                                		<!-- photo col start -->
				                            <div class="col-4 mx-auto">

				                            	<!-- photo empty alert  -->

																		  	<?php if(isset($_SESSION['testimonial_photo_emty'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['testimonial_photo_emty']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['testimonial_photo_emty']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- photo size not valid alert  -->

																		  	<?php if(isset($_SESSION['testimonial_photo_size'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['testimonial_photo_size']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['testimonial_photo_size']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- photo extension not valid alert  -->

																		  	<?php if(isset($_SESSION['testimonial_photo_extension'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['testimonial_photo_extension']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['testimonial_photo_extension']);
																		  	?>

																		  	<!-- aleart end -->


																		  	<!-- photo upload successfully alert  -->

																		  	<?php if(isset($_SESSION['testimonial_photo_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['testimonial_photo_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['testimonial_photo_success']);
																		  	?>

																		  	<!-- aleart end -->

																			<table class="table-bordered text-center mb-2" width="100%">	
																				<tr class="bg-success">	
																					<th ><h2> Current Image	</h2></th>
																				</tr>

																				<tr> 
																					<td>
																						<img class="mt-0 mb-2" src="image/customers/<?=$testimonial_data['photo']?>" alt="profile image" width='250'>
																					</td>	
																				</tr>

																			</table>
																			
																			

				                            	<form action="testimonial_update_check.php?id=<?=base64_encode($id)?>" enctype="multipart/form-data" method="post">
				                            		
																				<div class="form-group">
																					<input class="form-control" type="file" name="photo">
																					<label for="">Upload photo</label>
																				</div>

																				<input class="btn btn-block btn-success" type="submit" name="photo_submit" value="Change Photo">

				                            	</form>

				                            </div>
				                            <!-- photo column end -->
                                		
                                	</div>
                                	<!-- row for content divide end -->
                                    

																			


                                </div>
                                <!-- card box end -->
                            </div>
                            <!-- main col end -->
                        </div>
                        <!-- main row end -->
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
