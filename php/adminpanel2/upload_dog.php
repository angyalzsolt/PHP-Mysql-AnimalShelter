<?php
include ("includes_admin/navbar.inc.php");
include("includes_admin/dbh.inc.php");
include("includes_admin/upload_dogs.inc.php");
if (isset($_SESSION['userUid']))
      { 

?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-2">
        <?php 
        if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$languages[$x]["up_success"]."</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
       <form action="includes_admin/upload_dogs.inc.php" method="POST" class="needs-validation" novalidate>
          <div class="form-group">
            <h1 class="m-4"><?php echo $languages[$x]["up_title"] ?></h1>
            <label class="mt-4" for="error1"><?php echo $languages[$x]["up_name"] ?></label>
            <input type="text" id="error1" class="form-control" name="dog_name" placeholder="Fluffy" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label ><?php echo $languages[$x]["evidence_id"] ?></label>
            <input type="text" class="form-control" name="dog_old_id" placeholder="12345" >
          </div>
          <div class="form-group">
            <label><?php echo $languages[$x]["up_gender"] ?></label>
            <select class="form-control" name="gender">
              <option value="male">male</option>
              <option value="female">female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="error2"><?php echo $languages[$x]["up_born"] ?></label>
            <input type="date" id="error2" class="form-control" name="born_date" placeholder="2016-01-01" required>
            <div class="invalid-feedback">
            <?php echo $languages[$x]["provide_value"] ?>
          </div>
          </div>
          <div class="form-group">
            <label><?php echo $languages[$x]["up_cast"] ?></label>
            <select class="form-control" name="castration">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="error3"><?php echo $languages[$x]["up_height"] ?></label>
            <input type="text" id="error3" class="form-control" name="height" placeholder="70 cm" required>
              <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="error4"><?php echo $languages[$x]["up_weight"] ?></label>
            <input type="text" id="error4" class="form-control" name="weight" placeholder="13 kg" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="error5"><?php echo $languages[$x]["up_breed"] ?></label>
            <input type="text" id="error5" class="form-control" name="type" placeholder="Labrador mixture" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="error6"><?php echo $languages[$x]["up_desc"] ?></label>
            <input type="text" id="error6" class="form-control" name="desc" placeholder="grumpy" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <input class="btn btn-warning" type="submit" value="<?php echo $languages[$x]["up_next_btn"] ?>" name="upload_dog_table" />
        </form>
      </div>
    </div>
  </div>
</body>

 <?php };
 include ("includes_admin/footer.inc.php"); ?>