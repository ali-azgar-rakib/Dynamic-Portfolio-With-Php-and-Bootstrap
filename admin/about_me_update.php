<?php
session_start();
require_once 'db.php'; 

if(isset($_POST['submit'])){
	$name       = $_POST['name'];
	$intro      = $_POST['intro'];
	$details    = $_POST['details'];
	$fb_link    = $_POST['fb_link'];
	$twitter_link    = $_POST['twitter_link'];
	$instra_link    = $_POST['instra_link'];
	$github_link    = $_POST['github_link'];
	

	if(!empty($name) &&!empty($intro) && !empty($details) && !empty($fb_link) && !empty($twitter_link) && !empty($instra_link) && !empty($github_link) ){

		$work_insert = $dbcon->query("UPDATE about_me SET name='$name',intro='$intro',details='$details',fb_link='$fb_link',twitter_link='$twitter_link',linkedin_link='$instra_link',github_link='$github_link' WHERE id=1");
		if($work_insert){
			$_SESSION['about_data_success'] = "Data updated successfully!";
			header('location: about_me_main.php');
			ob_end_flush();
		} 
	}

}

// photo validation
if(isset($_POST['photo_submit'])){
	$photo      = $_FILES['photo']['name'];
	$photo_ext_array  = explode('.', $photo);
	$photo_ext = end($photo_ext_array);
	$id = 1;
	$photo_name =$id .".".$photo_ext;

	if(!empty($photo)){
		// if not empty
		if($_FILES['photo']['size']<5000000){
			// if photo in specific size
			$accepted_extension_list = ['png','jpg','jpeg'];
			if( in_array(strtolower($photo_ext),$accepted_extension_list) ){
				// remove present image
				$old_photo_query =$dbcon->query("SELECT photo FROM about_me WHERE id=$id");
				$old_photo = $old_photo_query->fetch_assoc();

				$photo_link = "image/profile/".$old_photo['photo'];
				unlink($photo_link);

				// upload photo
				$update_photo =$dbcon->query("UPDATE about_me SET photo='$photo_name' WHERE id=$id");
				if($update_photo){
					move_uploaded_file($photo = $_FILES['photo']['tmp_name'],"image/profile/".$photo_name);
					$_SESSION['about_photo_success'] = "Photo attached successfully!";
					header('location: about_me.php');
					ob_end_flush();
				}


			}else{
				// if extension not match
				$_SESSION['about_photo_extension'] = "Atached a jpg,png or jpeg photo";
				header('location: about_me.php');
				ob_end_flush();
			}

		}else{
			// if not in specific size
			$_SESSION['about_photo_size'] = "Attached a photo under 1MB";
			header('location: about_me.php');
			ob_end_flush();
		}



	} else{
		// if empty
		$_SESSION['about_photo_emty'] = "Attached a Photo";
		header('location: about_me.php');
		ob_end_flush();
	}

}


?>