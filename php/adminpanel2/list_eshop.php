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
    <h1 class="mb-4"><?php echo $languages[$x]["products"] ?></h1>

    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th><?php echo $languages[$x]["products"] ?></th>
      <th><?php echo $languages[$x]["price"] ?>:</th>
      <th><?php echo $languages[$x]["condition"] ?>:</th>
      <th><?php echo $languages[$x]["quantity"] ?>:</th>
      <th><?php echo $languages[$x]["up_desc"] ?>:</th>
      <th>Type:</th>
      <th><?php echo $languages[$x]["rep_action"] ?></th>
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
        <a href="list_eshop.php?del=<?php echo $row['eshop_id']; ?>" class="btn btn-danger"><?php echo $languages[$x]["del/sold"] ?></a>
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
      <h1 class="mb-4"><?php echo $languages[$x]["w_c"] ?></h1>
    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th><?php echo $languages[$x]["up_name"] ?></th>
      <th>E-mail:</th>
      <th><?php echo $languages[$x]["address"] ?>:</th>
      <th>Tel:</th>
      <th><?php echo $languages[$x]["comment"] ?>:</th>
      <th><?php echo $languages[$x]["pr_id"] ?>:</th>
      <th><?php echo $languages[$x]["product"] ?>:</th>
      <th><?php echo $languages[$x]["price"] ?>:</th>
      <th>Status:</th>
      <th><?php echo $languages[$x]["rep_action"] ?></th>
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
        <a href="list_eshop.php?remove=<?php echo $row['customer_id']; ?>" class="btn btn-warning"><?php echo $languages[$x]["contacted"] ?></a>
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
      <h1 class="mb-4"><?php echo $languages[$x]["hand_cust"] ?></h1>
    <table class="table bordered">
  <thead>
    <tr>
      <th>ID:</th>
      <th><?php echo $languages[$x]["up_name"] ?></th>
      <th>E-mail:</th>
      <th><?php echo $languages[$x]["address"] ?>:</th>
      <th>Tel:</th>
      <th><?php echo $languages[$x]["comment"] ?>:</th>
      <th><?php echo $languages[$x]["pr_id"] ?>:</th>
      <th><?php echo $languages[$x]["product"] ?>:</th>
      <th><?php echo $languages[$x]["price"] ?>:</th>
      <th>Status:</th>
      <th><?php echo $languages[$x]["rep_action"] ?></th>
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
        <a href="list_eshop.php?delete=<?php echo $row['customer_id']; ?>" class="btn btn-danger"><?php echo $languages[$x]["del/finish"] ?></a>
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