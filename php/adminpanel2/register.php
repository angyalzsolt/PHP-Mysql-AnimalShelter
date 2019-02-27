<?php
include "includes_admin/navbar.inc.php"; 
if (isset($_SESSION['userUid']))
            {   

if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
		  <strong>Uploaded successfully!</strong>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button>
		</div>";
      } 
if (isset($_GET['error'])) {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		  <strong>Please check if every field is given, or valid!</strong>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button>
		</div>";
      }?>
      <link rel="stylesheet" type="text/css" href="../../css/admin.css">
      <div class="break">
      	
      </div>
<main class="login_main upload_form">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-2">
				
			
			<h1>Add new User</h1>
			<br>
			<form action="includes_admin/signup.inc.php" method="post">
				<input class="form-control" type="text" name="uid" placeholder="Username">
				<br>
				<input class="form-control" type="text" name="mail" placeholder="E-Mail">
				<br>
				<input class="form-control" type="password" name="pwd" placeholder="Password">
				<br>
				<input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat Password">
				<br>
				<button class="btn btn-info" type="submit" name="signup-submit">Add</button>
			</form>
		</div>
		</div>
	</div>
</main>
<?php }
include "includes_admin/footer.inc.php"; ?>