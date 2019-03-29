<?php  
include_once "dbh.inc.php";
if (isset($_GET['success'])) {
//   echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//   <strong>Verificated successfully!</strong>
//   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//     <span aria-hidden='true'>&times;</span>
//   </button>
// </div>";
      }

if(isset($_POST['verify'])) {
  $adoption_id = $_POST['sup_id'];

  $sql = "UPDATE adaption SET verify = 1 
  			WHERE adoption_id='$adoption_id'";
  if (mysqli_query($conn, $sql)) {
  header ("Location:verify_adopter.php?success");
   
 } else {
   echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
 }
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM adaption WHERE adoption_id=$id");
	$_SESSION['message'] = '<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                    User deleted!
                    </div>
                </div>
            </div>  
        </div>'; 
	header('location: verify_adopter.php');
}
?>