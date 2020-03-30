<?php 
include('inc/header.php'); 
include_once('conn/connection.php');
?>

<div class="container">
  <div class="message_box">
    <?php //include_once('emailchecking.php');

//$email_exist;

if(isset($_SESSION['email_exist'])){
  echo $_SESSION['email_exist'];

}
unset($_SESSION['email_exist']);

if(isset($_SESSION['register_done'])){
  echo $_SESSION['register_done'];
}
unset($_SESSION['register_done']);

if(isset($_SESSION['all_req'])){
  echo $_SESSION['all_req'];
}
unset($_SESSION['all_req']);

if(isset($_SESSION['letters_req'])){
  echo $_SESSION['letters_req'];
}
unset($_SESSION['letters_req']);

if(isset($_SESSION['only_number'])){
  echo $_SESSION['only_number'];
}
unset($_SESSION['only_number']);
?>



  </div>
  <br><br>
  <body class="box">
  <h2>Registration</h2>

  
  <form action="insert_data.php" method="POST" >
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" pattern="^[a-zA-Z\s]*$" title="Only letters are required" autocomplete="on" minlength="3">
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" pattern="^[a-zA-Z\s]*$" title="Only letters are required" autocomplete="on" minlength="3">
    </div>

     <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email " name="email" title="Only numbers are required" autocomplete="on" minlength="10">
    </div>
        
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

 <?php include('inc/footer.php'); ?>
