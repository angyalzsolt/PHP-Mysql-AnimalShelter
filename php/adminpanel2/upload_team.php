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
         <center><h2>Team Upload</h2></center>
       <form action="includes_admin/upload_team.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="validationCustom01">Team Member Name</label>
            <input type="text" id="validationCustom01" class="form-control" name="name" required>
            <div class="invalid-feedback">
              Please provide a valid name.
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom02">Position</label>
            <input type="text"  id="validationCustom02" class="form-control" name="position" required>
            <div class="invalid-feedback">
              Please provide a valid position.
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03">Description</label>
            <input type="text"  id="validationCustom03" class="form-control" name="desc" required>
            <div class="invalid-feedback">
              Please provide a valid description.
            </div>
          </div>
          <input class="btn btn-warning"" type="submit" value="Next" name="upload_team" />
        </form>
  </div>
</div>
</div>
<?php } include "includes_admin/footer.inc.php"; ?>
