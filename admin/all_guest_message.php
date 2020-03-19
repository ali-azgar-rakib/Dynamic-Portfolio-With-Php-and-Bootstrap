<?php
require_once "user_auth.php";
$title = "Guest Messages";
require_once "header.php"; 
require_once "db.php";

$result = $dbcon -> query('SELECT * FROM guest_messages');

?>


<!-- Start Page content -->



<div class="card text-dark mb-3">

		<div class="card-header bg-success text-center"><h3>Statistics</h3></div>

		  <div class="card-body">


						<!-- table start here -->
						<table id="example" class="table table-bordered table-striped text-center mx-auto" >
							<thead>
								<tr>
									<th>Serial</th>
									<th>Name</th>
									<th>Email</th>
									<th>Status</th>
								</tr>	
							</thead>

							<tbody>
							
							<?php
							$serial = 1; 
							foreach($result as $row){ ?>

								<tr class="<?=$row['status']==1?'bg-info':''?>">
									<td><?=$serial++?></td>
									<td><?=$row['name']?></td>
									<td><?=$row['email']?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-sm btn-success" href="view.php?id=<?=base64_encode($row['id'])?>">View message</a>

										<!-- mark as read button -->

											<?php if($row['status']==1){ ?>
											<a class="btn btn-sm btn-danger" href="mark_as_read.php?id=<?=base64_encode($row['id'])?>">Mark as read</a>
										<?php } ?>
											
											<!-- mark as read button end -->

										</div>
									</td>
								</tr>
							<?php } ?>
							</tbody>
								
								
						</table>
					</div>
				</div>

<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>