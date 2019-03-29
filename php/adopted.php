<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/output_adopted.inc.php");
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
			<h1>Adopted</h1>
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
							<button class="btn btn-success mb-2 btn-block buttons"  data-backdrop="static" data-keyboard="false" onclick="getImgSrc('moreModal'+<?php echo $row["id"] ?>)"  type="button" data-toggle="modal" data-target="#moreModal<?php
                echo $row["id"];?>">More..</button>
						</div>
					</div>
				</div>				
				<!----MoreMOdal--->
        <div class="modal fade" id="moreModal<?php echo $row["id"];?>" tabindex="-1" role="dialog" aria-labelledby="moreModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="moreModalLabel"><?php echo $row["name"]; ?></h5>
                <button type="button" class="close" onclick="delSrcList()"data-dismiss="modal" aria-label="Close">
                  <span  aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="mb-0"><b>Name:</b> <?php echo $row["name"]; ?> <br></p>
                <p class="mb-0"><b>Adopted on:</b> <?php $date2 = strtotime($row["req_date"]);
               echo $new_date = date('d. m. Y', $date2); ?> <br></p>
                <p class="mb-0"><b>Gender:</b> <?php echo $row["gender"]; ?> <br></p>
                <p class="mb-0"><b>Type:</b> <?php echo $row["type"]; ?> <br></p>
                <p class="mb-0"><b>Born:</b> <?php $date = strtotime($row["born_date"]);
               echo $new_date = date('d. m. Y', $date); ?> <br></p>
                <p class="mb-0"><b>Height:</b> <?php echo $row["height"]; ?> <br></p>
                <p class="mb-0"><b>Weight:</b> <?php echo $row["weight"]; ?> <br></p>
                <p class="pb-3"><b>Castration:</b> <?php echo $row["castration"]; ?> <br></p>
                <p><b>Description:</b> <?php echo $row["desc"]; ?> <br></p>
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
                <?php $i++; $j++; }; ?>
                </div>
            </div>
              <div class="modal-footer">
                <button type="button"  onclick="delSrcList()"  class="btn btn-secondary" data-dismiss="modal">Close</button>
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
       <a href="adopted.php?char=<?php echo chr($i) ?>" class="mb-1 btn btn-warning"><?php echo chr($i) ?></a>
     <?php }; ?>
      <!--  <a href="adopted.php?char=B" class="mb-1 btn btn-warning">B</a>
       <a href="adopted.php?char=C" class="mb-1 btn btn-warning">C</a>
       <a href="adopted.php?char=D" class="mb-1 btn btn-warning">D</a>
       <a href="adopted.php?char=E" class="mb-1 btn btn-warning">E</a>
       <a href="adopted.php?char=F" class="mb-1 btn btn-warning">F</a>
       <a href="adopted.php?char=G" class="mb-1 btn btn-warning">G</a>
       <a href="adopted.php?char=H" class="mb-1 btn btn-warning">H</a>
       <a href="adopted.php?char=I" class="mb-1 btn btn-warning">I</a>
       <a href="adopted.php?char=J" class="mb-1 btn btn-warning">J</a>
       <a href="adopted.php?char=K" class="mb-1 btn btn-warning">K</a>
       <a href="adopted.php?char=L" class="mb-1 btn btn-warning">L</a>
       <a href="adopted.php?char=M" class="mb-1 btn btn-warning">M</a>
       <a href="adopted.php?char=N" class="mb-1 btn btn-warning">N</a>
       <a href="adopted.php?char=O" class="mb-1 btn btn-warning">O</a>
       <a href="adopted.php?char=P" class="mb-1 btn btn-warning">P</a>
       <a href="adopted.php?char=Q" class="mb-1 btn btn-warning">Q</a>
       <a href="adopted.php?char=R" class="mb-1 btn btn-warning">R</a>
       <a href="adopted.php?char=S" class="mb-1 btn btn-warning">S</a>
       <a href="adopted.php?char=T" class="mb-1 btn btn-warning">T</a>
       <a href="adopted.php?char=U" class="mb-1 btn btn-warning">U</a>
       <a href="adopted.php?char=V" class="mb-1 btn btn-warning">V</a>
       <a href="adopted.php?char=W" class="mb-1 btn btn-warning">W</a>
       <a href="adopted.php?char=X" class="mb-1 btn btn-warning">X</a>
       <a href="adopted.php?char=Y" class="mb-1 btn btn-warning">Y</a>
       <a href="adopted.php?char=Z" class="mb-1 btn btn-warning">Z</a> -->
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
            <!-- <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option> -->
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
<!--             <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option> -->
          </select>
        </div>
        <input class="btn btn-warning"" type="submit" value="Filter" name="filter_date" />
       </form><br> 
       <a href="adopted.php?nochar" class="mb-1 btn btn-warning">No filter</a>
    </div>

    
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