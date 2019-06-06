<?php
require_once "includes_admin/navbar.inc.php"; 
require_once "includes_admin/dbh.inc.php";
require_once "includes_admin/edit_sponsors.inc.php";
if (isset($_SESSION['userUid']))
	{
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($conn, "SELECT * FROM sponsors WHERE sponsors_id=$id");
		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$address = $n['sponsors_address'];
			$email = $n['sponsors_email'];
			$name = $n['sponsors_name'];
		}
	}
$results = mysqli_query($conn, "SELECT * FROM sponsors");
?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="contentainer-fluid">
	<div class="row">
	<div class="col-md-10 offset-md-2 users_content">
		<?php 
        if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$languages[$x]["success"]."</strong>
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
			<th><?php echo $languages[$x]["up_name"] ?></th>
			<th>URL</th>
			<th><?php echo $languages[$x]["address"] ?></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['sponsors_name']; ?></td>
			<td><?php echo $row['sponsors_email']; ?></td>
			<td><?php echo $row['sponsors_address']; ?></td>
			<td>
				<a href="edit_sponsors.php?edit=<?php echo $row['sponsors_id'] ?>" class="btn btn-info" ><?php echo $languages[$x]["up_edit_btn"] ?></a>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['sponsors_id'] ?>">
        <?php echo $languages[$x]["up_del_btn"] ?>
      </button>
            </td>
            <!-- Modal -->
      <div class="modal fade" id="deleteModal<?php echo $row['sponsors_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $languages[$x]["modal_title"] ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo $languages[$x]["modal_question"] ?></p>
              <p><?php echo $languages[$x]["up_name"] ?>: <?php echo $row['sponsors_name'] ?></p>
              <p>Position: <?php echo $row['sponsors_address'] ?></p>
            </div>
            <div class="modal-footer">
              <a href="edit_sponsors.php?del=<?php echo $row['sponsors_id'] ?>" class="btn btn-danger"><?php echo $languages[$x]["up_del_btn"] ?></a>
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
	
			<form method="post" action="includes_admin/edit_sponsors.inc.php" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group form-group">
					<label class="col"><?php echo $languages[$x]["address"] ?>: </label>
					<input class="form-control " type="text" name="sponsors_address" value="<?php echo htmlspecialchars($address); ?>">
				</div>
				<div class="input-group form-group">
					<label class="col">URL: </label>
					<input class="form-control " type="text" name="sponsors_email" value="<?php echo htmlspecialchars($email); ?>">
				</div>
				<div class="input-group form-group">
					<label class="col"><?php echo $languages[$x]["up_name"] ?>: </label>
					<input class="form-control " type="text" name="sponsors_name" value="<?php echo htmlspecialchars($name); ?>">
				</div>
				<button class="btn btn-center" type="submit" name="update"  ><?php echo $languages[$x]["up_edit_btn"] ?></button>
			</form>
		</div>
</div>
	</div>

<?php
require_once "includes_admin/footer.inc.php";
 }; ?>