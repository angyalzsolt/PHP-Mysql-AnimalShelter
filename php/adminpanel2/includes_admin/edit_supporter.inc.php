<?php 
include_once "dbh.inc.php";

if(isset($_POST['edit_support'])) {
$support_id = $_POST['edit_support'];
$title =  mysqli_real_escape_string($conn,$_POST['title']);
$text =  mysqli_real_escape_string($conn,$_POST['text']);

mysqli_query($conn, "UPDATE `how_support` SET `support_title` = '$title', `support_text` = '$text' WHERE how_support_id=$support_id");
header('location: ../edit_support.php?success');

}
?>
