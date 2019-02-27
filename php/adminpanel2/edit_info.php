<?php 
include "includes_admin/navbar.inc.php"; 
include_once "includes_admin/dbh.inc.php";
include_once "includes_admin/edit_info.inc.php";
?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="break">
	
</div>
<div class="container">
	<div class='row'>
	<?php
if (isset($_SESSION['userUid']))
      {
$results = mysqli_query($conn, "SELECT * FROM info");
while ($row = mysqli_fetch_array($results)) { 
	 ?>
		<hr>
		<div class="col-md-10 offset-md-2">
			<?php 
	if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Edited successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
		<form action="includes_admin/edit_info.inc.php" method="POST">
		<div class="form-group">
			<label><b>Title: </b></label>
			<input class="form-control " type="text" name="title" value="<?php echo htmlspecialchars($row["info_title"]); ?>">
		</div>
		<div class="form-group">
			<label><b>Text: </b></label>
			<textarea class="form-control" type="text" name="text"  rows="18"><?php echo htmlspecialchars($row["info_text"]); ?></textarea>
		</div>          
		<button class="btn btn-warning" type="submit" name="edit_info" value="<?php echo $row["info_id"]; ?>" >Edit</button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['info_id']; ?>">
        Delete
      </button>

      <!-- Modal -->
      <div class="modal fade" id="deleteModal<?php echo $row['info_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you really want to delete this record?</p>
              <p><?php echo $row['info_title']; ?></p>
            </div>
            <div class="modal-footer">
              <a href="edit_info.php?del=<?php echo $row['info_id']; ?>" class="btn btn-danger">Delete</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
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