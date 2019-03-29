<?php 
require_once("includes_admin/navbar.inc.php");
require_once("includes_admin/dbh.inc.php");
if (isset($_SESSION['userUid']))
            {   

?>
<link rel="stylesheet" type="text/css" href="../../css/admin.css">
<div class="break">
	
</div>
<div class="container">
<div class="row">
            
          <div class="col-md-10 offset-md-2">
		<?php         if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>".$languages[$x]["success"]."</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      } ?>
		<div class="break">	
		</div>
		<hr class="mb-4" >
		<div>
		<h2 class="mb-4"><?php echo $languages[$x]["shelter_img"] ?></h2>
		
		<form  method="post" action="includes_admin/image_upload_shelter.inc.php" enctype="multipart/form-data" class="mb-4">
			
				<input type="file" name="file" class="mb-4" onchange="readURL(this);printForm()" required="true">
				<input type="number" name="counter" id="counter" hidden>
				<div id="target"></div>
				<p><button type="submit" class="btn btn-primary" name="submitOther"><?php echo $languages[$x]["up_load_btn"] ?></button></p>
			
		</form>	
	</div>
	</div>
	<div class="col-lg-6" id="imagereview">
		
	
	</div>
</div>
</div>
<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#imagereview').append("<img src="+e.target.result+" style='width: 250px; height: 300px;'>");

    };
    reader.readAsDataURL(input.files[0]);
  }
};

var i = 1;
function printForm(){
	$("#target").append('<input type="file" name="file'+i+'" class="mb-4" onchange="readURL(this);printForm()">');
	$("#counter").val(i);
i++;
}
</script>
<?php }
include("includes_admin/footer.inc.php"); ?>