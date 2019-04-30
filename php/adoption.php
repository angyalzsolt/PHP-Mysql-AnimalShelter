<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/output_reports.inc.php");
 ?>
<link rel="stylesheet" type="text/css" href="../css/adoption.css">
<div class="container">
<div class="break">
</div>
      <div class="jumbotron backg1 p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-weight-bold"><?php echo $languages[$x]["adopt_title"] ?></h1>
          <p class="lead my-3"><?php echo $languages[$x]["adopt_subtitle1"] ?></p>
          <p class="lead mb-0"><?php echo $languages[$x]["our_advice"] ?></p>
        </div>
      </div>
      <div class="row">
                <?php 
 $sql ="SELECT * FROM how_adopt";
$Rows = mysqli_query($conn, $sql);
$Result = $Rows->fetch_all(MYSQLI_ASSOC);
 foreach($Result as $row) {
         ?>
        <div class="col-md-12">
          <h1 class="display-4 pb-4"><?php echo $row['adopt_title'] ?></h1>
          <p class="lead my-3"><?php echo $row['adopt_text'] ?></p>
        </div><?php } ?>
      </div>
</div>
<div class="break">
</div>
<?php include("includes/footer.inc.php"); ?>