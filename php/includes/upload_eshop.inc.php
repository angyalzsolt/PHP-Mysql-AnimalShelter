<?php 

if(isset($_POST['buy_eshop'])) {
  $buy_name = mysqli_real_escape_string($conn,$_POST['buy_name']);
  $buy_email = mysqli_real_escape_string($conn,$_POST['buy_email']);
  $buy_address = mysqli_real_escape_string($conn,$_POST['buy_address']);
  $buy_comment = mysqli_real_escape_string($conn,$_POST['buy_comment']);
  $buy_tel = mysqli_real_escape_string($conn,$_POST['buy_tel']);
  $fk_buy_id = $_POST['buy_id'];

  $sql = "INSERT INTO eshop_customer (full_name, email, address, telephone, fk_eshop_id, comment, status)
  VALUES ('$buy_name','$buy_email','$buy_address','$buy_tel','$fk_buy_id','$buy_comment', 'waiting')";
  if (mysqli_query($conn, $sql)) {
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
if(isset ($_GET['id']) ){
    $pid= $_GET['id'];
  }
 ?>