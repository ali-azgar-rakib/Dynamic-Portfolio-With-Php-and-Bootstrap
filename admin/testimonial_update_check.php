<?php
session_start();
require_once 'db.php';
ob_start();

$id = base64_decode($_GET['id']); 

if(isset($_POST['submit'])){
	$customer_name = $_POST['customer_name'];
	$customer_desegnation = $_POST['customer_desegnation'];
	$customer_comment = $_POST['customer_comment'];


	if(!empty($customer_name) &&!empty($customer_desegnation) && !empty($customer_desegnation) ){
		$work_insert = $dbcon->query("UPDATE testimonials SET customer_name='$customer_name',customer_desegnation='$customer_desegnation',customer_comment='$customer_comment' WHERE id=$id");
		if($work_insert){
		
			$_SESSION['testimonial_update_success'] = "Update Successfully!";
			header('location: all_testimonials.php');
			ob_end_flush();
		} 
	}

}

// photo validation
if(isset($_POST['photo_submit'])){
	$photo      = $_FILES['photo']['name'];
	$photo_ext_array  = explode('.', $photo);
	$photo_ext = end($photo_ext_array);
	$photo_name =$id .".".$photo_ext;

	if(!empty($photo)){
		// if not empty
		if($_FILES['photo']['size']<5000000){
			// if photo in specific size
			$accepted_extension_list = ['png','jpg','jpeg'];
			if( in_array(strtolower($photo_ext),$accepted_extension_list) ){
				// remove present image
				$old_photo_query =$dbcon->query("SELECT photo FROM testimonials WHERE id=$id");
				$old_photo = $old_photo_query->fetch_assoc();

				$photo_link = "image/customers/".$old_photo['photo'];
				unlink($photo_link);

				// upload photo
				$update_photo =$dbcon->query("UPDATE testimonials SET photo='$photo_name' WHERE id=$id");
				if($update_photo){
					move_uploaded_file($photo = $_FILES['photo']['tmp_name'],"image/customers/". $photo_name);
					$_SESSION['testimonial_photo_success'] = "Photo attached successfully!";
					header('location: testimonial_update.php?id=' . base64_encode($id));
					ob_end_flush();
				}


			}else{
				// if extension not match
				$_SESSION['testimonial_photo_extension'] = "Atached a jpg,png or jpeg photo";
				header('location: testimonial_update.php?id=' . base64_encode($id));
				ob_end_flush();
			}

		}else{
			// if not in specific size
			$_SESSION['testimonial_photo_size'] = "Attached a photo under 1MB";
			header('location: testimonial_update.php?id=' . base64_encode($id));
			ob_end_flush();
		}



	} else{
		// if empty
		$_SESSION['testimonial_photo_emty'] = "Attached a Photo";
		header('location: testimonial_update.php?id=' . base64_encode($id));
		ob_end_flush();
	}

}

?>