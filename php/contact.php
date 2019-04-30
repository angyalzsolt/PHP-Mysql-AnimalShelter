<?php include("includes/navbar.inc.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/contact.css">
<div class="break">

</div>
<?php  
if (isset($_GET['success'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Sent successfully!</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }
if (isset($_GET['error'])) {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error. Try again.</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }
 ?>
<div class="container">
<div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-weight-bold"><?php echo $languages[$x]["contact_title"] ?></h1>
        </div>
      </div>
	<div class="row">
		<div class="col-md-12">
			<div class="mb-4">
				<h3><?php echo $languages[$x]["contact"] ?>:</h3>
				<p><?php echo $languages[$x]["contact_sub"] ?></p>
			</div>
			<address class="mb-4">
				<h3><?php echo $languages[$x]["an_home"] ?>:</h3>
				<p><?php echo $languages[$x]["an_home_sub"] ?></p>
			</address>
			<div class="mb-4">
				<h3><?php echo $languages[$x]["visit_us"] ?>:</h3>
				<?php echo $languages[$x]["contact_open"] ?>
			</div>
			<div class="mb-4">
				<h3>Tel:</h3>
				<p><?php echo $languages[$x]["tel_one"] ?></p>
				<p><?php echo $languages[$x]["tel_two"] ?></p>
			</div>
			<div class="mb-4">
				<h3>E-mail:</h3>
				<p>utulok@utulok-piestany.sk</p>
			</div>
			<div class="mb-4">
				<h3><?php echo $languages[$x]["postal_address"] ?>: </h3>
				<p>POBOX D - 111:</p>
				<p>921 01 Piešťany, Slovakia</p>
			</div>
			<div class="mb-4">
				<h3><?php echo $languages[$x]["account_title"] ?>:</h3>
				<p><?php echo $languages[$x]["account_one"] ?>.</p>
				<p><?php echo $languages[$x]["account_two"] ?></p>
				<p><?php echo $languages[$x]["account_three"] ?></p>
			</div>
			<div class="mb-4">
				<h3>IČO:</h3>
				<p>35628685</p>
			</div>
			<div class="mb-4">
				<h3>E-mail:</h3>
				<a href="mailto:utulok@utulok-piestany.sk"><p class="contact_text">utulok@utulok-piestany.sk</p></a>
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-4">
		<div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Priemyseln%C3%A1%2012a%2C%20Pie%C5%A1%C5%A5any%2C%20Slovakia+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Map a route</a></iframe></div><br />
		</div>
</div>
<div class="col-md-8 offset-2">
<form  method="POST" action="includes/contact.inc.php">   
          <div class="form-group">
            <label >Your Name</label>
            <input type="text" placeholder="Full Name" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label >Subject</label>
            <input type="text" placeholder="subject"  class="form-control" name="subject" required>
          </div>
          <div class="form-group">
            <label >Your Message</label>
            <textarea type="text" placeholder="Your Message" class="form-control" name="message" required></textarea>
          </div>   
          <input class="btn warningg" type="submit" value="Send" name="send" />
        </form>
 </div>
<div class="break">
	
</div>
<?php include("includes/footer.inc.php"); ?>
