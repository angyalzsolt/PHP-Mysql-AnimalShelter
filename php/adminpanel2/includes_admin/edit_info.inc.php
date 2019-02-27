<?php 
include_once "dbh.inc.php";

if(isset($_POST['edit_info'])) {
$info_id = $_POST['edit_info'];
$title =  mysqli_real_escape_string($conn,$_POST['title']);
$text =  mysqli_real_escape_string($conn,$_POST['text']);

mysqli_query($conn, "UPDATE `info` SET `info_title` = '$title', `info_text` = '$text' WHERE info_id=$info_id");
header('location: ../edit_info.php?success');

}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	
	mysqli_query($conn, "DELETE FROM info WHERE info_id=$id");
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
