<?php 
include "includes_admin/navbar.inc.php"; 
include_once "includes_admin/dbh.inc.php";
include_once "includes_admin/edit_mission.inc.php";
?>
<link rel="stylesheet" type="text/css" href="../../css/users.css">
<div class="break">
	
</div>
<div class="container">
	<div class='row'>
		<?php 
        if (isset($_GET['success'])) {
  echo "<div class='col-md-10 offset-md-2' >
  	
  </div><div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div></div>";
      } ?>
	<?php if (isset($_SESSION['userUid']))
      {
	$sql = "SELECT * FROM mission";
	$result = mysqli_query($conn, $sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	foreach ($rows as $row) {
		echo "<hr>
		<div class='col-md-10 offset-md-2'>
		<form action='edit_mission.php' method='POST'>
		<div class='form-group'>
			<label><b>Title: </b></label>
			<input class='form-control ' type='text' name='title' value='".htmlspecialchars($row["mission_title"])."'>
		</div>
		<div class='form-group'>
			<label><b>Text: </b></label>
			<textarea class='form-control' type='text' name='text'  rows='18'>".htmlspecialchars($row["mission_text"])."</textarea>
		</div>          
		<button class='btn btn-warning' type='submit' name='edit_mission' value='".$row["mission_id"]."' >Edit</button>
		</form><br>
		</div>
		
		
		";
	}
	?>
		</div>
	</div>
<?php   }
include "includes_admin/footer.inc.php"; 
?>