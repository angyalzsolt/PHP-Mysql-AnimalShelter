<?php include ("includes_admin/navbar.inc.php");
      include ("includes_admin/dbh.inc.php"); 
      if (isset($_SESSION['userUid']))
      {
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($conn, "DELETE FROM auction_product WHERE auction_product_id=$id");
  $_SESSION['message'] = "Product deleted!";
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM auction_bid WHERE bid_id=$id");
  $_SESSION['message'] = "Bid deleted!";
}
 if (isset($_GET['bids'])) {
  $id = $_GET['bids'];
  $results2=mysqli_query($conn, "SELECT * FROM auction_product JOIN auction_bid ON auction_bid.fk_auction_product_id=auction_product.auction_product_id WHERE auction_product_id = $id AND fk_auction_product_id=$id"); ?>
  <div class="container-fluid">   
  <div class="row">
  <div class="col-md-10 offset-md-2 users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
      
    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th>Bid ID:</th>
      <th>Product</th>
      <th>First Price:</th>
      <th>Bid:</th>
      <th>From:</th>
      <th>E-mail:</th>
      <th>Address:</th>
      <th>Telephone:</th>
      <th>Comment:</th>
      <th>Bid Date:</th>
      <th>Auction End:</th>
    </tr>
  </thead>
  
  <?php while ($row2 = mysqli_fetch_array($results2)) { ?>
    <tr>
      <td><?php echo $row2['auction_product_id']; ?></td>
      <td><?php echo $row2['bid_id']; ?></td>
      <td><?php echo $row2['name']; ?></td>
      <td><?php echo $row2['price']; ?></td>
      <td><?php echo $row2['bid_price']; ?></td>
      <td><?php echo $row2['full_name']." (".$row2['nick_name'].")"; ?></td>
      <td><?php echo $row2['email']; ?></td>
      <td><?php echo $row2['address']; ?></td>
      <td><?php echo $row2['telephone']; ?></td>
      <td><?php echo $row2['comment']; ?></td>
      <td><?php echo $row2['bid_date']; ?></td>
      <td><?php echo $row2['end_date']; ?></td>
      <td>
        <a href="list_auctions2.php?delete=<?php echo $row2['bid_id']; ?>" class="btn btn-danger">Delete</a>
      </td>
      </tr>
  <?php } ?>
</table>
</div>
</div>
  </div><?php
}


    ?>
<?php $results = mysqli_query($conn, "SELECT * FROM auction_product"); ?>
  <div class="col-md-10 offset-md-2 users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
      
    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th>Product</th>
      <th>First Price:</th>
      <th>Post Date:</th>
      <th>End Date:</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['auction_product_id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['post_date']; ?></td>
      <td><?php echo $row['end_date']; ?></td>
      <?php echo 
      '<td>
        <a href="list_auctions2.php?bids='.$row['auction_product_id'].'" class="btn btn-warning">See Bids</a>
      </td>
      <td>
        <a href="list_auctions2.php?del='.$row['auction_product_id'].'" class="btn btn-danger">Delete</a>
      </td>'
      ?>
      </tr>
  <?php } ?>
</table>
</div>
</div>
</div>
</div>
  </div>

  <?php } include ("includes_admin/footer.inc.php");?>