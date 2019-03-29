<?php
include "includes_admin/navbar.inc.php";
include_once "includes_admin/dbh.inc.php";
include_once "includes_admin/edit_users.inc.php";
if (isset($_SESSION['userUid']))
              {
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$record = mysqli_query($conn, "SELECT * FROM users WHERE users_id=$id");
if (mysqli_num_rows($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$name = $n['users_name'];
		$email = $n['users_email'];
		$admin = $n['users_role'];
		}
	}

$results = mysqli_query($conn, "SELECT * FROM users"); ?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
	<div class="container-fluid">
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
	<div class="card card_adminpanel">
		<div class="card-body">
			
		<table class="table bordered">
	<thead>
		<tr>
			<th><?php echo $languages[$x]["admin_name"] ?></th>
			<th>E-Mail</th>
			<th>Admin (1 = yes // 0 = no)</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['users_name']; ?></td>
			<td><?php echo $row['users_email']; ?></td>
			<td><?php echo $row['users_role']; ?></td>
			<?php 
			echo '<td>
				<a href="edit_users.php?edit='. $row['users_id']. '" class="btn btn-info" >'.$languages[$x]["up_edit_btn"].'</a>
			</td>
			<td>
				<a href="edit_users.php?del='.$row['users_id'].'" class="btn btn-danger">'.$languages[$x]["up_del_btn"].'</a>
			</td>';
			?>
			</tr>
	<?php } ?>
</table>


		<div class="inputform">
			<form method="post" action="includes_admin/edit_users.inc.php" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group form-group">
					<label class="col"><?php echo $languages[$x]["admin_name"] ?>: </label>
					<input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
				</div>
				<div class="input-group form-group">
					<label class="col">E-Mail: </label>
					<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
				</div>
				<div class="input-group form-group">
					<label class="col">Admin: </label>
					<input class="form-control" type="text" name="admin" value="<?php echo $admin; ?>">
				</div>
				<button class="btn btn-center" type="submit" name="update"  ><?php echo $languages[$x]["up_update_btn"] ?></button>
			</form>
		</div>
	</div>
	</div>
	</div>
</div>
</div>
</body>
</html>
<?php } ?>