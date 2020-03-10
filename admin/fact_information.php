<?php 
require_once "user_auth.php";
$title="Fact Information";
require_once "header.php";
require_once "db.php";

$fact_information = $dbcon->query("SELECT * FROM fact_informations");




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">

																			<div class="card text-dark mb-3" ">
																		  <div class="card-header bg-success text-center display-4">Fact Information</div>
																		  <div class="card-body">

																				<table class="table table-bordered text-center">
																					<thead>
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
																				<a class="btn btn-block btn-success" href="fact_information_edit.php">Edit Data</a>

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
