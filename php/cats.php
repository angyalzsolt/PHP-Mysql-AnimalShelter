<?php 
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/output_cat.inc.php");
include("includes/upload_support.inc.php");
include("includes/upload_adopt.inc.php");
include("includes/config.php");


?>
<link rel="stylesheet" type="text/css" href="../css/dogs_cats.css">
<div class="break">
</div>
<div class="container">
  <div class="row">
    <div class="col-10 offset-1">
      <h1>Cats</h1>
      <hr> 
    </div>
    
    <div class="col-10 offset-1">
      <!--
        Ajax Search Top
      <div class="form-goup">
        
      
    <select class="form-control" name="selectage" id="selectage">
        <option value="#" id="reset">Select age</option>}
        option
        <?php
        $thisYear = date("Y");
         foreach ($rows2 as $row) {
         // echo $row["born_date"];
            echo ' <option value="'.$row["YEAR(born_date)"].'">'.($thisYear - $row["YEAR(born_date)"]).' years old</option>';
          };
         ?>
        </select>
       </div> 
       -->
      <div class="row" id="result">
        <?php $i=0;$j=10;
         foreach($data as $row){  ?>
        <div class="part_divs col-md-3 offset-md-1 col-sm-5 offset-sm-2 mb-4 mt-2">
          <div class="small_parts">
            <img class="imag" src="../image_upload/<?php echo $row["main_image"]; ?>"  onerror="this.src = '../img/no-image_cat.jpg';" alt="">
            <div class="buttons_div">
              <button class="btn btn-success mb-2 btn-block buttons"  data-backdrop="static" data-keyboard="false" onclick="getImgSrc('moreModal'+<?php echo $row["cat_id"] ?>)"  type="button" data-toggle="modal" data-target="#moreModal<?php
                echo $row["cat_id"];?>">More..</button>
              <button class="btn btn-success btn-block mb-2 buttons"  type="button" data-toggle="modal" data-target="#supportModal<?php
                echo $row["cat_id"];?>">Support</button>
              <button class="btn btn-success btn-block buttons" type="button" data-toggle="modal" data-target="#adoptModal<?php
                echo $row["cat_id"];?>">Adopt</button>
            </div>
          </div>
        </div>
        <!----MoreMOdal--->
        <div class="modal fade" id="moreModal<?php echo $row["cat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="moreModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="moreModalLabel"><?php echo $row["cat_name"]; ?></h5>
                <button type="button"  onclick="delSrcList()"class="close" data-dismiss="modal" aria-label="Close">
                  <span  aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="mb-0"><b>Name:</b> <?php echo $row["cat_name"]; ?> <br></p>
                <p class="mb-0"><b>Gender:</b> <?php echo $row["gender"]; ?> <br></p>
                <p class="mb-0"><b>Type:</b> <?php echo $row["type"]; ?> <br></p>
                <p class="mb-0"><b>Born:</b> <?php $date = strtotime($row["born_date"]);
               echo $new_date = date('d. m. Y', $date); ?> <br></p>
                <p class="mb-0"><b>Height:</b> <?php echo $row["height"]; ?> <br></p>
                <p class="mb-0"><b>Weight:</b> <?php echo $row["weight"]; ?> <br></p>
                <p class="pb-3"><b>Castration:</b> <?php echo $row["castration"]; ?> <br></p>
                <p><b>Description:</b> <?php echo $row["cat_desc"]; ?> <br></p>
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
                <button type="button" class="btn btn-secondary"  onclick="delSrcList()" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
         <!--Support Modal-->
                <div class="modal fade" id="supportModal<?php echo $row["cat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="supportModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="supportModalLabel">Support <?php echo $row["cat_name"]; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form  method="post" class="needs-validation" novalidate>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="cat_id" value="<?php echo $row["cat_id"];?>" placeholder="<?php echo $row["cat_name"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="error1">Your Full Name</label>
                            <input type="text" class="form-control" name="support_name" placeholder="Your Name" id="error1" required>
                            <div class="invalid-feedback">
                            Please provide a name.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error2">Email address</label>
                            <input type="email" class="form-control" name="support_email" placeholder="name@example.com" id="error2" required>
                            <div class="invalid-feedback">
                            Please provide an email address.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error3">ZIP</label>
                            <input type="number" class="form-control" name="support_zip" placeholder="ZIP of city" id="error3" required>
                            <div class="invalid-feedback">
                            Please provide a ZIP.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error4">City</label>
                            <input type="text" class="form-control" name="support_city" placeholder="City" id="error4" required>
                            <div class="invalid-feedback">
                            Please provide a city name.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error5">Street</label>
                            <input type="text" class="form-control" name="support_street" placeholder="Street 23" id="error5" required>
                            <div class="invalid-feedback">
                            Please provide a street name.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error6">Phone Number</label>
                            <input type="text" class="form-control" name="support_tel" placeholder="01 234 567" id="error6" required>
                            <div class="invalid-feedback">
                            Please provide a phone number.
                            </div>
                          </div>
                          <input class="btn btn-success" type="submit" value="Support" name="support_cat" />
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Adopt Modal-->
                <div class="modal fade" id="adoptModal<?php echo $row["cat_id"];?>" tabindex="-1" role="dialog" aria-labelledby="adoptModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="adoptModalLabel">Adopt <?php echo $row["cat_name"]; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form  method="post"  class="needs-validation" novalidate>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="cat_id" value="<?php echo $row["cat_id"];?>" placeholder="<?php echo $row["cat_name"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="error1">Full Name</label>
                            <input type="text" class="form-control" name="adopt_name" placeholder="Your Name" id="error1" required>
                            <div class="invalid-feedback">
                            Please provide a name.
                            </div>
                          </div>
                          <div class="form-group">
                            <label >Kind of keeping</label>
                            <select name="kind" class="form-control">
                              <option value="inside">Inside</option>
                              <option value="inside & outside">Inside & Outside</option>
                              <option value="outside">Outside</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Other pets in the household</label>
                            <select  name="other1" class="form-control">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label  for="error2">Other pets in the household</label>
                            <input type="text" class="form-control" name="other2" placeholder="2 friendly cats" id="error2" required>
                            <div class="invalid-feedback">
                            Please provide an answer.
                            </div>
                          </div>
                          <div class="form-group">
                            <label  for="error3">Email address</label>
                            <input type="email" class="form-control" name="adopt_email" placeholder="name@example.com" id="error3" required>
                            <div class="invalid-feedback">
                            Please provide an email address.
                            </div>
                          </div>
                          <div class="form-group">
                            <label  for="error4">Address</label>
                            <input type="text" class="form-control" name="adopt_address" placeholder="1234 City Street 12" id="error4" required>
                            <div class="invalid-feedback">
                            Please provide an address.
                            </div>
                          </div>
                          <div class="form-group">
                            <label  for="error5">Phone Number 1</label>
                            <input type="text" class="form-control" name="adopt_tel1" placeholder="01 234 567" id="error5" required>
                            <div class="invalid-feedback">
                            Please provide a phone number.
                            </div>
                          </div>
                          <div class="form-group">
                            <label >Phone Number 2 (optional)</label>
                            <input type="text" class="form-control" name="adopt_tel2" placeholder="01 234 567">
                          </div>
                          <input class="btn btn-success" type="submit" value="Adopt" name="adopt_cat" />
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
      <?php }; ?>
        
      </div><!--inside row ends-->
    </div><!--col-10 ends-->

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
for(let d = 0; d <srcList.length; d++){
  if(!srcList[d].includes('CAT')){
    console.log("THERE IS NO VALID IMAGE");
    return;
    }
  }
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

/*
//AJAX search 

    $('#selectage').change(function()
     {
      //console.log('asdsa');
      var age = $(this).val();
      if (age == '#')
      {
        $("#result").html('');;
      }
      else{
        console.log(age);
        $.ajax({
          url:"includes/output_cat.inc.php",
          method: "post",
          data: {search:age},
          dataType: "text",
          success:function(data){
            $('#result').html(data);
          }
        });
      }
     });

    $("#reset").change( function() {
      console.log('asdsa');
    
});
*/
</script>
<?php include("includes/footer.inc.php"); ?>