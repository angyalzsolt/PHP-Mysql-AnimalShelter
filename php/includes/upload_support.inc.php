<?php 
if(isset($_POST['support_cat'])) {
  $support_name = mysqli_real_escape_string($conn,$_POST['support_name']);
  $support_email = mysqli_real_escape_string($conn,$_POST['support_email']);
  $support_zip = mysqli_real_escape_string($conn,$_POST['support_zip']);
  $support_city = mysqli_real_escape_string($conn,$_POST['support_city']);
  $support_street = mysqli_real_escape_string($conn,$_POST['support_street']);
  $support_tel = mysqli_real_escape_string($conn,$_POST['support_tel']);
  $fk_cat_id = $_POST['cat_id'];

  $sql = "INSERT INTO supporter (name, email, zip, city, street, tel, fk_cat_id, verify)
  VALUES ('$support_name','$support_email','$support_zip','$support_city','$support_street','$support_tel','$fk_cat_id',2)";
  if (mysqli_query($conn, $sql)) {
   echo "<div class='alert alert-success mt-6' role='alert'>
          Support request has been sent successfully.
        </div>";
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}

if(isset($_POST['support_dog'])) {
  $support_name = mysqli_real_escape_string($conn,$_POST['support_name']);
  $support_email = mysqli_real_escape_string($conn,$_POST['support_email']);
  $support_zip = mysqli_real_escape_string($conn,$_POST['support_zip']);
  $support_city = mysqli_real_escape_string($conn,$_POST['support_city']);
  $support_street = mysqli_real_escape_string($conn,$_POST['support_street']);
  $support_tel = mysqli_real_escape_string($conn,$_POST['support_tel']);
  $fk_dog_id = $_POST['dog_id'];

  $sql = "INSERT INTO supporter (name, email, zip, city, street, tel, fk_dog_id, verify)
  VALUES ('$support_name','$support_email','$support_zip','$support_city','$support_street','$support_tel','$fk_dog_id',2)";
  if (mysqli_query($conn, $sql)) {
    echo "<br><br><br><br><div class='mt-4 alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Thank you, your support request has been sent successfully! We will contact you soon.</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
 ?>