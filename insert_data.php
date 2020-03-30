<?php
include_once('inc/header.php');
include_once('conn/connection.php'); 
if(isset($_POST['submit'])){

	$fnUC = ucfirst($_POST['first_name']);
	$first_name = mysqli_real_escape_string($conn,$fnUC);
	$lastnamecaps = ucfirst($_POST['last_name']);
 	$last_name = mysqli_real_escape_string($conn,$lastnamecaps);
 	$email_lower = strtolower($_POST['email']);
	$user_email = mysqli_real_escape_string($conn,$email_lower);
	

	

if($first_name == "" || $last_name == "" ||  $user_email == ""){

 		//echo "all fields req";
	//$_SESSION['all_req'] = "All fields are required";
	$_SESSION['all_req'] ='<div class="col-md-6"><div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> All fields are required!!!.
</div></div>';
	header('location:index.php');


 	}else if(!preg_match("/^[a-zA-Z ]*$/", $first_name)){
 		
 		$_SESSION['letters_req']="Only letters are allowed";
 		header('location:index.php');

	}else if(!preg_match("/^[a-zA-Z ]*$/", $last_name)){
		$_SESSION['letters_req']="Only letters are allowed";
		header('location:index.php');

 	}else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
 		echo"Enter a valid email";	

 	}
 		
 	else{
	$checking_exist_email  = "SELECT email FROM users WHERE email = ?";
	$fire_query = $conn->prepare($checking_exist_email);
	$fire_query->bind_param("s", $user_email);
	$fire_query->execute();
	$fire_query->bind_result($found);
	$fire_query->fetch();
	if($found)
	{
    
    //echo "Email is already exist";
		// $email_exist = "email exist";
		// header('location:index.php');
   // $_SESSION['email_exist']="Email is already exist";

    $_SESSION['email_exist'] ='<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong>This email  '.$user_email.'   is already exist!!!.
</div>';
    header('location:index.php');
    exit();
    }
	else{

 $insert_data = $conn->prepare("INSERT INTO  users(first_name, last_name,email) VALUES (?,?,?)");
 	$insert_data->bind_param("sss", $first_name, $last_name, $user_email);
	
	if($insert_data->execute()){
 		//$_SESSION['register_done']="Registration Done!!!";
	//echo "New records created successfully";

 $_SESSION['register_done'] ='<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Registration Done Check your registered email for password !!!.
</div>';
 		header("location:index.php");
 //echo "Insert";

 	}
	else{
		echo "Something went wrong";
 	}

$insert_data->close();
$conn->close();

 }

}
}


?>











	
