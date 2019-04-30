<?php
include "includes_admin/navbar.inc.php"; 
require_once 'includes_admin/upload_sponsors.inc.php';
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
?>
        <div class="container">
          <div class="row">
            
          <div class="col-md-10 offset-md-2">
            <?php 
                    if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Uploaded successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
         <center><h2><?php echo $languages[$x]["spon_title"] ?></h2></center>
       <form action="includes_admin/upload_sponsors.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="error1"><?php echo $languages[$x]["spon_name"] ?></label>
            <input type="text" id="error1" class="form-control" name="name" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="error2"><?php echo $languages[$x]["address"] ?></label>
            <input type="text" id="error2" class="form-control" name="address" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="error3">URL</label>
            <input type="text" id="error3" class="form-control" name="email" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <input class="btn btn-warning" type="submit" value="<?php echo $languages[$x]["up_next_btn"] ?>" name="upload_sponsors" />
        </form>
  </div>
  <?php } 
  include "includes_admin/footer.inc.php"; ?>