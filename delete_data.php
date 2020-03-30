<?php 
	include_once('inc/header.php');
	//echo $_SESSION['username'];
	$sql = $conn->prepare("DELETE  FROM users WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:index.php');		
?>