<?php 
require_once "user_auth.php";
$title="Education Information";
require_once "header.php";
require_once "db.php";

$about_me = $dbcon->query("SELECT * FROM education_informations");




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">

																			<div class="card text-dark mb-3" >
																		  <div class="card-header bg-success text-center display-4">Education</div>
																		  <div class="card-body">

																		  	<!-- item add alert  -->

																		  	<?php if(isset($_SESSION['education_add_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['education_add_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['education_add_success']);
																		  	?>

																		  	<!-- aleart end -->

																		  	

																		  	<!-- update alert  -->

																		  	<?php if(isset($_SESSION['education_update_message'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['education_update_message']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['education_update_message']);
																		  	?>

																		  	<!-- aleart end -->






																		  	<!-- delete alert  -->

																		  	<?php if(isset($_SESSION['education_delete_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['education_delete_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php } 
																		  		unset($_SESSION['education_delete_success']);
																		  	?>

																		  	<!-- aleart end -->

																				<table class="table table-bordered text-center">
																					<thead>
																						<tr>
																							<td>Degree</td>
																							<td>Year</td>
																							<td>Progressbar</td>
																							<td>Action</td>
																						</tr>
																					</thead>
																					<tbody>

																					<!-- php code -->
																					<?php foreach ($about_me as $result) {
																						
																					 ?>


																						<tr>
																							<td><?=$result['degree_name']?></td>
																							<td><?=$result['year']?></td>
																							<td><?=$result['progressbar']?></td>
																							<td><div class="btn-group">
																								<a class="btn btn-sm btn-warning" href="education_update.php?id=<?=base64_encode($result['id'])?>">Update</a>
																								<a class="btn btn-sm btn-danger" href="education_delete.php?id=<?=base64_encode($result['id'])?>"">Delete</a>
																							</div></td>
																						</tr>

																						<!-- end foreach -->
																					<?php } ?>
																					</tbody>
																					

																				</table>
																				<a class="btn btn-block btn-success" href="education_edit.php">Add Another Degree</a>

																		  </div>
																			</div>


                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
