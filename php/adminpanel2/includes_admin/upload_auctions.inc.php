<?php
require_once 'dbh.inc.php';
if(isset($_POST['upload_product'])) {

    $name =mysqli_real_escape_string($conn,$_POST['name']);
    $desc =mysqli_real_escape_string($conn,$_POST['desc']);
    $price =mysqli_real_escape_string($conn,$_POST['price']);
    $edate =mysqli_real_escape_string($conn,$_POST['edate']);
    $condition =mysqli_real_escape_string($conn,$_POST['condition']);
    
    $sql = "INSERT INTO auction_product (name, price, end_date, descr, conditionn, valid)
    VALUES ('$name','$price','$edate','$desc','$condition', 0)";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_auctions.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}

   
?>
