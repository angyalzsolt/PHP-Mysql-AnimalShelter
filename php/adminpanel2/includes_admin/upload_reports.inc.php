<?php
require_once 'dbh.inc.php';

if(isset($_POST['upload_report'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description =mysqli_real_escape_string($conn, $_POST['desc']);
    $reports_date =$_POST['reports_date'];
    $keywords =mysqli_real_escape_string($conn, $_POST['keywords']);
    
    $sql = "INSERT INTO reports (name, reports_descriptions, reports_date, keywords )
    VALUES ('$title','$description','$reports_date','$keywords')";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_reports.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
   
?>
