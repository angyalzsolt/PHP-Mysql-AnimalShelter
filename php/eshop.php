<?php
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/upload_eshop.inc.php");
if(isset ($_POST['id']) ){
    $pid= $_POST['id'];
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
      <h1 class="my-4">E-Shop
        <small>Products</small>
      </h1>

      <div class="row">
        <?php foreach($result as $row) { ?>
        <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
          <div class="card ">
            <a href="#"><img class="card-img-top" src="../image_upload/<?php echo $row['eshop_image'] ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a><?php echo $row['name']; ?></a>
              </h4>
              
              <p class="card-text">Description: <?php echo $row['description']; ?></p>
              <p class="card-text">Price: <?php echo $row['price']; ?> ,- </p>
              <p class="card-text">Quantity: <?php echo $row['quantityy']; ?></p>
              <p class="card-text">Condition: <?php echo $row['conditionn']; ?></p>
              <p class="card-text">Type: <?php echo $row['product_type']; ?></p>
              
              <form id="single" method='get' >
              <button class="btn btn-success btn-block mb-2 buttons"  type="button" data-toggle="modal" data-target="#buyModal<?php
                echo $row["eshop_id"];?>">Buy</button>  
            </form>
            </div>
          </div>
        </div>
        <!--buy Modal-->
                <div class="modal fade" id="buyModal<?php echo $row["eshop_id"];?>" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="buyModalLabel">Buy <?php echo $row["name"]; ?> for <?php echo $row["price"]; ?>,-</h5>
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
                            <label for="error1">Your Full Name</label>
                            <input type="text" class="form-control" name="buy_name" placeholder="Your Name" id="error1" required>
                            <div class="invalid-feedback">
                            Please provide your full name.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error2">Email address</label>
                            <input type="email" class="form-control" name="buy_email" placeholder="name@example.com" id="error2" required>
                            <div class="invalid-feedback">
                            Please provide an email address.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="error4">Address</label>
                            <input type="text" class="form-control" name="buy_address" placeholder="City" id="error4" required>
                            <div class="invalid-feedback">
                            Please provide an address.
                            </div>
                          </div>
                          <div class="form-group">
                            <label">Comment</label>
                            <input type="text" class="form-control" name="buy_comment" placeholder="Street 23"  >
                           
                          </div>
                          <div class="form-group">
                            <label for="error6">Phone Number</label>
                            <input type="text" class="form-control" name="buy_tel" placeholder="01 234 567" id="error6" required>
                            <div class="invalid-feedback">
                            Please provide a phone number.
                            </div>
                          </div>
                          <input class="btn btn-success" type="submit" value="Buy" name="buy_eshop" />
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

