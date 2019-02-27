<?php 
include "includes_admin/navbar.inc.php"; 
require_once 'includes_admin/upload_reports.inc.php';
if (isset($_SESSION['userUid']))
     
?>
        <div class="container">
          <div class="row">
            
          <div class="col-md-10 offset-md-2">
            <?php  {
        if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Uploaded successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
         <center><h2>Report Upload</h2></center>
       <form action="includes_admin/upload_reports.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="error1">Report Title</label>
            <input type="text" id="error1" class="form-control" name="title" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <div class="form-group">
            <label for="error2">Description</label>
            <input type="text" id="error2" class="form-control" name="desc" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <div class="form-group">
            <label for="error3">Date</label>
            <input type="date" id="error3" class="form-control" name="reports_date"
            required>
            <div class="invalid-feedback">
              Please choose a value.
            </div>
          </div>
          <div class="form-group">
            <label for="error4">Keywords (for search)</label>
            <input type="text" id="error4" class="form-control" name="keywords" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <input class="btn btn-warning"" type="submit" value="Next" name="upload_report" />
        </form>
  </div>
</div>
</div>
 <?php };
 include ("includes_admin/footer.inc.php"); ?>