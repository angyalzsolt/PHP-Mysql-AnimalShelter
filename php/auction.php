<?php
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
$sql = "SELECT * FROM auction_product INNER JOIN auction_image ON auction_image.fk_auction_product_id = auction_product.auction_product_id";
$rows = mysqli_query($conn, $sql);
$result = $rows->fetch_all(MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../css/auction.css">
<div class="break">
</div>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4"><?php echo $languages[$x]["auction"] ?></h1>
      <hr>
      <p><?php echo $languages[$x]["auction_subtitle"] ?></p>
      <h2><?php echo $languages[$x]["products"] ?></h2>

      <div class="row">
        <div class="col-10 offset-1">
          <?php 
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>".$languages[$x]["bid_msg"]."</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
      } ?>
        </div>
        <?php foreach($result as $row) { ?>
        <div class="col-lg-4 col-sm-6 portfolio-item mb-4">
          <div class="card ">
            <a href="#"><img class="card-img-top" src="../image_upload/<?php echo $row['auction_product_image'] ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a><?php echo $row['name']; ?></a>
              </h4>
              <p class="card-text"><?php echo $languages[$x]["bid_price"] ?>: <?php echo $row['price']; ?> ,- </p>
<!--               <p class="card-text"><?php echo $languages[$x]["first_price"] ?>: <?php echo $row['price']; ?> ,- </p> -->
              <p class="card-text"><?php echo $languages[$x]["end_date"] ?>: <?php $date = strtotime($row['end_date']); echo $new_date = date('d. m. Y', $date); ?></p>
              <form id="single" action='auction_form.php' method='get' >
              <button class="btn warningg btn-block  mb-2" type="submit" name='id' value="<?php echo $row["auction_product_id"]; ?>"><?php echo $languages[$x]["make_bid"] ?></button>  
            </form>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      
    </div>
    <!-- /.container -->
<div class="break">
  
</div>
<?php include("includes/footer.inc.php"); ?>

