<?php
include ("includes_admin/navbar.inc.php");
include("includes_admin/dbh.inc.php");
include("includes_admin/upload_cats.inc.php");
if (isset($_SESSION['userUid']))
      {

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
        <form action="includes_admin/upload_cats.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <h1 class="m-4">Cat Upload</h1>
            <label for="mb-4 error1">Cat Name</label>
            <input type="text" id="error1" class="form-control" name="cat_name" placeholder="Fluffy" required>
            <div class="invalid-feedback">
              Please provide a name.
            </div>
          </div>
          <div class="form-group">
            <label >Old ID</label>
            <input type="text" class="form-control" name="cat_old_id" placeholder="12345" >
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
              <option value="male">male</option>
              <option value="female">female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="error2">Born date</label>
            <input type="date" id="error2" class="form-control" name="born_date" placeholder="2016-01-01" required>
            <div class="invalid-feedback">
              Please choose a date.
            </div>
          </div>
          <div class="form-group">
            <label>Castration</label>
            <select class="form-control" name="castration">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="error3">Height</label>
            <input type="text" id="error3" class="form-control" name="height" placeholder="30 cm" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <div class="form-group">
            <label for="error4">Weight</label>
            <input type="text" id="error4" class="form-control" name="weight" placeholder="4 kg" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <div class="form-group">
            <label for="error5">Breed</label>
            <input type="text" id="error5" class="form-control" name="type" placeholder="European short hair" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <div class="form-group">
            <label for="error6">Description</label>
            <input type="text" id="error6" class="form-control" name="desc" placeholder="cute" required>
            <div class="invalid-feedback">
              Please provide a value.
            </div>
          </div>
          <input class="btn btn-warning"" type="submit" value="Next" name="upload_cat_table" />
        </form>
      </div>
    </div>
  </div>

 <?php };
 include ("includes_admin/footer.inc.php"); ?>