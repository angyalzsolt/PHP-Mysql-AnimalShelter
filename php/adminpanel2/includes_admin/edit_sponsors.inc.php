<?php 
	include_once "dbh.inc.php";
	
	// initialize variables
	$address = "";
	$email = "";
	$name = "";

if (isset($_POST['update'])) {
	$address = mysqli_real_escape_string($conn, $_POST['sponsors_address']);
	$email = mysqli_real_escape_string($conn, $_POST['sponsors_email']);
	$name = mysqli_real_escape_string($conn, $_POST['sponsors_name']);
	$id = $_POST['id'];
	mysqli_query($conn, "UPDATE sponsors SET   sponsors_address='$address', sponsors_email='$email', sponsors_name='$name' WHERE sponsors_id='$id'");
	$_SESSION['message'] = "Sponsors updated!"; 
	header('location: ../edit_sponsors.php?success');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT * FROM sponsors_image WHERE fk_sponsors_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	//file_exists should work as well, but it doesn't
	if(is_file("../../image_upload/".$rowss['sponsors_image'])) {
		unlink("../../image_upload/".$rowss['sponsors_image']);
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
	}

	mysqli_query($conn, "DELETE FROM sponsors WHERE sponsors_id=$id");
	$_SESSION['message'] = "Sponsors deleted!"; 
	echo '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Record deleted!
                    </div>
                </div>
            </div>  
        </div>';
}
?>