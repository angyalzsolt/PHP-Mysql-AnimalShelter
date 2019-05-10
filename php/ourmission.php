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
			<h1 class="display-4 font-weight-bold"> <?php echo ucfirst(mb_strtolower($languages[$x]["OUR_MISSION"])) ?></h1>
		</div>
	</div>

	<div class="row mb-4">
		<div class=" col-12 "><br>
			 <?php 
 $sql ="SELECT * FROM mission";
$Rows = mysqli_query($conn, $sql);
$Result = $Rows->fetch_all(MYSQLI_ASSOC);
 $i=1;
 foreach($Result as $row)  {
    if($i%2==0){
         ?>
			<h2 class="text-right"><?php echo $row['mission_title'] ?></h2>
			<div class="row1" >			
				<p><img src="../img/header-bg.jpg" alt="dog">
					<?php
					$msg = $row['mission_text'];

					$msg = str_replace("\n", "<br>", $msg);

					echo $msg; 
					?>
				</p>
			</div><br>
			<?php
    }else{ ?><br>
    	<h2><?php echo $row['mission_title'] ?></h2>
			<div class="row2 pb-4" >
				<p>	<img src="../img/photo-1509628061459-1328d06c2ced.jpg" alt="dog">
					<?php
					$msg = $row['mission_text'];

					$msg = str_replace("\n", "<br>", $msg);

					echo $msg; 
					?>
				</p>		
			</div><br>
			<?php  
    }
    $i++; }; 
    ?>
		</div>
	</div>
</div>
<div class="break">
	
</div>
<?php 
include("includes/footer.inc.php")
?>