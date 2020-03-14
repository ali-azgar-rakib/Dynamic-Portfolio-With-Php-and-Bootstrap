<?php 
require_once "user_auth.php";
$title="Services";
require_once "header.php";
require_once "db.php";

$services_query = $dbcon->query("SELECT * FROM services");




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">

																			<div class="card text-dark mb-3" >
																		  <div class="card-header bg-success text-center display-4">Services</div>
																		  <div class="card-body">



																		  	<!-- service add alert  -->

																		  	<?php if(isset($_SESSION['service_add'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['service_add']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['service_add']);
																		  	?>

																		  	<!-- aleart end -->

																				<!-- update alert  -->

																		  	<?php if(isset($_SESSION['service_update'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['service_update']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['service_update']);
																		  	?>

																		  	<!-- aleart end -->

																		  	<!-- delete message alert  -->

																		  	<?php if(isset($_SESSION['service_delete'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['service_delete']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['service_delete']);
																		  	?>

																		  	<!-- aleart end -->
																			


																				<table class="table table-bordered text-center">
																					<thead>
																						<tr>
																							<td>Serial</td>
																							<td>Icon</td>
																							<td>Service Title</td>
																							<td>Service Details</td>
																							<td>Action</td>
																						</tr>
																					</thead>
																					<tbody>

																<!-- php code foreach -->
																						<?php 
																						$serial = 1;
																						foreach ($services_query as $result) {
																							
																						 ?>


																						<tr>
																							<td><?=$serial++?></td>
																							<td><i style="font-size: 28px;" class="<?=$result['icon']?>"></i></td>
																							<td><?=$result['title']?></td>
																							<td><?=$result['some_text']?></td>
																							<td>
																								<div class="btn-group">
																									<a class="btn btn-sm btn-warning" href="service_update.php?id=<?=base64_encode($result['id'])?>" >Update</a>

																									<a class="btn btn-sm btn-danger" href="service_delete.php?id=<?=base64_encode($result['id'])?>">Delete</a>

																								</div>
																							</td>
																						</tr>

																						<!-- end foreach -->
																					<?php } ?>

																					</tbody>
																					

																				</table>
																				<a class="btn btn-block btn-success" href="service_add.php">Add Another Service</a>

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
