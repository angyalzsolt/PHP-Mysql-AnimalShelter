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
		
		<div class="break">	
</div>
		<hr class="mb-4" >
		<div>
		<h2 class="mb-4">2. STEP: <?php echo $languages[$x]["up_img4"] ?></h2>
		<form  method="post" action="includes_admin/image_upload_cat2.inc.php" enctype="multipart/form-data" class="mb-4">
			<input type="file" name="file" class="mb-4" onchange="readURL(this);" required="true">
			<input type="file" name="file1" class="mb-4" onchange="readURL(this);">
			<input type="file" name="file2" class="mb-4" onchange="readURL(this);">
			<input type="file" name="file3" class="mb-4" onchange="readURL(this);">
			<input type="file" name="file4" class="mb-4" onchange="readURL(this);">
			<p><button type="submit" class="btn btn-primary" name="submitOther"><?php echo $languages[$x]["up_load_btn"] ?></button></p>
		</form>	
		<a href="upload_cat.php" class=" mt-4 btn btn-primary"><?php echo $languages[$x]["up_skip_btn"] ?></a>
	</div>
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