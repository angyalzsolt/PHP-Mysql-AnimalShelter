<?php 
include("includes_admin/dbh.inc.php");
include("includes_admin/output_verify_adopter.inc.php");
include("includes_admin/navbar.inc.php");
if (isset($_SESSION['userUid']))
            {                 
 ?>
 <div class="container-fluid ">
  <div class="row">
    <div class="col-md-3 offset-md-2">
      <?php if(isset($_GET['success'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
}   ?>
      <h1 class="m-4">News</h1>
      <?php

       $sql2 = "SELECT * FROM supporter
                LEFT JOIN cat ON supporter.fk_cat_id = cat.cat_id 
                LEFT JOIN dog ON supporter.fk_dog_id = dog.dog_id 
                WHERE verify = 2";
                      $result2 = mysqli_query($conn, $sql2);
                      $rows2 = $result2->fetch_all(MYSQLI_ASSOC);

       $sql3 = "SELECT * FROM eshop_customer
                WHERE status = 'waiting'";
                      $result3 = mysqli_query($conn, $sql3);
                      $rows3 = $result3->fetch_all(MYSQLI_ASSOC);


       if(!empty($rows)){ ?>
      <div class="mt-4">
        <h4>Waiting for verification</h4>
        <?php foreach ($rows as $row) {
         ?>
        <p><?php  echo "<u>Adoption request from:</u> ".$row['name']; ?><a href='list_adopters.php'> Check out</a></p>  <?php } ?>
      </div>
      <?php } ;

       if(!empty($rows2)){ ?>
      <div class="mt-4">
        <h4>Waiting for verification</h4>
        <?php foreach ($rows2 as $row2) {
         ?>
        <p><?php  echo "<u>Support request from:</u> ".$row2['name']; ?><a href='list_supporters.php'> Check out</a></p>  <?php } ?>
      </div>
      <?php } ;

       if(!empty($rows3)){ ?>
      <div class="mt-4">
        <h4>Waiting for handle</h4>
        <?php foreach ($rows3 as $row3) {
         ?>
        <p><?php  echo "<u>Buying request from:</u> ".$row3['full_name']; ?><a href='list_eshop.php'> Check out</a></p>  <?php } ?>
      </div>
      <?php } ;?>
      
    </div>
    <div class="col-md-7 mt-4 pr-2" style="padding-top: 100px;padding-left: 100px;">
      <img src="../../img/logo3.png" width="600" alt="">
    </div>
      </div>
    </div>
<script>
  $(document).ready(function(){
   $('.button-left').click(function(){
       $('.sidebar').toggleClass('fliph');
   });
     
});
</script>  
<?php include("includes_admin/footer.inc.php") ?>
<?php }
else{
	echo "<p>You shouldn't be here - log in ! </p>";
}?>
