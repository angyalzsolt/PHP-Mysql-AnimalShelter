<?php
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");
include("includes/output_team.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../css/team_page.css">
<div class="break">
</div>
<section id="team" class="pb-5">
    <div class="container">
        <div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
            <div class="col-md-6 px-0">
              <h1 class="display-4 font-weight-bold"><?php echo $languages[$x]["meet_team"] ?></h1>
          </div>
      </div>
      <div class="row">
        <?php foreach ($teamResult as $row) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p class="imag"><img class=" img-fluid" src="../image_upload/<?php echo $row['team_image'] ?>" onerror="this.src ='../img/no-image.png';"alt="card image"></p>
                                    <h4 class="card-title"><?php echo $row["name"] ?></h4>
                                    <p class="card-text"><?php echo $row["position"] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php echo $row["name"] ?></h4>
                                    <p class="card-text"><?php echo $row["description"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php   }; ?>
    </div>
</div>
</section>
<!-- Team -->
<?php include("includes/footer.inc.php"); ?>

