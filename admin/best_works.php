<?php 
require_once "user_auth.php";
$title="My Best Works";
require_once "header.php";
require_once "db.php";

$all_works = $dbcon->query("SELECT * FROM my_best_works");




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">

																			<div class="card text-dark mb-3" ">
																		  <div class="card-header bg-success text-center display-4">Best Works</div>
																		  <div class="card-body">

																				<table class="table table-bordered text-center">
																					<thead>
																						<tr>
																							<td>Works Name</td>
																							<td>Catagory</td>
																							<td>Photo</td>
																							<td>Action</td>
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
																						</tr>

																						<!-- end foreach -->
																					<?php } ?>
																					</tbody>
																					

																				</table>
																				<a class="btn btn-block btn-success" href="my_best_works.php">Add Another Works</a>

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
