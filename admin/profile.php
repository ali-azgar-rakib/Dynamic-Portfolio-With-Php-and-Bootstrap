<?php 
require_once "user_auth.php";
$title="profile";
require_once "header.php";
require_once "db.php";

$email = $_SESSION['user_email'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = $dbcon -> query($query);
$row = $result -> fetch_assoc();


?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Account Overview</h4>



																			<!-- table start here -->
																			<table class="table table-bordered table-striped text-center mx-auto" >
																					<tr>
																						<td>Name</td>
																						<td><?=$row['fname']?></td>
																					</tr>

																					<tr>
																						<td>Email</td>
																						<td><?=$row['email']?></td>
																					</tr>

																					<tr>
																						<td>Status</td>
																						<td><span class="bg-success p-2">Active</span></td>
																					</tr>
																					
																			</table>

																			<a class="btn btn-block btn-success" href="change_password.php">Change Password</a>


                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
