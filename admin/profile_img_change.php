<?php
session_start();
require_once 'db.php';
ob_start();

$id = base64_decode($_GET['id']); 



// photo validation
if(isset($_POST['photo_submit'])){
	$photo      = $_FILES['photo']['name'];
	$photo_ext_array  = explode('.', $photo);
	$photo_ext = end($photo_ext_array);
	$photo_name =$id .".".$photo_ext;

	if(!empty($photo)){
		// if not empty
		if($_FILES['photo']['size']<2000000){
			// if photo in specific size
			$accepted_extension_list = ['png','jpg','jpeg'];
			if( in_array(strtolower($photo_ext),$accepted_extension_list) ){
				// remove present image
				$old_photo_query =$dbcon->query("SELECT photo FROM users WHERE id=$id");
				$old_photo = $old_photo_query->fetch_assoc();

				$photo_link = "image/users/".$old_photo['photo'];
				if(!($old_photo['photo']=='default.png')){
					unlink($photo_link);
				}
				

				// upload photo
				$update_photo =$dbcon->query("UPDATE users SET photo='$photo_name' WHERE id=$id");
				if($update_photo){
					move_uploaded_file($photo = $_FILES['photo']['tmp_name'],"image/users/". $photo_name);
					$_SESSION['profile_photo_success'] = "Photo attached successfully!";
					header('location: profile.php');
					ob_end_flush();
				}


			}else{
				// if extension not match
				$_SESSION['profile_photo_extension'] = "Atached a jpg,png or jpeg photo";
				header('location: profile.php');
				ob_end_flush();
			}

		}else{
			// if not in specific size
			$_SESSION['profile_photo_size'] = "Attached a photo under 1MB";
			header('location: profile.php');
			ob_end_flush();
		}



	} else{
		// if empty
		$_SESSION['profile_photo_emty'] = "Attached a Photo";
		header('location: profile.php');
		ob_end_flush();
	}

}

?>