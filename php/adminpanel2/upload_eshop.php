<?php
include "includes_admin/navbar.inc.php"; 
require_once 'includes_admin/upload_eshop.inc.php';
if (isset($_SESSION['userUid']))
      {

?>
        <div class="container-fluid">
          <div class="row">
            
          <div class="col-md-10 offset-md-2"><?php 
if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Uploaded successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }
           ?>
         <center><h2><?php echo $languages[$x]["up_pr"] ?></h2></center>
       <form  method="POST" action="includes_admin/upload_eshop.inc.php" class="needs-validation" novalidate>
   
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
            <label for="validationCustom08"><?php echo $languages[$x]["quantity"] ?></label>
            <input type="number"  id="validationCustom08" class="form-control" name="quantity" required>
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
          <div class="form-group">
            <label ><?php echo $languages[$x]["type_pr"] ?></label>
            <select name="type" class="form-control">
              <option value="other"><?php echo $languages[$x]["other"] ?></option>
              <option value="collar, leash"><?php echo $languages[$x]["col_lea"] ?></option>
              <option value="cloth 20cm">cloth 20cm</option>
              <option value="cloth 25cm">cloth 25cm</option>
              <option value="cloth 30cm">cloth 30cm</option>
              <option value="cloth 35cm">cloth 35cm</option>
              <option value="cloth 40cm">cloth 40cm</option>
              <option value="cloth 45cm">cloth 45cm</option>
              <option value="cloth 50cm">cloth 50cm</option>
              <option value="cloth over 50cm">cloth over 50cm</option>
            </select>
          </div>

          <input class="btn btn-warning mt-4" type="submit" value="<?php echo $languages[$x]["up_load_btn"] ?>" name="upload_product" />
        </form>
  </div>
</div>
</div>

 <?php };
 include ("includes_admin/footer.inc.php"); ?>    