<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/output_in_memoriam.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../css/dogs_cats.css">
<style>
  #filtering {
    display: none;
  }
</style>
<div class="break">
</div>
<div class="container">
 
	<div class="row">
		<div class="col-10 offset-1">
			<h1><?php echo $languages[$x]["inmemoriam_title"] ?></h1>
      <p><i><?php echo $languages[$x]["inmemoriam_subtitle"] ?></i></p>
			<hr>
		</div>   
		<div class="col-10 offset-1">
			<div class="row">
				<?php  $i=0; $j=10;
        foreach($data as $row){  ?>
				<div class="part_divs col-md-3 offset-md-1 col-sm-5 offset-sm-2 mb-4 mt-2">
					<div class="small_parts">
						<img class="imag" src="../image_upload/<?php echo $row["main_image"]; ?>" onerror="this.src = '../img/no-image.jpg';" alt="">
						<div class="buttons_div">
							<button class="btn btn-success mb-2 btn-block buttons"  data-backdrop="static" data-keyboard="false" onclick="getImgSrc('moreModal'+<?php echo $row["dog_id"];?>)"  type="button" data-toggle="modal" data-target="#moreModal<?php
                echo $row["dog_id"];?>"><?php echo $languages[$x]["more"] ?></button>
						</div>
					</div>
				</div>
				<!----MoreMOdal--->
        <div class="modal fade" id="moreModal<?php echo $row["dog_id"];?>" tabindex="-1" role="dialog" aria-labelledby="moreModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="moreModalLabel"><?php echo $row["dog_name"]; ?></h5>
                <button type="button" onclick="delSrcList()" class="close" data-dismiss="modal" aria-label="Close">
                  <span  aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="mb-0"><b><?php echo $languages[$x]["name"] ?>:</b> <?php echo $row["dog_name"]; ?> <br></p>
                <p class="mb-0"><b><?php echo $languages[$x]["gender"] ?>:</b> <?php echo $row["gender"]; ?> <br></p>
                <p class="mb-0"><b><?php echo $languages[$x]["breed"] ?>:</b> <?php echo $row["type"]; ?> <br></p>
                <p class="mb-0"><b><?php echo $languages[$x]["born"] ?>:</b> <?php $date = strtotime($row["born_date"]);
               echo $new_date = date('d. m. Y', $date); ?> <br></p>
                <p class="mb-0"><b><?php echo $languages[$x]["height"] ?>:</b> <?php echo $row["height"]; ?> <br></p>
                <p class="mb-0"><b><?php echo $languages[$x]["weight"] ?>:</b> <?php echo $row["weight"]; ?> <br></p>
                <p class="pb-3"><b><?php echo $languages[$x]["castration"] ?>:</b> <?php echo $row["castration"]; ?> <br></p>
                <p><b><?php echo $languages[$x]["description"] ?>:</b> <?php echo $row["dog_desc"]; ?> <br></p>
              </div>
              <div class="container">
                <div class="row mx-2">
                  <div class="col-2 my-2">
                    <img class="gallery_image" id="myImg<?php echo $j; ?>" onClick="reply_click(this.id)" width="100%" height="90" style="object-fit: cover;" src="../image_upload/<?php echo $row["main_image"]; ?>" alt="">
                  </div>
                  <?php foreach($row["images"] as $image){ ?>
                   <div class="col-2 my-2">
                    <img class="gallery_image" id="myImg<?php echo $i; ?>" onClick="reply_click(this.id)" width="100%" height="90" style="object-fit: cover;" src="../image_upload/<?php echo $image; ?>" alt="">
                  </div>
                <?php $i++; $j++;}; ?>
                </div>
            </div>
              <div class="modal-footer">
                <button type="button" onclick="delSrcList()" class="btn btn-secondary" data-dismiss="modal"><?php echo $languages[$x]["close"] ?></button>
              </div>
            </div>
          </div>
        </div>
			<?php }; ?>
			 		</div> 
			</div><!--inside row ends-->
		</div><!--col-10 ends-->
     <div class="col-10 offset-2 m-4 pl-4">
        <button type="button" id="display" class="btn btn-success" >Filter</button>
        <script>
            $("#display").click(function () {
                $("#filtering").css("display", "block");
            });
        </script>
        
</div>
    <div id="filtering" class="col-10 offset-1">
      <hr>
      <h4>Filter by name</h4>
      <?php 
      for($i=ord('A'); $i<ord('Z'); $i++){
      ?>
       <a href="in_memoriam.php?char=<?php echo chr($i) ?>" class="mb-1 btn btn-warning"><?php echo chr($i) ?></a>
     <?php }; ?>
       <h4 class="mt-4">Filter by date of born</h4>
       <form action="" method="get" >
         <div class="form-group">
          <label >Select Month</label>
          <select name="fmonth" class="form-control" >
            <?php 
              for($i=1; $i<13; $i++){
             ?>
            <option value="<?php echo $i<10? '0'.$i : $i ?>"><?php echo $i ?></option>
            <?php }; ?>
          </select>
        </div>
        <div class="form-group">
          <label >Select Year</label>
          <select name="fyear" class="form-control" >
            <?php 
              for($i=2000; $i<2020; $i++){
             ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
          <?php }; ?>
          </select>
        </div>
        <input class="btn btn-warning" type="submit" value="Filter" name="filter_date" />
       </form><br> 
       <a href="in_memoriam.php?nochar" class="mb-1 btn btn-warning">No filter</a>
    </div>
<div id="mypicture" class="picture">
      <span id="close" class="close" style="color: white;">&times;</span>
      <img class="picture-content" src="#">
    <div id="caption"></div> 
        <a class="prev" onclick="prevImg()">&#10094;</a>
        <a class="next" onclick="nextImg()">&#10095;</a>
     <!--row ends--> 
</div>    <!--row ends--> 
</div><!--container ends--> 
<div class="break">
</div>
<script>
var picBlock = document.getElementById("mypicture");
var bigPic = document.getElementsByClassName('picture-content');

var srcList = [];
function getImgSrc(x){
  let z = x.replace('#', '');
  let y = document.getElementById(z).getElementsByTagName("IMG");
  for(let h=0; h < y.length; h++){
    srcList.push(y[h].src);
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
}
$("#close").click(function(){
    picBlock.style.display = "none";
    bigPic[0].src = ""; 
});

</script>
<?php include("includes/footer.inc.php"); ?>