<?php include ("includes_admin/navbar.inc.php");
	  include ("includes_admin/dbh.inc.php"); 
    if (isset($_SESSION['userUid']))
      {
     if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($conn, "DELETE FROM supporter WHERE supporter_id=$id");
  $_SESSION['message'] = "User deleted!";
}
    ?>

  <?php $results = mysqli_query($conn, "SELECT * FROM supporter
                                         LEFT JOIN dog ON dog.dog_id = supporter.fk_dog_id 
                                         LEFT JOIN cat ON cat.cat_id = supporter.fk_cat_id WHERE supporter.verify=1"); ?>
<div class="container-fluid">
  
<div class="row">
  <div class="col-md-10 offset-md-2 users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
      
    <table class="table bordered">
  <thead>
    <tr>
      <th><?php echo $languages[$x]["city"] ?>:</th>
      <th><?php echo $languages[$x]["street"] ?>:</th>
      <th><?php echo $languages[$x]["zip"] ?>:</th>
      <th>Tel:</th>
      <th>Email:</th>
      <th><?php echo $languages[$x]["up_name"] ?>:</th>
      <th>Verify:</th>
      <th><?php echo $languages[$x]["req_date"] ?>:</th>
      <th><?php echo $languages[$x]["suppet"] ?>:</th>
      <th><?php echo $languages[$x]["petev"] ?>:</th>
      <th><?php echo $languages[$x]["up_del_btn"] ?></th>

    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['street']; ?></td>
      <td><?php echo $row['zip']; ?></td>
      <td><?php echo $row['tel']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['verify']; ?></td>
      <td><?php echo $row['req_date']; ?></td>
      <td><?php echo isset($row['dog_name']) ? "Dog: ".$row['dog_name'].$row['dog_id_old'] :  "Cat: ".$row['cat_name'].$row['cat_id_old']?></td>
      <td><?php echo isset($row['dog_name']) ? "Evidence ID: ".$row['dog_id_old'] :  "Evidence ID: ".$row['cat_id_old']?></td>
      <?php echo 
      '<td>
        <a href="list_supporters.php?del='.$row['supporter_id'].'" class="btn btn-danger">Delete</a>
      </td>'
      ?>
      </tr>
  <?php } ?>
</table>
</div>
</div>
</div>
</div>
  </div>
  <?php }
  include ("includes_admin/footer.inc.php"); ?>