<?php 
require_once "user_auth.php";
$title="all logo";
require_once "header.php";
require_once "db.php";

$all_logo = $dbcon->query("SELECT * FROM logo");




?>

																	
						<!-- card start -->
          	<div class="card mb-3">
						  <div class="card-header text-center bg-success"> <h2>All logo</h2></div>


						  <!-- card content -->


						  <!-- logo add message alert  -->

							  	<?php if(isset($_SESSION['logo_add'])){ ?>
											
											<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong><?=$_SESSION['logo_add']?></strong>
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>


							  	<?php }
							  	unset($_SESSION['logo_add']);
							  	?>

							  	<!-- aleart end -->

								<!-- logo delete message alert  -->

							  	<?php if(isset($_SESSION['logo_delete'])){ ?>
											
											<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong><?=$_SESSION['logo_delete']?></strong>
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>


							  	<?php }
							  	unset($_SESSION['logo_delete']);
							  	?>

							  	<!-- aleart end -->



									<table class="table table-bordered text-center">
										<thead>
											<tr>
												<td>Logo</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>

										<!-- php code -->
										<?php foreach ($all_logo as $result) {
											
										 ?>


											<tr>
											
												<td><img src="image/logo/<?=$result['photo']?>" alt="" style="width: 50px;"></td>

												<td>
														<a class="btn btn-sm btn-danger" href="logo_delete.php?id=<?=base64_encode($result['id'])?>">Delete</a>
												</td>
											</tr>

											<!-- end foreach -->
										<?php } ?>
										</tbody>
										

									</table>
								<a class="btn btn-block btn-success" href="add_logo.php">Add logo</a>

								<!-- content end -->


						  <!-- card content end -->

						  <!-- card body -->
						  <div class="card-body">
						    
						</div>
						<!-- card body end -->

					</div>
					<!-- card end -->


<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
