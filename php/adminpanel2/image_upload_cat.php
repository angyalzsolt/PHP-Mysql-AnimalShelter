<?php 
require_once("includes_admin/navbar.inc.php");
require_once("includes_admin/dbh.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../../css/admin.css">
<div class="break">
	
</div>
<div class="container">
<div class="row">
	<div class="col-md-5 offset-md-2">
		<h2 class="mb-4">1.STEP: <?php echo $languages[$x]["up_img1"] ?></h2>
		<form  method="post" action="includes_admin/image_upload_cat.inc.php" enctype="multipart/form-data" class="mb-4">
			<input type="file" name="file" value="add" onchange="readURL(this)" required="true"><br>
			<button type="submit" class=" mt-4 btn btn-primary" name="submit"><?php echo $languages[$x]["up_load_btn"] ?></button>
		</form>
		<a href="upload_cat.php" class=" mt-4 btn btn-primary"><?php echo $languages[$x]["up_skip_btn"] ?></a>
		<div class="break">
	
</div>
		<hr>

	</div>
	<div class="col-md-5"><img id="review" src="#" alt=""></div>
	
</div>
</div>
<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#review')
        .attr('src', e.target.result)
        .width(450)
        .height(500);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<?php 
include("includes_admin/footer.inc.php");
 ?>