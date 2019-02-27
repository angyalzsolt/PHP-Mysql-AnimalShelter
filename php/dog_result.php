<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");

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
  if(isset($_GET['ageselect'])){
  $date = intval($_GET['age'])  ;
  $sql = "SELECT * FROM dog 
          LEFT JOIN main_image_dog ON main_image_dog.fk_dog_id = dog.dog_id 
          LEFT JOIN adaption ON dog.dog_id = adaption.fk_dog_id
          WHERE YEAR(born_date) = $date AND adaption.fk_dog_id IS NULL AND dog.in_memoriam = 1;";
$result = mysqli_query($conn, $sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  foreach ($rows as $row ) {
          echo $row['dog_name'];
        }      
} ?>

      
    <?php
  if (count($rows)>0) {   
 foreach($rows as $row) {   ?>
 
      <div class="card col-md-12 p-3 mx-4 mb-4">
        <div class="row">
          <div class="col-md-8 mb-3">
            <div class="card-block">
              <h1 class="card-title"><b><?php echo $row['dog_name'] ?></b></h1>
              <p class="card-text text-justify text str"><b>Type: </b><?php echo $row['type'] ?></p>
              <p class="card-text text-justify text str"><b>Born: </b><?php $date = strtotime($row["born_date"]);
               echo $new_date = date('d. m. Y.', $date); ?></p>
              <p class="card-text text-justify text str"><b>Description: </b><?php echo $row['dog_desc'] ?></p>
            </div>
          </div>
           <div class="col-md-4"> <a href="<?php echo $animal ?>s.php">
            <img class="w-100 imag" src="../image_upload/<?php  echo $row['main_image_dog']?>" onerror="this.src = '../img/no-image.jpg';"></a>
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