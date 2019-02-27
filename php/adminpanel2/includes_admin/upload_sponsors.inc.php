<?php
require_once 'dbh.inc.php';

if(isset($_POST['upload_sponsors'])) {

    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $address =mysqli_real_escape_string($conn, $_POST['address']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "INSERT INTO sponsors (sponsors_name, sponsors_address, sponsors_email )
    VALUES ('$name','$address','$email')";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_sponsors.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
   
?>