<?php 
require_once 'dbh.inc.php';

if(isset($_POST['make_bid'])) {
    $product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
    $nname = mysqli_real_escape_string($conn,$_POST['nname']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $bid = mysqli_real_escape_string($conn,$_POST['bid']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $tel = mysqli_real_escape_string($conn,$_POST['tel']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $sql = "INSERT INTO auction_bid (nick_name,full_name,bid_price,email,address,telephone,comment,fk_auction_product_id )
    VALUES ('$nname','$fname','$bid','$email','$address','$tel','$comment','$product_id')";
    if (mysqli_query($conn, $sql)) {
   header("Location: ../auction.php?success");
 } else {
   header("Location: ../auction_form.php?id=".$product_id."&error");;
 }
}
 ?>