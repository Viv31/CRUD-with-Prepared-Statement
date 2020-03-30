<?php 
include_once('inc/header.php');
if(isset($_POST['update'])){
	//echo "hello";
$sql = $conn->prepare("UPDATE users SET first_name=? , last_name=? , email=?  WHERE id=?");
		$first_name=$_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email= $_POST['email'];
		
		$sql->bind_param("sssi",$first_name, $last_name, $email,$_POST["id"]);	
		if($sql->execute()) {
			//$success_message = "Edited Successfully";
			header("location:index.php");
		} else {
			echo  "Problem in Editing Record";
		}

}


?>
