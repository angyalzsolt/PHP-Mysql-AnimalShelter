<?php  
include_once "dbh.inc.php";
if (isset($_SESSION['message2'])){?>
<!--     <div class='alert alert-success mt-6' role='alert'>
         Verificated successfully.
    </div>"; -->
  <?php 
  unset($_SESSION['message2']);
} 
if(isset($_POST['verify'])) {
  $supporter_id = $_POST['sup_id'];

  $sql = "UPDATE supporter SET verify = 1 
  			WHERE supporter_id='$supporter_id'";
  if (mysqli_query($conn, $sql)) {
    header ("Location:verify_supporter.php?success");
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM supporter WHERE supporter_id=$id");
	$_SESSION['message2'] = '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    Supporter deleted!
                    </div>
                </div>
            </div>  
        </div>';
	header('location: verify_supporter.php');
}
?>
