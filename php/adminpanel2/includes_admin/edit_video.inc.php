<?php 
	require_once "dbh.inc.php";

$title = "";
$url = "";
if (isset($_POST['update'])) {
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$url = mysqli_real_escape_string($conn, $_POST['url']);
	$id = $_POST['id'];
	mysqli_query($conn, "UPDATE videos SET title='$title', url='$url' WHERE video_id='$id'");
	$_SESSION['message'] = "video updated!"; 
	header('location: ../edit_video.php?success');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	
	mysqli_query($conn, "DELETE FROM videos WHERE video_id=$id");
	$_SESSION['message'] = "video deleted!"; 
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