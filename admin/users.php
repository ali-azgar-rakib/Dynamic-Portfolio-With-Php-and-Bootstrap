<?php
	require_once "user_auth.php";
	require_once "db.php";
	$title = "users page";
	require_once "header.php"; 

	$user_found_query = "SELECT * FROM users";
	$user_found = $dbcon->query($user_found_query);



?>
<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Account Overview</h4>
                                    <table class="table table-bordered table-striped text-center">
                                    	<thead class="bg-primary">
                                    		<tr>
                                    			<th>Serail</th>
                                    			<th>Id</th>
                                    			<th>Name</th>
                                    			<th>Email</th>
                                    			<th>Status</th>
                                    			<th>action</th>
                                    		</tr>
                                    	</thead>
                                    	<tbody>

                                    	<?php
                                    	$serial = 1;		
                                    	foreach ($user_found as $row) {?>	
		
	
                                    		<tr>
                                    			<td><?=$serial++?></td>
                                    			<td><?=$row['id']?></td>
                                    			<td><?=$row['fname']?></td>
                                    			<td><?=$row['email']?></td>

																						<!-- show status  -->

                                    			<td><?=$row['status']==1?"<span class='bg-danger p-2'>deactive</span>":"<span class='bg-success p-2'>active</span>"?></td>

																							

                                    			<td><?php

                                    			// active button
                                    				if($row['status']==1){ ?>
                                    					<a class="btn btn-sm btn-success" href="active.php?id=<?php echo base64_encode($row['id']); ?>" >active</a>
                                    				<?php }else{ ?>

																							<!-- deactive button -->

                                    			 <a class="btn btn-sm btn-danger" href="deactive.php?id=<?php echo base64_encode($row['id']); ?>" >deactive</a>
                                    			<?php	} ?>
                                    			</td>
                                    		</tr>
                                    		<?php } ?>
                                    	</tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->
 <!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>