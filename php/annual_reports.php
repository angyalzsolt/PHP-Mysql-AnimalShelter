<?php
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
$sql= "SELECT * FROM annual_report ORDER BY report_date DESC";
$result = mysqli_query($conn,$sql);
$newarray = $result->fetch_all(MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../css/reports.css">

<link rel="stylesheet" type="text/css" href="../css/gallery.css">
<div class="break">
</div>
<div class="container">
	<div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
		<div class="col-md-6 px-0">
			<h1 class="display-4 font-weight-bold"><?php echo ucfirst(mb_strtolower($languages[$x]["REPORTS"])) ?></h1><br>
			<a class="btn btn-primary btn-lg" href="reports.php" role="button"><?php echo $languages[$x]["back_to_all"] ?></a>
		</div>
	</div>
</div>
<div id='main' class='container containerr mt-0 pb-5 pt-5'>
	<div class="row">
		<div class="col-md-12 mb-4">
			<h1 class='text-center'><?php echo $languages[$x]["annual_reports"] ?></h1>
		</div>
		<?php foreach ($newarray as $key) {  echo "<div class='col-md-12'><h4 class='text-center'><a class='text-success'href='../pdf_upload/".$key['annual_report']."'target='_blank'>".$key['annual_report_name']." - ".$key['report_date']."</a></h4></div>" ; } ?>
	</div>
</div>
<?php include("includes/footer.inc.php"); ?>
