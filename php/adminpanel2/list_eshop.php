<?php include ("includes_admin/navbar.inc.php");
	  include ("includes_admin/dbh.inc.php"); 
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($conn, "DELETE FROM eshop WHERE eshop_id=$id");
  $_SESSION['message'] = "Product deleted!";
} 
if (isset($_GET['remove'])) {
  $idc = $_GET['remove'];
  mysqli_query($conn, "UPDATE eshop_customer SET status='in progress' WHERE customer_id=$idc");
  
} 
if (isset($_GET['delete'])) {
  $idc = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM eshop_customer WHERE customer_id=$idc");
  
} 
$results = mysqli_query($conn, "SELECT * FROM eshop"); ?>
<div class="container-fluid">
  
<div class="row">
  <div class="col-md-10 offset-md-2 users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
    <h1 class="mb-4"> Products</h1>

    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th>Product</th>
      <th>Price:</th>
      <th>Condition:</th>
      <th>Quantity:</th>
      <th>Description:</th>
      <th>Type:</th>
      <th>Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['eshop_id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['conditionn']; ?></td>
      <td><?php echo $row['quantityy']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><?php echo $row['product_type']; ?></td>
      <td>
        <a href="list_eshop.php?del=<?php echo $row['eshop_id']; ?>" class="btn btn-danger">Delete/Sold</a>
      </td>
      </tr>
  <?php } ?>
</table>
</div>
</div>
  </div>

<?php 
$results = mysqli_query($conn, "SELECT * FROM eshop_customer INNER JOIN eshop ON eshop.eshop_id = eshop_customer.fk_eshop_id WHERE eshop_id=fk_eshop_id AND status = 'waiting' ORDER BY customer_id DESC"); ?>
  <div class="col-md-10 offset-md-2  users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
      <h1 class="mb-4">Waiting Customers</h1>
    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th>Name</th>
      <th>E-mail:</th>
      <th>Address:</th>
      <th>Tel:</th>
      <th>Comment:</th>
      <th>Item ID:</th>
      <th>Product:</th>
      <th>Price:</th>
      <th>Status:</th>
      <th>Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['customer_id']; ?></td>
      <td><?php echo $row['full_name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['telephone']; ?></td>
      <td><?php echo $row['comment']; ?></td>
      <td><?php echo $row['fk_eshop_id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td>
        <a href="list_eshop.php?remove=<?php echo $row['customer_id']; ?>" class="btn btn-warning">Contacted</a>
      </td>
      </tr>
  <?php } ?>
</table>
</div>
</div>
  </div>

  <?php 
$results = mysqli_query($conn, "SELECT * FROM eshop_customer INNER JOIN eshop ON eshop.eshop_id = eshop_customer.fk_eshop_id WHERE eshop_id=fk_eshop_id AND status ='in progress'  ORDER BY customer_id DESC"); ?>
  <div class="col-md-10 offset-md-2  users_content">
    <div class="card card_adminpanel">
    <div class="card-body">
      <h1 class="mb-4">Handled Customers</h1>
    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th>Name</th>
      <th>E-mail:</th>
      <th>Address:</th>
      <th>Tel:</th>
      <th>Comment:</th>
      <th>Item ID:</th>
      <th>Product:</th>
      <th>Price:</th>
      <th>Status:</th>
      <th>Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['customer_id']; ?></td>
      <td><?php echo $row['full_name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['telephone']; ?></td>
      <td><?php echo $row['comment']; ?></td>
      <td><?php echo $row['fk_eshop_id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td>
        <a href="list_eshop.php?delete=<?php echo $row['customer_id']; ?>" class="btn btn-danger">Delete/Finish</a>
      </td>
      </tr>
  <?php } ?>
</table>
</div>
</div>
</div>
</div>
  </div>

  <?php include ("includes_admin/footer.inc.php");?>