<?php
require_once "includes_admin/navbar.inc.php";
require_once "includes_admin/dbh.inc.php";
require_once "includes_admin/edit_team.inc.php";

	if (isset($_SESSION['userUid']))
	                      {
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($conn, "SELECT * FROM team WHERE team_id=$id");
		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$position = $n['position'];
			$description = $n['description'];
		}
	}
$results = mysqli_query($conn, "SELECT * FROM team");
?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="contentainer-fluid">
	<div class="row">
	<div class="col-md-10 offset-md-2 users_content">
		<?php 
        if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
		<div class="card card_adminpanel">
		<div class="card-body">
			
		<table class="table bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Position</th>
			<th>Description</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['position']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td>
				<a href="edit_team.php?edit=<?php echo $row['team_id'] ?>" class="btn btn-info">Edit</a>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['team_id'] ?>">
        Delete
      </button>
            </td>
            <!-- Modal -->
      <div class="modal fade" id="deleteModal<?php echo $row['team_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you really want to delete this record?</p>
              <p>Name: <?php echo $row['name'] ?></p>
              <p>Position: <?php echo $row['position'] ?></p>
            </div>
            <div class="modal-footer">
              <a href="edit_team.php?del=<?php echo $row['team_id'] ?>" class="btn btn-danger">Delete</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </tr>
        <?php } ?>
</table>
</div>
</div>
	</div>
	
		<div class="inputform">
			<form method="post" action="includes_admin/edit_team.inc.php" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group form-group">
					<label class="col">Name: </label>
					<input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
				</div>
				<div class="input-group form-group">
					<label class="col">position: </label>
					<input class="form-control" type="text" name="position" value="<?php echo htmlspecialchars($position); ?>">
				</div>
				<div class="input-group form-group">
					<label class="col">description: </label>
					<textarea id="textarea_users" class="form-control" type="text" name="description"><?php echo htmlspecialchars($description); ?></textarea>
				</div>
				<button class="btn btn-center" type="submit" name="update">update</button>
			</form>
		</div>
</div>
	</div>

<?php
require_once("includes_admin/footer.inc.php");
 }; ?>