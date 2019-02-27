<?php 
	require_once "dbh.inc.php";

$name = "";
$position = "";
$description = "";	
if (isset($_POST['update'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$id = $_POST['id'];
	mysqli_query($conn, "UPDATE team SET name='$name', position='$position' , description='$description' WHERE team_id='$id'");
	$_SESSION['message'] = "Team updated!"; 
	header('location: ../edit_team.php?success');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT * FROM team_image WHERE fk_team_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	if(is_file("../../image_upload/".$rowss['team_image'])){
		unlink("../../image_upload/".$rowss['team_image']);
	} else {
		echo '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Image not found/ deleted!
                    </div>
                </div>
            </div>  
        </div>';
	};
	mysqli_query($conn, "DELETE FROM team WHERE team_id=$id");
	$_SESSION['message'] = "Team deleted!"; 
	echo '<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
		  			Record deleted!
					</div>
				</div>
			</div>	
		</div>';
}
?>

