<?php
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");
include("includes/upload_bid.inc.php");

?>
<link rel="stylesheet" type="text/css" href="../css/mission.css">
<div class="break">
	
</div>
<div class="container">

<div class="row">
<?php
if(isset ($_GET['id']) ){
    $product_id = $_GET['id'];
  }
  $sql = "SELECT `name`, `conditionn`, `descr`,`price`, `post_date`, `end_date`, `auction_product_id`, auction_bid.email, auction_bid.nick_name,auction_bid.bid_price, auction_image.auction_product_image
FROM auction_bid 
INNER JOIN auction_product
ON auction_product.auction_product_id = auction_bid.fk_auction_product_id
INNER JOIN auction_image
ON auction_product.auction_product_id = auction_image.fk_auction_product_id
WHERE auction_product.auction_product_id =$product_id and auction_bid.bid_price = ( SELECT MAX(bid_price) FROM auction_bid INNER JOIN auction_product ON
                                                                       auction_product.auction_product_id = auction_bid.fk_auction_product_id
                                                                       WHERE auction_product.auction_product_id =$product_id) ";
$rows = mysqli_query($conn, $sql);
$result = $rows->fetch_all(MYSQLI_ASSOC);
if (empty($result)){
  ?><div class="col-md-12">
    
 <form  method="POST" action="includes/upload_bid.inc.php" class="needs-validation" novalidate>
    <div class="form-group">
            <label ><?php echo $languages[$x]["product"] ?></label>
            <input type="text" readonly="readonly"  class="form-control" name="product_id" value="<?php echo $product_id; ?>">
          </div>
          <div class="form-group">
            <label for="validationCustom01"><?php echo $languages[$x]["nick_name"] ?></label>
            <input type="text" id="validationCustom01" class="form-control" name="nname" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom02"><?php echo $languages[$x]["your_full_name"] ?> (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom02" class="form-control" name="fname" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03"><?php echo $languages[$x]["your_bid"] ?></label>
            <input type="text" id="validationCustom03" class="form-control" name="bid" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03">E-mail (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom03" class="form-control" name="email" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom04"><?php echo $languages[$x]["address"] ?> (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom04" class="form-control" name="address" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom05">Telephone (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom05" class="form-control" name="tel" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label ><?php echo $languages[$x]["comment"] ?> (<?php echo $languages[$x]["not_required"] ?>) </label>
            <input type="text"   class="form-control" name="comment">
          </div>
          <input class="btn warningg" type="submit" value="<?php echo $languages[$x]["bid_btn"] ?>" name="make_bid" />
        </form> </div> <?php
} else {
   foreach($result as $row) { 
 ?>
        <div class="col-md-8">
          <img class="img-fluid" src="../image_upload/<?php echo $row['auction_product_image'] ?>" alt="">
        </div>
        <div class="col-md-4">
          <h3 class="my-3"><?php echo $row['name']; ?></h3>
          <p><?php echo $row['descr']; ?></p>
          <h4 class="my-3">Info</h4>
          <ul>
          	<li><?php echo $languages[$x]["highest_bid"] ?>: <?php echo $row['bid_price']; ?>,- (<?php echo $languages[$x]["from"] ?>: <?php echo $row['nick_name']; ?>)</li>
            <li><?php echo $languages[$x]["first_price"] ?>: <?php echo $row['price']; ?>,-</li>
            <li><?php echo $languages[$x]["condition"] ?>: <?php echo $row['conditionn']; ?></li>
            <li><?php echo $languages[$x]["posted"] ?>: <?php $date = strtotime($row['post_date']); echo $new_date = date('d. m. Y', $date); ?></li>
            <li><?php echo $languages[$x]["end_auction"] ?>: <?php $date = strtotime($row['end_date']); echo $new_date = date('d. m. Y', $date); ?></li>
          </ul>
        </div>
<div class="col-md-12">
  <?php 
    if (isset($_GET['error'])) {
      echo '<div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-danger" role="alert">
                      Invalid credentials, try again!
                      </div>
                  </div>
              </div>  
          </div>'; 
  }
   ?>

	<br>
<form  method="POST"  action="includes/upload_bid.inc.php" class="needs-validation" novalidate>
		<div class="form-group">
            <label ><?php echo $languages[$x]["product"] ?></label>
            <input type="text" readonly="readonly"  class="form-control" name="product_id" value="<?php echo $row['auction_product_id']; ?>">
          </div>
          <div class="form-group">
            <label for="validationCustom01"><?php echo $languages[$x]["nick_name"] ?></label>
            <input type="text" id="validationCustom01" class="form-control" name="nname" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom02"><?php echo $languages[$x]["your_full_name"] ?> (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom02" class="form-control" name="fname" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03"><?php echo $languages[$x]["your_bid"] ?></label>
            <input type="text" value="<?php echo $row['bid_price']+1; ?>" id="validationCustom03" class="form-control" name="bid" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom03">E-mail (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom03" class="form-control" name="email" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom04"><?php echo $languages[$x]["address"] ?> (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom04" class="form-control" name="address" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustom05">Tel (<?php echo $languages[$x]["not_public"] ?>)</label>
            <input type="text"  id="validationCustom05" class="form-control" name="tel" required>
            <div class="invalid-feedback">
              <?php echo $languages[$x]["provide_value"] ?>
            </div>
          </div>
          <div class="form-group">
            <label ><?php echo $languages[$x]["comment"] ?> (<?php echo $languages[$x]["not_required"] ?>) </label>
            <input type="text"   class="form-control" name="comment">
          </div>
          <input class="btn warningg" type="submit" value="<?php echo $languages[$x]["bid_btn"] ?>" name="make_bid" />
        </form>
        </div>
<?php }} ?>
      </div>
</div>
<div class="break">
  
</div>
<?php include("includes/footer.inc.php"); ?>

