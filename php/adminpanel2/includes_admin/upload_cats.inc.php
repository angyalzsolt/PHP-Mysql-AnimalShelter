<?php 
include("dbh.inc.php");
if (isset($_GET['success'])) {
//   echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//   <strong>Uploaded successfully!</strong>
//   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//     <span aria-hidden='true'>&times;</span>
//   </button>
// </div>";
      }
if(isset($_POST['upload_cat_table'])) {
  $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
  $type = mysqli_real_escape_string($conn, $_POST['type']);
  $desc = mysqli_real_escape_string($conn, $_POST['desc']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $castration = $_POST['castration'];
  $cat_id_old = $_POST['cat_id_old'];
  $born_date =$_POST['born_date'];
  $gender = $_POST['gender'];

  $sql = "INSERT INTO cat (cat_name,born_date,castration,height,weight,cat_desc,type,gender,in_memoriam,cat_id_old)
  VALUES ('$cat_name', '$born_date', '$castration', '$height', '$weight','$desc','$type','$gender',1,'$cat_id_old')
  ";
  if (mysqli_query($conn, $sql)) {
   header("Location: ../image_upload_cat.php");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
 ?>