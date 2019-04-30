<?php 
include("dbh.inc.php");
include("front_config.php");
$output='';
$sql= "SELECT * FROM reports LEFT JOIN reports_image ON reports.reports_id = reports_image.fk_reports_id WHERE keywords LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
$output='';
if (mysqli_num_rows($result)>0)  {
              $rows = $result->fetch_all(MYSQLI_ASSOC);
              foreach ($rows as $row) {
             {
              $output="
            <div class='card col-md-12 p-3 mb-4'>
                <div class='row '>
                    <div class='col-md-4'>
                        <img class='w-100 imag' src='../image_upload/reports_image/".$row["reports_image"]."'>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-block'>
                            <h6 class='card-title'>".$row["name"]."</h6>
                            <p class='card-text text-justify text str'>".$row["reports_descriptions"]."</p>
                            <form id='single' action='report.php' method='get' >
                                <button class='btn btn-info' type='submit' name='id' value='".$row["reports_id"]."'>". $languages[$x]["read_more"] ."</button>  
                            </form> 
                        </div>
                    </div>
                </div>
            </div>";
            }
            echo $output;
}}
  else
  {
echo "data not found";
  }
 ?>
<script>
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