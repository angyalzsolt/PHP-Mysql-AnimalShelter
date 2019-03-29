<?php 
	include_once "dbh.inc.php";
	
	// initialize variables
	$name = "";
	$email = "";
	$admin = "";

if (isset($_POST['update'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$admin = mysqli_real_escape_string($conn, $_POST['admin']);
	$id = $_POST['id'];
	mysqli_query($conn, "UPDATE users SET users_name='$name', users_email='$email' , users_role='$admin' WHERE users_id='$id'");
	$_SESSION['message'] = "User updated!"; 
	header('location: ../edit_users.php?success');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM users WHERE users_id=$id");
	//$_SESSION['message'] = "User deleted!"; 
// 		echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//   <strong>".$languages[$x]["success"]."</strong>
//   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//     <span aria-hidden='true'>&times;</span>
//   </button>
// </div>";
}

// if(isset($_GET['success'])){
// 	echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//   <strong>".$languages[$x]["up_success"]."</strong>
//   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//     <span aria-hidden='true'>&times;</span>
//   </button>
// </div>";
// }
	
?>