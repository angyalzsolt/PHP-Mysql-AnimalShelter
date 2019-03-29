<?php 
include "includes_admin/navbar.inc.php"; 
include_once "includes_admin/dbh.inc.php";
include_once "includes_admin/edit_adopt.inc.php";
?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="break">
	
</div>
<div class="container">
	<div class='row'>
	<?php
if (isset($_SESSION['userUid']))
      {
$results = mysqli_query($conn, "SELECT * FROM how_adopt");
while ($row = mysqli_fetch_array($results)) { 
	 ?>
		<hr>
		<div class="col-md-10 offset-md-2">
			<?php 
        if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$languages[$x]["up_success"]."!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
		<form action="includes_admin/edit_adopt.inc.php" method="POST">
		<div class="form-group">
			<label><b><?php echo $languages[$x]["edit_title"] ?>:</b></label>
			<input class="form-control " type="text" name="title" value="<?php echo htmlspecialchars($row["adopt_title"]); ?>">
		</div>
		<div class="form-group">
			<label><b>Text: </b></label>
			<textarea class="form-control" type="text" name="text"  rows="18"><?php echo htmlspecialchars($row["adopt_text"]); ?></textarea>
		</div>          
		<button class="btn btn-warning" type="submit" name="edit_adopt" value="<?php echo $row["how_adopt_id"]; ?>" ><?php echo $languages[$x]["up_edit_btn"] ?></button>
		</form><br>
		</div>		
		<?php
	}
	?>
		</div>
	</div>
<?php  }
include "includes_admin/footer.inc.php"; 
?>