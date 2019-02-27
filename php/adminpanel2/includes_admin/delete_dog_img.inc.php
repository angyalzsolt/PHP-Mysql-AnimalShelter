<?php 
require_once("dbh.inc.php");
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT image_dog FROM image_dog WHERE image_dog_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	if(is_file("../../../image_upload/".$rowss['image_dog_id'])){
		unlink("../../../image_upload/".$rowss['image_dog_id']);
	} else {
		header("Location: ../select_dog.php?success");
	}
	mysqli_query($conn, "DELETE FROM image_dog WHERE image_dog_id=$id");
	header("Location: ../select_dog.php?success");
	echo 'Deleted successfully.'; 
}
?>