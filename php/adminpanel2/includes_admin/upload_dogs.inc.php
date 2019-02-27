<?php 
include("dbh.inc.php");
if(isset($_POST['upload_dog_table'])) {
  $dog_name = mysqli_real_escape_string($conn, $_POST['dog_name']);
  $type =  mysqli_real_escape_string($conn, $_POST['type']);
  $desc = mysqli_real_escape_string($conn, $_POST['desc']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $dog_id_old = $_POST['dog_id_old'];
  $castration = $_POST['castration'];
  $born_date = $_POST['born_date'];
  $gender = $_POST['gender'];

  $sql = "INSERT INTO dog (dog_name,born_date,castration,height,weight,dog_desc,type,gender,in_memoriam,dog_id_old)
  VALUES ('$dog_name', '$born_date', '$castration', '$height', '$weight','$desc','$type','$gender',1,'$dog_id_old')
  ";
  if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_dog.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }

}


 ?>