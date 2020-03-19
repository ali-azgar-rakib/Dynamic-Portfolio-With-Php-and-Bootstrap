<?php 
require_once "user_auth.php";
$title="Testimonials";
require_once "header.php";
require_once "db.php";

$testimonial = $dbcon->query("SELECT * FROM testimonials");
?>

      

<div class="card text-dark mb-3">
	<div class="card-header bg-success text-center"><h3>About Me</h3></div>

	<div class="card-body">

																			
		  	<!-- update message alert  -->

		  	<?php if(isset($_SESSION['testimonial_update_success'])){ ?>
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong><?=$_SESSION['testimonial_update_success']?></strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>


		  	<?php }
		  	unset($_SESSION['testimonial_update_success']);
		  	?>

		  	<!-- aleart end -->



		  	<!-- delete message alert  -->

		  	<?php if(isset($_SESSION['testimonial_delete'])){ ?>
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong><?=$_SESSION['testimonial_delete']?></strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>


		  	<?php }
		  	unset($_SESSION['testimonial_delete']);
		  	?>

		  	<!-- aleart end -->

				<table id="example" class="table table-striped table-bordered mx-auto">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Desegnation</th>
							<th>Comment</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

					<!-- php code -->
					<?php foreach ($testimonial as $result) {
						
					 ?>


						<tr>
							<td><?=$result['customer_name']?></td>

							<td><?=$result['customer_desegnation']?></td>

							<td><?=$result['customer_comment']?></td>
							
							<td><img src="image/customers/<?=$result['photo']?>" alt="" style="width: 50px;"></td>

							<td>
								<div class="btn-group">
									<a class="btn btn-sm btn-warning" href="testimonial_update.php?id=<?=base64_encode($result['id'])?>">Update</a>

									<a class="btn btn-sm btn-danger" href="testimonial_delete.php?id=<?=base64_encode($result['id'])?>">Delete</a>
								</div>
							</td>
						</tr>

						<!-- end foreach -->
					<?php } ?>
					</tbody>
					

				</table>
				<a class="btn btn-block btn-success" href="testimonials.php">Add Another Testimonial</a>
			</div>
		</div>



<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
