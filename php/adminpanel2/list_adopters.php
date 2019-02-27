<?php include ("includes_admin/navbar.inc.php");
    include ("includes_admin/dbh.inc.php");
if (isset($_SESSION['userUid']))
      {
    if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($conn, "DELETE FROM adaption WHERE adoption_id=$id");
  $_SESSION['message'] = "User deleted!";
}
     ?>

  <?php $results = mysqli_query($conn, "SELECT * FROM adaption LEFT JOIN dog ON dog.dog_id = adaption.fk_dog_id 
                                         LEFT JOIN cat ON cat.cat_id = adaption.fk_cat_id WHERE adaption.verify=1"); ?>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-10 offset-md-2 users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
      
    <table class="table bordered">
  <thead>
    <tr>
      <th>Name:</th>
      <th>Kind:</th>
      <th>Address:</th>
      <th>Email:</th>
      <th>Other pets:</th>
      <th>Kind of pets:</th>
      <th>Telephone Number 1:</th>
      <th>Telephone Number 2:</th>
      <th>Date:</th>
      <th>Supported Pet:</th>
      <th>Pet Evidence ID:</th>
      <th>Delete</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['kind']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['other_pets']; ?></td>
      <td><?php echo $row['kind_of_pets']; ?></td>
      <td><?php echo $row['telephone_number1']; ?></td>
      <td><?php echo $row['telephone_number2']; ?></td>
      <td><?php $date2 = strtotime($row["req_date"]);
               echo $new_date = date('d. m. Y', $date2); ?></td>
      <td><?php echo isset($row['dog_name']) ? "Dog: ".$row['dog_name'].$row['dog_id_old'] :  "Cat: ".$row['cat_name'].$row['cat_id_old']?></td>
      <td><?php echo isset($row['dog_name']) ? "Evidence ID: ".$row['dog_id_old'] :  "Evidence ID: ".$row['cat_id_old']?></td>
      <?php echo 
      '<td>
        <a href="list_adopters.php?del='.$row['adoption_id'].'" class="btn btn-danger">Delete</a>
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