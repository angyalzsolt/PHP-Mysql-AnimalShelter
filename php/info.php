<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../css/ourmission.css">
<div class="break">
</div>
<div class="container">
	<div class="jumbotron backg3 p-3 p-md-5 text-white rounded">
		<div class="col-md-6 px-0">
			<h1 class="display-4 font-weight-bold"><?php echo ucfirst(mb_strtolower($languages[$x]["IMPORTANT_INFO"])) ?></h1>
		</div>
	</div>
<div class="row mb-4">
		<br>
			 <?php 
 $sql ="SELECT * FROM info";
$Rows = mysqli_query($conn, $sql);
$Result = $Rows->fetch_all(MYSQLI_ASSOC);
 foreach($Result as $row)  {
?><div class=" col-md-12">
			<h2 class="text-center m-4"><?php echo $row['info_title'] ?></h2>
				<p class="text-left p-0">
					<?php
					$msg = $row['info_text'];

					$msg = str_replace("\n", "<br>", $msg);

					echo $msg; 
					?>
				</p>
				<p class="font-italic text-center"><?php echo $row['info_date'] ?></p>
			<br></div>
			<br> <?php }; ?>
		</div>
	</div>
<div class="break">
</div>
<?php 
include("includes/footer.inc.php")
?>