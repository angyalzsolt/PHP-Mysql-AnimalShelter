<?php 
include("includes_admin/dbh.inc.php");
include("includes_admin/upload_verify_supporter.inc.php");

include("includes_admin/navbar.inc.php");
include("includes_admin/output_verify_supporter.inc.php");
if (isset($_SESSION['userUid']))
            { 
?>
<body id="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php  
				if (isset($_GET['success'])) {
					  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>Uploaded successfully!</strong>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
					      } 
      			?>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#ID</th>
							<th scope="col"><?php echo $languages[$x]["req_date"] ?></th>
							<th scope="col"><?php echo $languages[$x]["up_name"] ?></th>
							<th scope="col">Telephone</th>
							<th scope="col">E-mail</th>
							<th scope="col"><?php echo $languages[$x]["city"] ?></th>
							<th scope="col"><?php echo $languages[$x]["supdog"] ?></th>
							<th scope="col"><?php echo $languages[$x]["supcat"] ?></th>
							<th scope="col"><?php echo $languages[$x]["verify"] ?></th>
							<th scope="col"><?php echo $languages[$x]["up_del_btn"] ?></th>
						</tr>
						</thead><?php foreach($rows as $row) { ?>
							<tbody>
								<tr>
									<th scope="row"><?php echo $row['supporter_id'];?></th>
									<td><?php echo $row['req_date'] ?></td>
									<td><?php echo $row['name'] ?></td>
									<td><?php echo $row['tel'] ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['city'] ?></td>
									<td><?php echo $row['dog_name'] ?></td>
									<td><?php echo $row['cat_name'] ?></td>
									<td>
									<form method="POST">
										<div class="form-group">
											<input  type="hidden" class="form-control" name="sup_id" value="<?php echo $row["supporter_id"];?>">
										</div>
										<input class="btn btn-success" type="submit" value="<?php echo $languages[$x]["allow"] ?>" name="verify"/>
									</form>
								</td>
								<?php echo 
								'<td>
									<a href="verify_supporter.php?del='.$row['supporter_id'].'" class="btn btn-danger mt-3">'.$languages[$x]["up_del_btn"].'</a>
								</td>' 
								?>
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
<?php } include("includes_admin/footer.inc.php"); ?>

