<?php 
include_once "dbh.inc.php";
if(isset($_POST['edit_adopt'])) {
$adopt_id = $_POST['edit_adopt'];
$title =  mysqli_real_escape_string($conn,$_POST['title']);
$text =  mysqli_real_escape_string($conn,$_POST['text']);

mysqli_query($conn, "UPDATE `how_adopt` SET `adopt_title` = '$title', `adopt_text` = '$text' WHERE how_adopt_id=$adopt_id");
header('location: ../edit_adopt.php?success');

}
?>
