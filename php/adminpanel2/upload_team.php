<?php
include "includes_admin/navbar.inc.php";
if (isset($_SESSION['userUid']))
            {   
if(isset($_GET['success'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }  
require_once 'includes_admin/upload_team.inc.php';
?>
        <div class="container">
          <div class="row">
            
          <div class="col-md-10 offset-md-2">
            <?php         if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Uploaded successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
         <center><h2><?php echo $languages[$x]["team_title"] ?></h2></center>
       <form action="includes_admin/upload_team.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="validationCustom01"><?php echo $languages[$x]["team_name"] ?></label>
            <input type="text" id="validationCustom01" class="form-control" name="name" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom02"><?php echo $languages[$x]["team_pos"] ?></label>
            <input type="text"  id="validationCustom02" class="form-control" name="position" required>
            <div class="invalid-feedback">
             <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03"><?php echo $languages[$x]["team_desc"] ?></label>
            <input type="text"  id="validationCustom03" class="form-control" name="desc" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <input class="btn btn-warning" type="submit" value="<?php echo $languages[$x]["up_next_btn"] ?>" name="upload_team" />
        </form>
  </div>
</div>
</div>
<?php } include "includes_admin/footer.inc.php"; ?>
