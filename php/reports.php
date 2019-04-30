<?php 
include("includes/navbar.inc.php");
include("includes/dbh.inc.php");

// here i can choose how many result i want to see every page
$resultppage=10;

// i select the query that i want to see how many result i have 
$sql = "SELECT * FROM reports " ;

// run the query 
$res = mysqli_query($conn,$sql);

// i save the result in a variable as an array
$row0 = $res->fetch_all(MYSQLI_ASSOC);

// here i am checking if i dont have in GET any value it will be the page number one and if i have a value in GET i will save it in a variable $page and i will say if it's 0 i want it to be page number 1 coz i don't want to have page number 0 and else it will take the value from GET and put it inside a variable $page
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
  if($page === 0) {
    $page = 1;
  } else {
    $page = (int)$_GET['page'];
  }
}
/*
var_dump((int)$_GET["page"]);
exit;
*/
// Pagination

// If number of pages is less than one then set it to 1, otherwise set it accordingly
// here i want to know how many row i have in my result from the last query i have 
$number_of_results0 = count($row0);
$number_of_pages = ceil($number_of_results0/$resultppage);
if($number_of_pages <= 1 ) {
  $number_of_pages = 1;
}


// to select the page that i work in to use limit i want the page for the first result and how many result i want to see 
$this_page_first_result = ($page-1)*$resultppage;

$sql2="SELECT * FROM reports LEFT JOIN reports_image ON reports.reports_id = reports_image.fk_reports_id ORDER BY reports_id DESC LIMIT " . $this_page_first_result . ", " . $resultppage . ";";

// i run the query
$res = mysqli_query($conn,$sql2);

// i save the result in a variable $row2
$row2 = $res->fetch_all(MYSQLI_ASSOC);


 ?>
<link rel="stylesheet" type="text/css" href="../css/reports.css">
<div class="break">
    
</div>
<div class="container">
    <div class="jumbotron backg2 p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-weight-bold"><?php echo $languages[$x]["reports_title"] ?></h1><br>
          <a class="btn btn-success btn-lg" href="search_reports.php" role="button"><?php echo $languages[$x]["search"] ?></a>
          <a class="ml-3 btn btn-secondary btn-lg" href="annual_reports.php" role="button"><?php echo $languages[$x]["annual_reports"] ?></a> <br>
          <a class="ml-3 mt-3 btn btn-warning btn-lg" href="http://www.utulok-piestany.sk/index.php?s=1&u=6&do=archive&lang" role="button"><?php echo $languages[$x]["archive_sk"] ?></a>
          <a class="ml-3 mt-3 btn btn-warning btn-lg" href="http://www.utulok-piestany.sk/index.php?s=1&u=6&do=archive&lang=GER" role="button">Archive DE</a>

      </div>
  </div>
  <?php
  $i=1;
  foreach ($row2 as $row) {
    if($i%2==0){ ?>

        <div class="row">
            <div class="card col-md-12 p-3 mb-4">
                <div class="row ">
                    <div class="col-md-3">
                        <img style="height: 200px; " class="float-left imag" src="../image_upload/reports_image/<?php echo $row['reports_image'] ?>" onerror="this.src = '../img/no-image.jpg';">
                    </div>
                    <div class="col-md-9">
                        <div class="card-block">
                            <h2 class="card-title"><?php echo $row['name'] ?></h2>
                            <p class="card-text text-justify text str"><?php echo substr($row['reports_descriptions'], 0, 250) ?>...</p>
                            <form id="single" action='report.php' method='get' >
                                <button class="btn warningg mt-4" type="submit" name='id' value="<?php echo $row['reports_id'] ?>"><?php echo $languages[$x]["read_more"] ?></button>  
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }else{ ?>
        <div class="row">
            <div class="card col-md-12 p-3 mb-4">
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <div class="card-block">
                            <h2 class="card-title"><?php echo $row['name'] ?></h2>
                            <p class="card-text text-justify text str"><?php echo substr($row['reports_descriptions'], 0, 250) ?>...</p>
                            <form id="single" action='report.php' method='get' >
                                <button class="btn warningg" type="submit" name='id' value="<?php echo $row['reports_id'] ?>"><?php echo $languages[$x]["read_more"] ?></button>  
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img  style="height: 200px; " class=" float-right imag" src="../image_upload/reports_image/<?php echo $row['reports_image'] ?>" onerror="this.src = '../img/no-image.jpg';">
                    </div>
                </div>
            </div>
        </div>
        <?php  
    }
    $i++; }; 
    ?>

</div>
<div class="text-left page" id="page"><div class='container'><div class='row'><div class='col-md-12 text-center'>
    <?php 
    // Visible part of pagination
      for ($page = 1; $page<=$number_of_pages; $page++) {
        echo "<a class='paginationPages btn btn-default'  href='reports.php?page=" . $page . "'>" . $page . "</a>"; 
      }
      //  END of Visible part of pagination
      if (!isset($_GET['page'])) {
        $curPage = 1;
      } else {
        $curPage = $_GET['page'];
      }
      echo "
<p style='float:left; padding-right:15px;'>".$languages[$x]["page"]. " " . $curPage . " ".$languages[$x]["out_of"]." " . $number_of_pages . "</p>";
    ?>
</div></div></div>
  </div>
<div class="break">

</div>
<?php
include("includes/footer.inc.php");
?>
