<?php 
require_once("dbh.inc.php");

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT image_cat FROM image_cat WHERE image_cat_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	if(is_file("../../../image_upload/".$rowss['image_cat_id'])){
		unlink("../../../image_upload/".$rowss['image_cat_id']);
	} else {
		header("Location: ../select_cat.php?delete");
	}	
	mysqli_query($conn, "DELETE FROM image_cat WHERE image_cat_id=$id");
	header("Location: ../select_cat.php?delete");
}
?>