<?php
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/upload_eshop.inc.php");
if(isset ($_GET['id']) ){
    $pid= $_GET['id'];
  }
if(isset ($_POST['buy_eshop']) ){
  $pid= $_POST['buy_id'];
}

$sql = "SELECT * FROM eshop INNER JOIN eshop_image ON eshop_image.fk_eshop_id = eshop.eshop_id WHERE product_type='$pid'";
$rows = mysqli_query($conn, $sql);
$result = $rows->fetch_all(MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../css/auction.css">
<div class="break">
  
</div>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4" style="margin-bottom: 0px!important">E-Shop</h1>
        
      <p><?php echo $languages[$x]["eshop_subtitle"] ?></p>
      <hr>
      <h2><?php echo $languages[$x]["products"] ?></h2>

      <div class="row">
        <?php foreach($result as $row) { ?>
        <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
          <div class="card ">
            <a href="#"><img class="card-img-top" src="../image_upload/<?php echo $row['eshop_image'] ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a><?php echo $row['name']; ?></a>
              </h4>
              
              <p class="card-text"><?php echo $languages[$x]["buy"] .': '. $row['description']; ?></p>
              <p class="card-text"><?php echo $languages[$x]["price"] .': '. $row['price']; ?> ,- </p>
              <p class="card-text"><?php echo $languages[$x]["quantity"] .': '. $row['quantityy']; ?></p>
              <p class="card-text"><?php echo $languages[$x]["condition"] .': '. $row['conditionn']; ?></p>
              <p class="card-text"><?php echo $languages[$x]["type"] .': '.$row['product_type']; ?></p>
              
              <form id="single" method='get' >
              <button class="btn btn-success btn-block mb-2 buttons"  type="button" data-toggle="modal" data-target="#buyModal<?php
                echo $row["eshop_id"];?>"><?php echo $languages[$x]["buy"] ?></button>  
            </form>
            </div>
          </div>
        </div>
        <!--buy Modal-->
                <div class="modal fade" id="buyModal<?php echo $row["eshop_id"];?>" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="buyModalLabel"><?php echo $languages[$x]["products"] .' '.$row["name"]; ?> for <?php echo $row["price"]; ?>,-</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form  method="post" action="eshop1.php?success" class="needs-validation" novalidate>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="buy_id" value="<?php echo $row["eshop_id"];?>" placeholder="<?php echo $row["name"]; ?>">
                          </div>
                          <div class="form-group">
                            <label for="error1"><?php echo $languages[$x]["your_full_name"] ?></label>
                            <input type="text" class="form-control" name="buy_name" placeholder="<?php echo $languages[$x]["ph_name"] ?>" id="error1" required>
                            <div class="invalid-feedback">
                            <?php echo $languages[$x]["provide_value"] ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error2">Email</label>
                            <input type="email" class="form-control" name="buy_email" placeholder="name@example.com" id="error2" required>
                            <div class="invalid-feedback">
                            <?php echo $languages[$x]["provide_value"] ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error4"><?php echo $languages[$x]["address"] ?></label>
                            <input type="text" class="form-control" name="buy_address" placeholder="<?php echo $languages[$x]["ph_city"] ?>" id="error4" required>
                            <div class="invalid-feedback">
                            <?php echo $languages[$x]["provide_value"] ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label"><?php echo $languages[$x]["comment"] ?></label>
                            <input type="text" class="form-control" name="buy_comment" placeholder="<?php echo $languages[$x]["ph_street"] ?>"  >
                           
                          </div>
                          <div class="form-group">
                            <label for="error6">Telephone</label>
                            <input type="text" class="form-control" name="buy_tel" placeholder="01 234 567" id="error6" required>
                            <div class="invalid-feedback">
                            <?php echo $languages[$x]["provide_value"] ?>
                            </div>
                          </div>
                          <input class="btn btn-success" type="submit" value="<?php echo $languages[$x]["buy_btn"] ?>" name="buy_eshop" />
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $languages[$x]["close"] ?></button>
                      </div>
                    </div>
                  </div>
                </div>
      <?php } ?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
<div class="break">
  
</div>
<?php include("includes/footer.inc.php"); ?>

