<?php 
include_once('inc/header.php');
include_once('conn/connection.php'); ?>
<div class="row">

<h2>Users</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Sno</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      
         <!--<th>View</th>-->
        <th>Update</th>
          <th>Delete</th>
      </tr>
    </thead>
   

<?php 
$select_data = $conn->prepare("SELECT id, first_name, last_name,email FROM users");
$select_data->execute();
$select_data -> bind_result($id,$first_name, $last_name,$email);
$sno='1';
while ($select_data ->fetch()) {
    //echo "$first_name: $last_name : $mobile<br>";
  ?>
   <tbody>
      <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $first_name; ?></td>
        <td><?php echo $last_name;?></td>
         <td><?php echo $email;?></td>
       <td><a href="update_data.php?id=<?php echo $id; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
          <td><a href="delete_data.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-xs" onclick="return del();"><span class="glyphicon glyphicon-trash"></span></button></a></td>
          
      </tr>
      

  <?php
  }

 

?>
</tbody>
  </table>
</div>
<?php include_once('inc/footer.php'); ?>