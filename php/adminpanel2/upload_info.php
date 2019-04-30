<?php
include "includes_admin/navbar.inc.php";
if (isset($_SESSION['userUid']))
            {   

require_once 'includes_admin/upload_info.inc.php';
?>
        <div class="container"> 
          <div class="row">
           
          <div class="col-md-10 offset-md-2"><?php if(isset($_GET['success'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }   ?>
         <center><h2><?php echo $languages[$x]["upload_info"] ?></h2></center>
       <form action="includes_admin/upload_info.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="validationCustom01"><?php echo $languages[$x]["edit_title"] ?>:</label>
            <input type="text" id="validationCustom01" class="form-control" name="title" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03">Text: </label>
           
            <textarea class="form-control" id="validationCustom03" type="text" name="text"  rows="18" required></textarea>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <input class="btn btn-warning" type="submit" value="<?php echo $languages[$x]["up_next_btn"] ?>" name="upload_info" />
        </form>
  </div>
</div>
</div>
<?php } include "includes_admin/footer.inc.php"; ?>
