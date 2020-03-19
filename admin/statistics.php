<?php 
require_once "user_auth.php";
$title="Statistics";
require_once "header.php";
require_once "db.php";

$fact_information = $dbcon->query("SELECT * FROM stastistics");




?>


<!-- Start Page content -->

		<div class="card text-dark mb-3">
		  <div class="card-header bg-success text-center"><h2>Statistics</h2></div>
		  <div class="card-body">

		  	<!-- service add alert  -->

		  	<?php if(isset($_SESSION['stastistics_update'])){ ?>
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong><?=$_SESSION['stastistics_update']?></strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>


		  	<?php }
		  	unset($_SESSION['stastistics_update']);
		  	?>

		  	<!-- aleart end -->

				<table class="table table-bordered text-center">
					<thead class="bg-light">
						<tr>
							<td>Feature Item</td>
							<td>Active Products</td>
							<td>Experience</td>
							<td>Clients</td>
						</tr>
					</thead>
					<tbody>

					<!-- php code -->
					<?php foreach ($fact_information as $result) {
						
					 ?>


						<tr>
							<td><?=$result['feature_item']?></td>
							<td><?=$result['active_products']?></td>
							<td><?=$result['experience']?></td>
							<td><?=$result['clients']?></td>

						</tr>

						<!-- end foreach -->
					<?php } ?>
					</tbody>
					

				</table>
				<a class="btn btn-block btn-success" href="statistics_edit.php">Edit Data</a>

		  </div>
		</div>



<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
