<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/output_reports.inc.php");

 ?>
<link rel="stylesheet" type="text/css" href="../css/reports.css">
<link rel="stylesheet" type="text/css" href="../css/dogs_cats.css">
<div class="break">
    
</div>
<div class="container">
  <div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-weight-bold">Reports</h1>
       </div>
  </div>
<?php
$i=0;$j=10;
foreach($data as $row2) { 
?>
  <div class="row">
      <div class="card col-md-12 p-3 mb-4">
        <div class="row">
          <div class="col-md-8 mb-3">
            <div class="card-block">
              <h6 class="card-title"><?php echo $row2['name'] ?></h6>
              <p class="card-text text-justify text str"><?php echo $row2['description']; ?> <br> <br>
              <?php 

               $date = strtotime($row2['reports_date']);
               echo $new_date = date('d. m. Y.', $date); ?></p>
              <a href="reports.php"><button class="btn warningg" >Back</button>  </a>
              
            </div>
          </div>
          <div class="col-md-4">
            <img class="w-100 imag" src="../image_upload/reports_image/<?php echo $row2['main_image'] ?>" onerror="this.src = '../img/no-image.jpg';">
          </div>
          <div class="col-md-12">
            <hr class="my-4">
            <div id="images" class="container">
        <div class="row mx-2">
           <div class="col-3 my-2">
              <img class="gallery_image" id="myImg<?php echo $j; ?>" onClick="reply_click(this.id)" width="100%" height="200" style="object-fit: cover;" src="../image_upload/reports_image/<?php echo $row2["main_image"]; ?>" alt="">
            </div>
            <?php foreach($row2["images"] as $image){ ?>
            <div class="col-3 my-2">
              <img class="gallery_image" id="myImg<?php echo $i; ?>" onClick="reply_click(this.id)" width="100%" height="200" style="object-fit: cover;" src="../image_upload/reports_image/<?php echo $image; ?>" alt="">
            </div>
           <?php $i++;$j++; }; ?>
         </div>
      </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      
    </div>
<?php  
 }; 
?>

 </div>
    <div id="mypicture" class="picture">
      <span id="close" class="close" style="color: white;">&times;</span>
      <img class="picture-content"  src="#">
    <div id="caption"></div> 
        <a class="prev" onclick="prevImg()">&#10094;</a>
        <a class="next" onclick="nextImg()">&#10095;</a>
     </div><!--row ends--> 
</div><!--container ends--> 
<div class="break">
</div>
<script>
//  the picture container
var picBlock = document.getElementById("mypicture");
//the picture itself
var bigPic = document.getElementsByClassName('picture-content');

// empty array for the smallimages src
var srcList = [];
function getImgSrc(x){
  //find all img element from the modal
  let y = document.getElementById(x).getElementsByTagName("IMG");
  //push all img src in an array
  for(let h=0; h < y.length; h++){
    if(y[h].src.includes('REPORT')){
      srcList.push(y[h].src);
    } 
  }
}

function nextImg(){
  let currentImg = bigPic[0].src;
  let currentIndex = srcList.indexOf(currentImg);
  if(currentIndex + 1 == srcList.length){
    bigPic[0].src = srcList[0];
  } else {
    bigPic[0].src = srcList[currentIndex+1];
  }
}

function prevImg(){

  let currentImg = bigPic[0].src;
  let currentIndex = srcList.indexOf(currentImg);
  if(currentIndex  == 0){
    bigPic[0].src = srcList[srcList.length-1];
  } else {
    bigPic[0].src = srcList[currentIndex-1];
  }
}

function delSrcList(){
  srcList = [];
}


function reply_click(x){
  var pictureSrc = $('#'+x).attr('src');
  var picId = '#'+x;
  bigPic[0].src = pictureSrc;
  picBlock.style.display='block';
  getImgSrc('images');
}

$("#close").click(function(){
    picBlock.style.display = "none";
    bigPic[0].src = "";
    delSrcList();
});
</script>
<?php include("includes/footer.inc.php"); ?>