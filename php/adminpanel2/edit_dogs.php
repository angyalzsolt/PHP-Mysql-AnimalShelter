<?php
require_once "includes_admin/navbar.inc.php"; 
require_once "includes_admin/dbh.inc.php";
require_once "includes_admin/edit_dogs.inc.php";
  if (isset($_SESSION['userUid']))
                        {
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM dog WHERE dog_id=$id");
    if (mysqli_num_rows($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $dog_name = $n['dog_name'];
      $post_date = $n['post_date'];
      $born_date = $n['born_date'];
      $castration = $n['castration'];
      $height = $n['height'];
      $weight = $n['weight'];
      $dog_desc = $n['dog_desc'];
      $type = $n['type'];
      $dog_id_old = $n['dog_id_old'];
      $gender = $n['gender'];
      $in_memoriam = $n['in_memoriam'];
    }
  }
$results = mysqli_query($conn, "SELECT * FROM dog");
 ?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="container-fluid">
  <div class="row">
  <div class="col-md-10 offset-md-2 users_content">
    <?php if(isset($_GET['success'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>".$languages[$x]["success"]."</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }   ?>
    <div class="card card_adminpanel">
    <div class="card-body">
    <table class="table bordered">
  <thead>
   <tr>
      <th><?php echo $languages[$x]["up_id"] ?></th>
      <th>evidence ID</th>
      <th><?php echo $languages[$x]["up_name"] ?></th>
      <th><?php echo $languages[$x]["up_post_date"] ?></th>
      <th><?php echo $languages[$x]["up_born"] ?></th>
      <th><?php echo $languages[$x]["up_cast"] ?></th>
      <th><?php echo $languages[$x]["up_height"] ?></th>
      <th><?php echo $languages[$x]["up_weight"] ?></th>
      <th><?php echo $languages[$x]["up_desc"] ?></th>
      <th><?php echo $languages[$x]["up_breed"] ?></th>
      <th><?php echo $languages[$x]["up_gender"] ?></th>
      <th><?php echo $languages[$x]["up_live"] ?></th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['dog_id']; ?></td>
      <td><?php echo $row['dog_id_old']; ?></td>
      <td><?php echo $row['dog_name']; ?></td>
      <td><?php echo $row['post_date']; ?></td>
      <td><?php echo $row['born_date']; ?></td>
      <td><?php echo $row['castration']; ?></td>
      <td><?php echo $row['height']; ?></td>
      <td><?php echo $row['weight']; ?></td>
      <td><?php echo $row['dog_desc']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['in_memoriam']; ?></td>
      <td>
        <a href="edit_dogs.php?edit=<?php echo $row['dog_id'] ?>" class="btn btn-info" ><?php echo $languages[$x]["up_edit_btn"] ?></a>
      </td>
      <td>
       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['dog_id'] ?>">
        <?php echo $languages[$x]["up_del_btn"] ?>
      </button>
            </td>
            <!-- Modal -->
      <div class="modal fade" id="deleteModal<?php echo $row['dog_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you really want to delete this dog?</p>
              <p>Name: <?php echo $row['dog_name'] ?></p>
              <p>Type: <?php echo $row['type'] ?></p>
            </div>
            <div class="modal-footer">
              <a href="edit_dogs.php?del=<?php echo $row['dog_id'] ?>" class="btn btn-danger">Delete</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </tr>
  <?php } ?>
</table>
</div>
</div>
  </div>
  
    <div class="inputform">
      <form method="post" action="includes_admin/edit_dogs.inc.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_name"] ?>:</label>
          <input class="form-control " type="text" name="dog_name" value="<?php echo htmlspecialchars($dog_name); ?>">
        </div>
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_born"] ?>:</label>
          <input class="form-control " type="date" name="born_date" value="<?php echo htmlspecialchars($born_date); ?>">
        </div>
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_cast"] ?>: </label>
          <input class="form-control " type="text" name="castration" value="<?php echo htmlspecialchars($castration); ?>">
        </div>
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_height"] ?>: </label>
          <input class="form-control " type="text" name="height" value="<?php echo htmlspecialchars($height); ?>">
        </div>
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_weight"] ?>: </label>
          <input class="form-control " type="text" name="weight" value="<?php echo htmlspecialchars($weight); ?>">
        </div><label class="col"><?php echo $languages[$x]["up_desc"] ?>: </label><br>
        <div class="input-group form-group">
          
          <textarea id="textarea_users" class="form-control" type="text" name="dog_desc"><?php echo htmlspecialchars($dog_desc); ?></textarea>
        </div>
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_breed"] ?>: </label>
          <input class="form-control " type="text" name="type" value="<?php echo htmlspecialchars($type); ?>">
        </div>
         <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_gender"] ?>: </label>
          <input class="form-control " type="text" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
        </div>
        <div class="input-group form-group">
          <label class="col"><?php echo $languages[$x]["up_id"] ?>: </label>
          <input class="form-control " type="text" name="dog_id_old" value="<?php echo $dog_id_old; ?>">
        </div>
         <div class="input-group form-group">
          <label class="col">Status: </label>
           <input type="radio" name="in_memoriam" value="1" <?php  if ($in_memoriam == 1){?>checked <?php } ?>> <?php echo $languages[$x]["up_living"] ?>  <br>
           <input type="radio" name="in_memoriam" value="2" <?php  if ($in_memoriam == 2){?>checked <?php } ?>> R.I.P.<br>
        </div>
        <button class="btn btn-center" type="submit" name="update"><?php echo $languages[$x]["up_update_btn"] ?></button>
      </form>
    </div>
  </div>
</div>
<?php
require_once("includes_admin/footer.inc.php"); 
 };

?>