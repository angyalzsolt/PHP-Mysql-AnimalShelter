<?php
include "includes_admin/navbar.inc.php"; 
require_once 'includes_admin/upload_auctions.inc.php';
if (isset($_SESSION['userUid']))
      {

?>
        <div class="container">
          <div class="row">
            
          <div class="col-md-10 offset-md-2 ">
            <?php if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Uploaded successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
         <center><h2><?php echo $languages[$x]["up_auc2"] ?></h2></center>
       <form  method="POST" action="includes_admin/upload_auctions.inc.php" class="needs-validation" novalidate>
   
          <div class="form-group">
            <label for="validationCustom01"><?php echo $languages[$x]["name_pr"] ?> </label>
            <input type="text" id="validationCustom01" class="form-control" name="name" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom02"><?php echo $languages[$x]["price"] ?></label>
            <input type="number"  id="validationCustom02" class="form-control" name="price" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03"><?php echo $languages[$x]["end_auct"] ?></label>
            <input type="date"  id="validationCustom03" class="form-control" name="edate" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom04"><?php echo $languages[$x]["up_desc"] ?></label>
            <input type="text"  id="validationCustom04" class="form-control" name="desc" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label ><?php echo $languages[$x]["condition"] ?></label>
            <select name="condition" class="form-control">
              <option value="new"><?php echo $languages[$x]["new"] ?></option>
              <option value="used"><?php echo $languages[$x]["used"] ?></option>
            </select>
          </div>
          <input class="btn btn-warning mt-4" type="submit" value="<?php echo $languages[$x]["up_load_btn"] ?>" name="upload_product" />
        </form>
  </div>

</div>
</div>

 <?php };
 include ("includes_admin/footer.inc.php"); ?>