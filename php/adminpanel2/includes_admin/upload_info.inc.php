<?php
require_once 'dbh.inc.php';

if(isset($_POST['upload_info'])) {

    $title =mysqli_real_escape_string($conn, $_POST['title']);
    $text =mysqli_real_escape_string($conn, $_POST['text'])	;
    
    $sql = "INSERT INTO info (info_title,info_text )
    VALUES ('$title','$text')";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../upload_info.php?success");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
   
?>

