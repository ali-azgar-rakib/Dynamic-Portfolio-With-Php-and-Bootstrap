<?php
require_once "user_auth.php";
$title="About me";
require_once "header.php";
require_once "db.php";


$about_me = $dbcon->query("SELECT * FROM about_me");
$result = $about_me -> fetch_assoc();
$_SESSION['id'] = $result['id'];



?>


<div class="card text-dark mb-3">
	<div class="card-header bg-success text-center"><h3>About Me</h3></div>

	<div class="card-body">


			<!-- item add alert  -->

	  	<?php if(isset($_SESSION['about_data_success'])){ ?>
					
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong><?=$_SESSION['about_data_success']?></strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>


	  	<?php }
	  	unset($_SESSION['about_data_success']);
	  	?>

	  	<!-- aleart end -->


			<table class="table table-bordered text-center">
				<tr>
					<td colspan="2"><img  src="image/profile/<?=$result['photo']?>" style="width: 150px;" ></td>
				</tr>

				<tr>
					<td>Name</td>
					<td><?=$result['name']?></td>
				</tr>

				<tr>
					<td>Intro</td>
					<td><?=$result['intro']?></td>
				</tr>

				<tr>
					<td>Details</td>
					<td><?=$result['details']?></td>
				</tr>

				<tr>
				<td>Facebook Link</td>
				<td><?=$result['fb_link']?></td>
				</tr>

				<tr>
					<td>Github Link</td>
					<td><?=$result['github_link']?></td>
				</tr>

				<tr>
					<td>Twitter Link</td>
					<td><?=$result['twitter_link']?></td>
				</tr>

				<tr>
					<td>Instra Link</td>
					<td><?=$result['linkedin_link']?></td>
				</tr>


			</table>
			<a class="btn btn-block btn-success" href="about_me.php">Change</a>

	</div>
</div>



<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>
