<?php
require_once 'dbh.inc.php';
      
if(isset($_POST['upload_product'])) {

    $name =mysqli_real_escape_string($conn,$_POST['name']);
    $desc =mysqli_real_escape_string($conn,$_POST['desc']);
    $price =mysqli_real_escape_string($conn,$_POST['price']);
    $type =mysqli_real_escape_string($conn,$_POST['type']);
    $condition =mysqli_real_escape_string($conn,$_POST['condition']);
    $quantity =mysqli_real_escape_string($conn,$_POST['quantity']);
    
    $sql = "INSERT INTO eshop (name, price, quantityy, description, conditionn, product_type)
    VALUES ('$name',$price,$quantity,'$desc','$condition', '$type')";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_eshop.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
   
?>
