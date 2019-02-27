<?php
include("includes/navbar.inc.php"); 
include("includes/dbh.inc.php");
include("includes/upload_eshop.inc.php");
if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Sent successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }
$sql = "SELECT * FROM eshop INNER JOIN eshop_image ON eshop_image.fk_eshop_id = eshop.eshop_id";
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

      <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card ">
            <a href="#"><img class="card-img-top" src="../img/photo-1544103796-2dc6b5f4d85e.jpg" alt=""></a>
            <div class="card-body" >
              <h4 class="card-title">
                <a >Clothes</a>
              </h4>
              <form action='eshop.php' method='post' >
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 20cm">20 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 25cm">25 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 30cm">30 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 35cm">35 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 40cm">40 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 45cm">45 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 50cm">50 cm</button>
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth 55cm">55 cm</button>     
                <button class="btn warningg btn-block" type="submit" name='id' value="cloth over 55cm">over 55 cm</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card">
            <a href="#"><img class="card-img-top" src="../img/photo-1511657304136-7d9f56e0d574.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="mb-4 card-title">
                <a>Collar, Leash</a>
              </h4>
              <form action='eshop.php' method='post' >
              <button class="my-4 btn warningg btn-block" type="submit" name='id' value="collar, leash">Collar, Leash</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card">
            <a href="#"><img class="card-img-top" src="../img/photo-1529472119196-cb724127a98e.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="mb-4 card-title">
                <a>Other</a>
              </h4>
              <form action='eshop.php' method='post' >
              <button class="mt-4 btn warningg btn-block" type="submit" name='id' value="other">Other</button>
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

