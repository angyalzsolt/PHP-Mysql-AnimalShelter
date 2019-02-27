<?php 
require_once("dbh.inc.php");
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT annual_report FROM annual_report WHERE annual_report_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	if(is_file("../../../image_upload/".$rowss['annual_report'])){
		unlink("../../../image_upload/".$rowss['annual_report']);
	} else {
		header("Location: ../edit_report_image.php?delete");
	}
	
	mysqli_query($conn, "DELETE FROM annual_report WHERE annual_report_id=$id");
	//$_SESSION['message'] = "Shelter deleted!";
	header("Location: ../edit_report_image.php?success");
}
?>