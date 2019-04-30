<?php
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");
include("includes/output_sponsors.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../css/gallery.css">
<div class="break">
  
</div>
<div id='main' class='containerr pb-5 pt-5'> 
  <div class="col-md-12 mb-4">
      <h1 class="text-center"><?php echo $languages[$x]["our_sponsors"] ?></h1>
    </div>
<?php foreach ($sponsorsResult as $key) { ?>
<a data-toggle="modal"  style="cursor: pointer;" data-target="#imageModal<?php echo $key["sponsors_id"];?>"><img src='../image_upload/<?php echo $key['sponsors_image'] ?>' onerror="this.src = '../img/no-image.png'" class='img-thumbnail make_bigger mb-4' alt='Cinque Terre'></a>
 <div class="modal fade" id="imageModal<?php echo $key["sponsors_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog image_modal modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sponsor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src='../image_upload/<?php echo $key['sponsors_image'] ?>' class='img-large' alt='Cinque Terre'>
        <h5 class="text-center"><?php echo $key['sponsors_name'] ?></h5>
        <p class="text-center"><a href="<?php echo $key['sponsors_email'] ?>" style="text-decoration: underline" title=""><?php echo $key['sponsors_email'] ?></a></p>
        <p class="text-center"><?php echo $key['sponsors_address'] ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $languages[$x]["close"] ?></button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
 </div>
<?php include("includes/footer.inc.php"); ?>
