<?php 
require_once("includes_admin/dbh.inc.php");
require_once("includes_admin/navbar.inc.php");
if (isset($_SESSION['userUid']))
      {
if (isset($_GET['select_cat'])) {
  $catid = $_GET['id'];
}       
$sql = "SELECT * FROM image_cat WHERE fk_cat_id=$catid";
$result = mysqli_query($conn, $sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
 ?>
<link rel="stylesheet" type="text/css" href="../../css/shelter.css">
<div class="break">
</div>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-2">
      <h1>Edit Images</h1>
      <hr>
    </div>
    <div class="col-md-10 offset-md-2">
      <div class="row"> <div class="col-12">
        <?php 
         if(isset($_GET['success'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }   
        if(isset($_GET['delete'])){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Deleted!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }  ?> 
      <h2 class="mb-4">Delete Pictures</h2></div>
<?php foreach($rows as $row){ ?>
        <div class="part_divs col-md-3 offset-md-1 col-sm-5 offset-sm-2 mb-4 mt-2">
             <div class="small_parts mb-4">
            <img class="imag" src="../../image_upload/<?php echo $row["image_cat"]; ?>" alt="">
            <div class="buttons_div">
              <a href="includes_admin/delete_cat_img.inc.php?del=<?php echo $row['image_cat_id'] ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
<?php }; ?>
		</div>
	</div>

  <div class="col-md-10 offset-md-2">
    
    <hr class="mb-4" >
    <div>
    <h2 class="mb-4">Upload Other Pictures</h2>
    <form  method="post" action="includes_admin/image_upload_cat3.inc.php" enctype="multipart/form-data" class="mb-4">
      <input type="file" name="file" class="mb-4" onchange="readURL(this);" required="true">
      <p><button type="submit" class="btn btn-primary" value="<?php echo $catid ?>" name="submitOther">UPLOAD</button></p>
    </form> 
  </div>
  </div>
  <div class="col-lg-6"><img id="review" src="#" alt=""></div>
</div>
</div>
<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#review')
        .attr('src', e.target.result)
        .width(450)
        .height(500);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>


</div>
<?php
require_once("includes_admin/footer.inc.php");
}; 

?>