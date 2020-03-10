<?php
session_start(); 

if(isset($_POST['reg_submit'])){

	$fname          = $_POST['fname'];
	$email          = $_POST['email'];
	$password       = $_POST['password'];
	$cpassword      = $_POST['cpassword'];
	$photo      		= $_FILES['photo']['name'];
	$random_number  = mt_rand(1, 99999); 
	$photo_ext  		= explode('.', $photo);
	$photo_name 		= $random_number.".".end($photo_ext);


// all input error
$input_error = [];


if(empty($fname)){
	$input_error['name'] = "Enter Your Name";
}

else if(preg_match('@[0-9]@', $fname)){
	$input_error['name'] = "Enter a name without number";
}
if(empty($email)){
	$input_error['email']="Enter a email address";
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$input_error['email'] = "Enter a valid email";
}
if(empty($password)){
	$input_error['password'] = 'Enter 8 length password with number,uppercase and lowercase letter';
}

else if(strlen($password)<8 || !preg_match('@[0-9]@',$password) || !preg_match('@[a-z]@',$password) || !preg_match('@[A-Z]@',$password) ){
	$input_error['password'] = 'Enter 8 length password with number,uppercase and lowercase letter';
}
else if(empty($cpassword)){
	$input_error['cpassword'] = "Enter confirm password";
}

else if($cpassword != $password){
	$input_error['cpassword'] = "Confirm password not match";
}
if(empty($photo)){
	$input_error['photo'] = "Attached a photo";

}


// ===================== if no error then go to database ====

if(count($input_error)==0){
	$email_check_query = $dbcon->query("SELECT * FROM users WHERE email='$email'");

// ========= check email exists in db or not 

	if($email_check_query->num_rows!=0){
		$email_exist = "Email already exists.Try with another email";
	// num_rows check bracket	
	}else{
		$hash_password = password_hash($password, PASSWORD_BCRYPT);
		$user_data_insert_query = "INSERT INTO users (fname,email,password,photo) VALUES('$fname','$email','$hash_password','$photo_name')";
		$user_insert = $dbcon->query($user_data_insert_query);
		if($user_insert){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'admin/image/users/'.$photo_name);
			$_SESSION['user_success'] = "Your Account created successfully!";
			header('location: login.php');
		}

	}
// input error check bracket
}



// isset check bracket
}

?>