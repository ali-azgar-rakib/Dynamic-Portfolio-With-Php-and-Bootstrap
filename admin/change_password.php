<?php 
require_once "user_auth.php";
$title="change password";
require_once "header.php";
require_once "db.php";

$email = $_SESSION['user_email'];
$result = $dbcon->query("SELECT password FROM users WHERE email='$email'");
$row = $result->fetch_assoc();
$password_from_db = $row['password'];

if(isset($_POST['submit'])){
	$old_password = $_POST['old_pass'];
	$new_password = $_POST['new_pass'];
	$con_password = $_POST['con_pass'];
	if(password_verify($old_password,$password_from_db)){
		// if old password match
		if(!password_verify($new_password,$password_from_db)){
			// if new and old pass not match
			if(!strlen($new_password)<8 || preg_match('@[0-9]@', $new_password) || preg_match('@[a-z]@', $new_password) || preg_match('@[A-Z]@', $new_password)){
				// if pass valid
				if($new_password==$con_password){
					// if new and confirm password match

					$new_hash_password = password_hash($new_password, PASSWORD_BCRYPT);
					$new_pass_update = $dbcon -> query("UPDATE users SET password = '$new_hash_password' WHERE email='$email'");
						$password_change_success = "Your password change successfully";
		

				}else{
					// if new and con pass not match
					$con_pass_not_match = "Confirm password not match with new password";
				}
			}else{
				// if pass not valid
				$pass_lenght = "Enter a new 8 length password with number,Capital and Small letter";
			}
		}else{
			// if new and old pass match
			$old_new_matched = "You can't set your old password as new password";
		}


	}else{
		// if old password not match
		$old_pass_not_match = "Old Password not matched";
	}
}




?>


<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
											

											

											
                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Account Overview</h4>

																	<!-- all error start  -->

																	<!-- error old password not match  -->
																	<?php if(isset($old_pass_not_match)){ ?>
							                    	<div class="alert alert-danger">
							                    		<?=$old_pass_not_match?>
							                    	</div>
						                    	<?php } ?>

						                    <!-- end alert -->


						                    <!-- error old and new password matched  -->
																	<?php if(isset($old_new_matched)){ ?>
							                    	<div class="alert alert-danger">
							                    		<?=$old_new_matched?>
							                    	</div>
						                    	<?php } ?>

						                    <!-- end alert -->

																<!-- password validation error  -->
																<?php if(isset($pass_lenght)){ ?>
						                    	<div class="alert alert-danger">
						                    		<?=$pass_lenght?>
						                    	</div>
					                    	<?php } ?>

					                    <!-- end alert -->

					                    <!-- password validation error  -->
																<?php if(isset($con_pass_not_match)){ ?>
						                    	<div class="alert alert-danger">
						                    		<?=$con_pass_not_match?>
						                    	</div>
					                    	<?php } ?>

					                    <!-- end alert -->



																	<!-- all error end -->

																	<!-- password change success message -->

																	
																<?php if(isset($password_change_success)){ ?>
						                    	<div class="alert alert-success">
						                    		<?=$password_change_success?>
						                    	</div>
					                    	<?php } ?>

					                    <!-- end alert -->


                                    <form action="" method="post">
                                    	
																			<div class="form-group">
																				<label for="old_pass">Old Password</label>
																				<input class="form-control" type="password" name="old_pass" id="old_pass">
																			</div>

																			<div class="form-group">
																				<label for="new_pass">New Password</label>
																				<input class="form-control" type="password" name="new_pass" id="new_pass">
																			</div>

																			<div class="form-group">
																				<label for="con_pass">Confirm Password</label>
																				<input class="form-control" type="password" name="con_pass" id="con_pass">
																			</div>
																			
																			<div class="form-group">
																			<input class="btn btn-block btn-success" type="submit" value="Change Password" name="submit">
																			</div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
