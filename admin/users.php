<?php
	require_once "user_auth.php";
	require_once "db.php";
	$title = "Users Page";
	require_once "header.php"; 

	$user_found_query = "SELECT * FROM users";
	$user_found = $dbcon->query($user_found_query);



?>
<div class="card mb-3">
  <div class="card-header bg-success text-center"><h2>User List</h2></div>
  <div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Serail</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
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
            <td><?=$row['fname']?></td>
            <td><?=$row['email']?></td>
            <td><img src="image/users/<?=$row['photo']?>" alt="" width='50'></td>

            <!-- show status  -->

            <td><?=$row['status']==1?"<span class='bg-danger p-2'>deactive</span>":"<span class='bg-success p-2'>active</span>"?></td>

            <td>
                <?php

                // active button
                if($row['status']==1){ ?>
                    <a class="btn btn-sm btn-success" href="active.php?id=<?php echo base64_encode($row['id']); ?>" >active</a>
                <?php }else{ ?>

                <!-- deactive button -->

               <a class="btn btn-sm btn-danger" href="deactive.php?id=<?php echo base64_encode($row['id']); ?>" >deactive</a>
            <?php   } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
 
  </div>
                                    




            



 <!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?>