<?php 
include_once('inc/header.php');
$view_users_data= $conn->prepare("SELECT id,first_name, last_name, email FROM users WHERE id = ?");
$view_users_data->bind_param("i",$_GET["id"]);

$view_users_data->execute();
$view_users_data -> bind_result($id,$first_name, $last_name,$email);
$view_users_data ->fetch();
?>
<div class="col-md-2"></div>
<div class="col-md-8">
	<h1>Update </h1>
<form action="update_process.php" method="POST" >
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="<?php echo $first_name;  ?>" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="<?php echo $last_name;  ?>" required>
    </div>

     <div class="form-group">
      <label for="mobile">Email:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter mobile " name="email" value="<?php echo $email;  ?>" required>
    </div>
    
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" class="btn btn-default" name="update" value="update">
  </form>
</div>
<div class="col-md-2"></div>

