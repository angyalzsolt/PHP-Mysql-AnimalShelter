<?php 
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");


$sql2 = "SELECT DISTINCT YEAR(born_date) FROM dog
     LEFT JOIN main_image_dog ON dog.dog_id = main_image_dog.fk_dog_id 
     LEFT JOIN image_dog ON dog.dog_id = image_dog.fk_dog_id 
     LEFT JOIN adaption ON dog.dog_id = adaption.fk_dog_id
     WHERE adaption.fk_dog_id IS NULL AND dog.in_memoriam = 1
     UNION
     SELECT DISTINCT YEAR(born_date) FROM cat
     LEFT JOIN main_image_cat ON cat.cat_id = main_image_cat.fk_cat_id 
     LEFT JOIN image_cat ON cat.cat_id = image_cat.fk_cat_id 
     LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
     WHERE adaption.fk_cat_id IS NULL AND cat.in_memoriam = 1
     ORDER BY `YEAR(born_date)`  DESC
     ";
    $result = mysqli_query($conn, $sql2);
    $rows2 = $result->fetch_all(MYSQLI_ASSOC);
 ?>
<link rel="stylesheet" type="text/css" href="../css/search.css">
<link rel="stylesheet" type="text/css" href="../css/dogs_cats.css">
<style>
  .col-4, .col-3{
    text-align: center;
  }
  select {
    width: 50%;
  }
  #noresult {
    font-size: 40px;
    margin: auto;
  }

</style>
<div class="break">
    
</div>
<div class="container">

  <div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
     <div class="col-md-6 px-0">
       <h1 class="display-4 font-weight-bold">Search for a specified pet?</h1>
      </div>
    </div>

  <div class="row">

    <div class="col-4">
      <h5>Select type of pet</h5>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary" name="type" value="all">All</button>
        <button type="button" class="btn btn-primary" name="type" value="dog">Dog</button>
        <button type="button" class="btn btn-primary" name="type" value="cat">Cat</button>
      </div>
    </div>

    <div class="col-4">
      <h5>Select gender</h5>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary" name="gender" value="all">All</button>
        <button type="button" class="btn btn-primary" name="gender" value="female">Female</button>
        <button type="button" class="btn btn-primary" name="gender" value="male">Male</button>
       </div> 
    </div>

    <div class="col-4">
      <h5>Castration</h5>
      <div class="btn-group" role="group">
        <button class="btn btn-primary" name="castration" value="all">All</button>
        <button class="btn btn-primary" name="castration" value="yes">Yes</button>
        <button class="btn btn-primary" name="castration" value="no">No</button>
      </div> 
    </div>

  </div>

  <div class="row">

    <div class="col-3 offset-2">
      <h5>Age</h5>
      <select class="form-control" name="age" id="age">
        <option value="all">Select</option>
          <?php
          $thisYear = date("Y");
           foreach ($rows2 as $row) {
              echo ' <option value="'.$row["YEAR(born_date)"].'">'.($thisYear - $row["YEAR(born_date)"]).' years old</option>';
            };
           ?>
      </select>
    </div>

    <div class="col-3 offset-2">
      <h5>Name</h5>
      <input type="email" class="form-control" id="name" placeholder="Who are you looking for?">    
    </div>

  </div> 

  <div class="break"></div> 

  <div class="row" id="target"></div>

</div>
<div class="break">
    
</div>
<div id="mypicture" class="picture">
      <span id="close" class="close" style="color: white;">&times;</span>
      <img class="picture-content" src="#">
<!--     <div id="caption"></div> 
        <a class="prev" onclick="prevImg()">&#10094;</a>
        <a class="next" onclick="nextImg()">&#10095;</a>
     </div> -->
<script type="text/javascript" src="../js/search (1).js"></script>
<script type="text/javascript" src="../js/images.js"></script>




<?php
include("includes/footer.inc.php");
  ?>
