<?php 
require_once("includes_admin/dbh.inc.php");
require_once("includes_admin/navbar.inc.php");
if (isset($_SESSION['userUid']))
      {
   
$sql = "SELECT * FROM place";
$result = mysqli_query($conn, $sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

 ?>
<link rel="stylesheet" type="text/css" href="../../css/shelter.css">
<div class="break">
</div>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-2">
      <?php 
        if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$languages[$x]["success"]."</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
      <h1><?php echo $languages[$x]["img_del_title"] ?></h1>
      <hr>
    </div>
    <div class="col-md-10 offset-md-2">
      <div class="row">
	

<?php foreach($rows as $row){ ?>
        <div class="part_divs col-md-3 offset-md-1 col-sm-5 offset-sm-2 mb-4 mt-2">
          <div class="small_parts">
            <img class="imag" src="../../image_upload/<?php echo $row["url"]; ?>" alt="">
            <div class="buttons_div">
              <a href="includes_admin/edit_shelter.inc.php?del=<?php echo $row['place_id'] ?>" class="btn btn-danger"><?php echo $languages[$x]["up_del_btn"] ?></a>
            </div>
          </div>
        </div>

<?php }; ?>

		</div>
	</div>
</div>
</div>


<?php
require_once("includes_admin/footer.inc.php");
}; 

?>