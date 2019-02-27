<?php 
	include_once "dbh.inc.php";
	
	// initialize variables
	$date = "";
	$description = "";
	$name = "";
	$keywords = "";

if (isset($_POST['update'])) {
	$date = mysqli_real_escape_string($conn, $_POST['report_date']);
	$description = mysqli_real_escape_string($conn, $_POST['report_description']);
	$name = mysqli_real_escape_string($conn, $_POST['report_name']);
	$keywords = mysqli_real_escape_string($conn, $_POST['report_keywords']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	mysqli_query($conn, "UPDATE reports SET  reports_date='$date', reports_descriptions='$description',  name='$name', keywords='$keywords' WHERE reports_id='$id'");
	
	header('location: ../edit_report.php?success');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql1 = "SELECT * FROM reports_image WHERE fk_reports_id = $id";
	$results = mysqli_query($conn, $sql1);
	$rowss = mysqli_fetch_assoc($results);
	if(is_file("../../image_upload/".$rowss['reports_image'])) {
		unlink("../../image_upload/".$rowss['reports_image']);
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

	mysqli_query($conn, "DELETE FROM reports WHERE reports_id=$id");
	$_SESSION['message'] = '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Record deleted!
                    </div>
                </div>
            </div>  
        </div>';
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