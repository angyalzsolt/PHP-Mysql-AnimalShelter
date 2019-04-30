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
require_once 'includes_admin/upload_video.inc.php';
?>
<style>
.red {
background-color: red;
}
</style>
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
         <center><h2>Video Upload</h2></center>
       <form action="includes_admin/upload_video.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="validationCustom01">Title</label>
            <input type="text" id="validationCustom01" class="form-control" name="title" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group ">
            <label for="validationCustom02"><p><span class="grey">URL : Please copy just this part as in example: https://www.youtube.com/watch?v=</span><span class="red">8j741TUIET0</span></p></label>
            <input type="text"  id="validationCustom02" class="form-control" name="url" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <input class="btn btn-warning" type="submit" value="Next" name="upload_video" />
        </form>
  </div>
</div>
</div>
<?php } include "includes_admin/footer.inc.php"; ?>
