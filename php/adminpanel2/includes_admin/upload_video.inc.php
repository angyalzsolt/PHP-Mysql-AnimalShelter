<?php
require_once 'dbh.inc.php';

if(isset($_POST['upload_video'])) {

    $title =mysqli_real_escape_string($conn, $_POST['title']);
    $url =mysqli_real_escape_string($conn, $_POST['url']);
    
    $sql = "INSERT INTO videos (title,url)
    VALUES ('$title','$url')";
    if (mysqli_query($conn, $sql)) {
   
   header("Location: ../upload_video.php?success");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
   
?>

