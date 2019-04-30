


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/footer.css">

<!--footer starts from here-->
<footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2"><?php echo $languages[$x]["visit_us"] ?></h5>
<!--headin5_amrc-->
<p class="mb10"><?php echo $languages[$x]["footer_open"] ?></p>
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2"><?php echo $languages[$x]["quick_links"] ?></h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="ourmission.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["OUR_MISSION"])) ?></a></li>
<li><a href="team_page.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["OUR_TEAM"])) ?></a></li>
<li><a href="sponsors.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["SPONSORS"])) ?></a></li>
<li><a href="gallary.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["GALLERY"])) ?></a></li>
<li><a href="reports.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["REPORTS"])) ?></a></li>
<li><a href="contact.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["CONTACT"])) ?></a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2"><?php echo $languages[$x]["quick_links"] ?></h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="dogs.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["DOGS"])) ?></a></li>
<li><a href="cats.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["CATS"])) ?></a></li>
<li><a href="search.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["SEARCH"])) ?></a></li>
<li><a href="adoption.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["ADOPT"])) ?></a></li>
<li><a href="support.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["SUPPORT"])) ?></a></li>
<li><a href="adopted.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["IN_HAPPY_HOME"])) ?></a></li>
<li><a href="in_memoriam.php"><i class="fas fa-angle-right"></i> <?php echo ucfirst(mb_strtolower($languages[$x]["IN_MEMORIAM"])) ?></a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2"><?php echo $languages[$x]["footer_find"] ?></h5>
<!--headin5_amrc ends here-->

<ul class="footer_ul2_amrc">
<p><i class="fa fa-location-arrow"></i> <?php echo $languages[$x]["footer_row1"] ?></p>
<p><i class="fa fa-phone"></i> <?php echo $languages[$x]["footer_row2"] ?></p>
<p><i class="fa fa fa-envelope"></i> <?php echo $languages[$x]["footer_row3"] ?></p>
</ul>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<div class="container">
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2018 | Designed by: <br><a href="https://www.codefactory.wien">CodeFactory:</a>
<br><a href="https://www.zsolt.codefactory.live">Zsolt Angyal</a>
<br><a href="https://www.eva.codefactory.live">Eva Bukli</a>
<br><a href="https://www.nico.codefactory.live">Nico Adelmann</a>
<br><a href="https://www.mustafa.codefactory.live">Mustafa Abdou</a>
<br><a href=#>Mohamed Ahmed</a>
</p>

<!--social_footer_ul ends here-->
</div>

</footer>
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Bootstrap core JavaScript -->
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="../js/agency.js"></script>

</body>
</html>