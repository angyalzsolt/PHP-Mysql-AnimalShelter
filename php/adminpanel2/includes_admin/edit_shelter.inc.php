<?php 
require_once("dbh.inc.php");
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT url FROM place WHERE place_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	if(is_file("../../../image_upload/".$rowss['url'])){
		unlink("../../../image_upload/".$rowss['url']);
	} else {
		echo '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Image  not found/ deleted!
                    </div>
                </div>
            </div>  
        </div>';
	}
	
	mysqli_query($conn, "DELETE FROM place WHERE place_id=$id");
	//$_SESSION['message'] = "Shelter deleted!";
	header("Location: ../edit_shelter.php?success");
}
?>