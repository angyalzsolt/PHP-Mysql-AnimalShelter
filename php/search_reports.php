<?php 
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");
include("includes/output_reports.inc.php");

 ?>
<link rel="stylesheet" type="text/css" href="../css/reports.css">
<div class="break">
    
</div>
    <div class="container">
    <div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-weight-bold"><?php echo $languages[$x]["reports_title"] ?></h1><br>
          <a class="btn btn-primary btn-lg" href="reports.php" role="button"><?php echo $languages[$x]["back_to_all"] ?></a>
          <!-- <a class="ml-3 btn btn-warning btn-lg" href="http://www.utulok-piestany.sk/files/vyr_sprava_2015_orig.pdf" role="button"><?php echo $languages[$x]["annual_reports"] ?></a> -->
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
 <br>
  <h2 align="center"><?php echo $languages[$x]["search_in_reports"] ?></h2><br>
  <div class="form-group">
    <div class="input-group">
      <input type="text" name="search_text" id="search_text" placeholder="<?php echo $languages[$x]["type_a_word"] ?>" class="form-control">
    </div>
  </div>
  <br>
  <div class="row" id="result"></div>
  </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#search_text').keyup(function()
     {
      var txt = $(this).val();
      if (txt == '')
      {
      }
      else
      {console.log(txt);
        $('#result').html('<p>Searching in reports..</p>');
        $.ajax({
          url:"includes/fetch_reports.inc.php",
          method: "post",
          data: {search:txt},
          dataType: "text",
          success:function(data){
            $('#result').html(data);
          }
        });
      }
     });
  });

var string = $('.str').text();
var str50 = string.substr(0,300) 
$('.str').html(str50+'...<br>');
$('.str').attr('data-text',string);

$('.readmore').click(function(e)
{
    e.preventDefault();
    $(this).parent().html($(this).parent().attr('data-text'))

})
</script>

</div>
<div class="break">
    
</div>
<?php
include("includes/footer.inc.php");
  ?>