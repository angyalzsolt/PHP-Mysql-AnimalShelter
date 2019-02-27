<?php 
	include_once "dbh.inc.php";
	
	if(isset($_POST['edit_mission'])) {
  $mission_id = $_POST['edit_mission'];
$title = mysqli_real_escape_string($conn,$_POST['title']);
$text = mysqli_real_escape_string($conn,$_POST['text']);
  $sql = "UPDATE `mission` SET `mission_title` = '$title', `mission_text` = '$text' WHERE mission_id=$mission_id";

  if (mysqli_query($conn, $sql)) {
   header('location: ../edit_mission.php?success');
 } else {
   echo "Edit error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
?>