<?php 
require_once "user_auth.php";
$title="My Best Works";
require_once "header.php";
require_once "db.php";

$all_works = $dbcon->query("SELECT * FROM my_best_works");

?>



																	<!-- card start -->
                                	<div class="card mb-3" >
																	  <div class="card-header bg-success text-center"><h2>My Best Works</h2></div>

																	  <!-- card body start -->
																	  <div class="card-body">

																			<!-- content start -->


																			<!-- data add message alert  -->

																		  	<?php if(isset($_SESSION['best_works_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['best_works_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['best_works_success']);
																		  	?>

																		  	<!-- aleart end -->

																				<!-- data delete message alert  -->

																		  	<?php if(isset($_SESSION['best_works_delete'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['best_works_delete']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['best_works_delete']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- data delete message alert  -->

																		  	<?php if(isset($_SESSION['best_works_update_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['best_works_update_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['best_works_update_success']);
																		  	?>

																		  	<!-- aleart end -->



																				<table id="example" class="table table-bordered text-center">
																					<thead>
																						<tr>
																							<th>Works Name</th>
																							<th>Catagory</th>
																							<th>Photo</th>
																							<th>Action</th>
																						</tr>
																					</thead>
																					<tbody>

																					<!-- php code -->
																					<?php foreach ($all_works as $result) {
																						
																					 ?>


																						<tr>
																							<td><?=$result['works_name']?></td>
																							<td><?=$result['catagory']?></td>
																							<td><img src="image/my_best_works/<?=$result['photo']?>" alt="" style="width: 50px;"></td>

																							<td>
																								<div class="btn-group">
																									<a class="btn btn-sm btn-warning" href="best_works_update.php?id=<?=base64_encode($result['id'])?>">Update</a>
																									<a class="btn btn-sm btn-danger" href="best_works_delete.php?id=<?=base64_encode($result['id'])?>">Delete</a>
																								</div>
																							</td>
																						</tr>

																						<!-- end foreach -->
																					<?php } ?>
																					</tbody>
																					

																				</table>
																				<a class="btn btn-block btn-success mt-2" href="my_best_works.php">Add Another Works</a>

																		  

																			<!-- content end -->


																	  </div>
																	  <!-- card body end -->

																	</div>
																	<!-- card end -->


<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
