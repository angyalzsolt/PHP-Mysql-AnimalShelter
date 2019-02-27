<?php 
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../css/ourmission.css">
<div class="break">
	
</div>
<div class="container">
	<div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
		<div class="col-md-6 px-0">
			<h1 class="display-4 font-weight-bold">Videos</h1>
		</div>
	</div>
	<div class="row mb-4">
		
			 <?php 
 $sql ="SELECT * FROM videos";
$rows = mysqli_query($conn, $sql);
$result = $rows->fetch_all(MYSQLI_ASSOC);
 
 foreach($result as $row)  {
         ?><div class=" col-12 "><br>
			<h2 ><?php echo $row['title'] ?></h2>
		<iframe width="840" height="630" src="https://www.youtube.com/embed/<?php echo $row['url'] ?>" frameborder="0" allowfullscreen></iframe>
</div>
			<?php  
    }; 
    ?>
		
	</div>
</div>
<div class="break">
	
</div>
<?php 
include("includes/footer.inc.php")
?>