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
         <center><h2>E-Shop Product Upload</h2></center>
       <form  method="POST" action="includes_admin/upload_eshop.inc.php" class="needs-validation" novalidate>
   
          <div class="form-group">
            <label for="validationCustom01">Product Name </label>
            <input type="text" id="validationCustom01" class="form-control" name="name" required>
            <div class="invalid-feedback">
              Please provide a valid name.
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom02">Price</label>
            <input type="number"  id="validationCustom02" class="form-control" name="price" required>
            <div class="invalid-feedback">
              Please provide a valid number.
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom08">Quantity</label>
            <input type="number"  id="validationCustom08" class="form-control" name="quantity" required>
            <div class="invalid-feedback">
              Please provide a valid number.
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom04">Description</label>
            <input type="text"  id="validationCustom04" class="form-control" name="desc" required>
            <div class="invalid-feedback">
              Please provide a valid description.
            </div>
          </div>
          <div class="form-group">
            <label >Condition</label>
            <select name="condition" class="form-control">
              <option value="new">new</option>
              <option value="used">used</option>
            </select>
          </div>
          <div class="form-group">
            <label >Type of Product</label>
            <select name="type" class="form-control">
              <option value="other">other</option>
              <option value="collar, leash">collar, leash</option>
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

          <input class="btn btn-warning mt-4" type="submit" value="Upload Product" name="upload_product" />
        </form>
  </div>
</div>
</div>

 <?php };
 include ("includes_admin/footer.inc.php"); ?>    