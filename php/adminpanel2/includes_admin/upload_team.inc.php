<?php
require_once 'dbh.inc.php';

if(isset($_POST['upload_team'])) {

    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $position =mysqli_real_escape_string($conn, $_POST['position']);
    $description =mysqli_real_escape_string($conn, $_POST['desc'])	;
    
    $sql = "INSERT INTO team (name,position,description )
    VALUES ('$name','$position','$description')";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_team.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
   
?>

