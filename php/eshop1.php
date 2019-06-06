<?php
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/upload_eshop.inc.php");
$sql = "SELECT * FROM eshop INNER JOIN eshop_image ON eshop_image.fk_eshop_id = eshop.eshop_id";
$rows = mysqli_query($conn, $sql);
$result = $rows->fetch_all(MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../css/auction.css">
<div class="break">
  
</div>
    <!-- Page Content -->
    <div class="container">
      <?php 
      if (isset($_GET['success'])) {
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>".$languages[$x]["bid_msg"]."</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
      }

       ?>

      <!-- Page Heading -->
      <h1 class="my-4" style="margin-bottom: 0px!important">E-Shop</h1>
        
      <p><?php echo $languages[$x]["eshop_subtitle"] ?></p>
      <hr>
      <h2><?php echo $languages[$x]["products"] ?></h2>
      <div class="row">

      <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card ">
            <a href="#"><img class="card-img-top" src="../img/photo-1544103796-2dc6b5f4d85e.jpg" alt=""></a>
            <div class="card-body" >
              <h4 class="card-title">
                <a ><?php echo $languages[$x]["eshop_col1"] ?></a>
              </h4>
              <form action='eshop.php' method='get' >
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 20cm">20 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 25cm">25 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 30cm">30 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 35cm">35 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 40cm">40 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 45cm">45 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 50cm">50 cm</button>  
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth over 50cm"><?php echo $languages[$x]["over"] ?> 50 cm</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card">
            <a href="#"><img class="card-img-top" src="../img/photo-1511657304136-7d9f56e0d574.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="mb-4 card-title">
                <a><?php echo $languages[$x]["eshop_col2"] ?></a>
              </h4>
              <form action='eshop.php' method='get' >
              <button class="my-4 btn warningg btn-block" type="submit" name='id' value="collar, leash"><?php echo $languages[$x]["eshop_col2"] ?></button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card">
            <a href="#"><img class="card-img-top" src="../img/photo-1529472119196-cb724127a98e.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="mb-4 card-title">
                <a><?php echo $languages[$x]["eshop_col3"] ?></a>
              </h4>
              <form action='eshop.php' method='get' >
              <button class="mt-4 btn warningg btn-block" type="submit" name='id' value="other"><?php echo $languages[$x]["eshop_col3"] ?></button>
              </form>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
<div class="break">
  
</div>
<?php include("includes/footer.inc.php"); ?>

