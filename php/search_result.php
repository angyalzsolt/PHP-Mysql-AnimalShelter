<?php 
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");
// include("includes/output_search.inc.php");
 ?>
<link rel="stylesheet" type="text/css" href="../css/search.css">
<div class="break">  
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-weight-bold">Search Results</h1>
        </div>
      </div>
    </div>
  </div>
 
<?php
  if(isset ($_GET['search']) ){
    $animal = $_GET['animal'];
    $gender = $_GET['gender'];
    $date = $_GET['date'];
    $castr = $_GET['castr'];
  }
  $sql = "SELECT * FROM $animal LEFT JOIN main_image_$animal ON $animal.".$animal."_id = main_image_$animal.fk_".$animal."_id
          WHERE gender = '$gender'
          AND born_date > '$date'
          AND castration = '$castr'";
          
          $result = mysqli_query($conn, $sql);
          $rows = $result->fetch_all(MYSQLI_ASSOC); 
          ; ?>

  <div class="row pt-4"> <div class="col-12">
    <h2 class="text-center mb-4"><?php echo $animal." - ".$gender." - born after: ".$date." - castration: ".$castr; ?></h2>
  </div>        
    <?php
          if (count($rows)>1) {   
 foreach($rows as $row) {   ?>
 
      <div class="card col-md-12 p-3 mx-4 mb-4">
        <div class="row">
          <div class="col-md-8 mb-3">
            <div class="card-block">
              <h1 class="card-title"><b><?php echo $row[''.$animal.'_name'] ?></b></h1>
              <p class="card-text text-justify text str"><b><?php echo $languages[$x]["breed"] ?>: </b><?php echo $row['type'] ?></p>
              <p class="card-text text-justify text str"><b><?php echo $languages[$x]["born"] ?>: </b><?php $date = strtotime($row["born_date"]);
               echo $new_date = date('d. m. Y.', $date); ?></p>
              <p class="card-text text-justify text str"><b><?php echo $languages[$x]["description"] ?>: </b><?php echo $row[''.$animal.'_desc'] ?></p>
            </div>
          </div>
           <div class="col-md-4"> <a href="<?php echo $animal ?>s.php">
            <img class="w-100 imag" src="../image_upload/<?php  echo $animal == 'dog' ? $row['main_image_'.$animal.''] : $row['main_image']  ?>" onerror="this.src = '../img/no-image.jpg';"></a>
          </div>
        </div>
      </div>
    
<?php  
 }} else {?>
   <div class="col-12 text-center"><div class="break">  
</div>
      <h3>No result.</h3>
    </div> 
<?php }; ?>
</div>
</div>
<div class="break">  
</div></div>
<?php
include("includes/footer.inc.php");
  ?>