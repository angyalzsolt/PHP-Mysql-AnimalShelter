<?php 
require("dbh.inc.php");

$sql1 = "SELECT * FROM cat 
		LEFT JOIN main_image_cat ON cat.cat_id = main_image_cat.fk_cat_id 
		LEFT JOIN image_cat ON cat.cat_id = image_cat.fk_cat_id 
		LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
		LEFT JOIN supporter ON cat.cat_id = supporter.fk_cat_id
		WHERE adaption.fk_cat_id IS NULL  AND cat.in_memoriam = 1";

$result=mysqli_query($conn, $sql1);
$data = array();
while($row = mysqli_fetch_array($result)){
	$data[$row['cat_id']]['cat_name'] = $row['cat_name'];
	$data[$row['cat_id']]['type'] = $row['type'];
	$data[$row['cat_id']]['post_date'] = $row['post_date'];
	$data[$row['cat_id']]['born_date'] = $row['born_date'];
	$data[$row['cat_id']]['main_image'] = $row['main_image'];
	$data[$row['cat_id']]['castration'] = $row['castration'];
	$data[$row['cat_id']]['height'] = $row['height'];
	$data[$row['cat_id']]['weight'] = $row['weight'];
	$data[$row['cat_id']]['gender'] = $row['gender'];
	$data[$row['cat_id']]['cat_desc'] = $row['cat_desc'];
	$data[$row['cat_id']]['cat_id'] = $row['cat_id'];
	$data[$row['cat_id']]['supporter'] = $row['name'];
	$data[$row['cat_id']]['images'][$row['image_cat']] = $row['image_cat'];
};

if (isset($_GET['char'])) {
    $char = $_GET['char'];
    $sql1 = "SELECT * FROM cat 
		LEFT JOIN main_image_cat ON cat.cat_id = main_image_cat.fk_cat_id 
		LEFT JOIN image_cat ON cat.cat_id = image_cat.fk_cat_id 
		LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
		WHERE adaption.fk_cat_id IS NULL AND cat.in_memoriam = 1 AND cat_name LIKE '$char%' ";

$result=mysqli_query($conn, $sql1);
$data = array();
while($row = mysqli_fetch_array($result)){
	$data[$row['cat_id']]['cat_name'] = $row['cat_name'];
	$data[$row['cat_id']]['type'] = $row['type'];
	$data[$row['cat_id']]['post_date'] = $row['post_date'];
	$data[$row['cat_id']]['born_date'] = $row['born_date'];
	$data[$row['cat_id']]['main_image'] = $row['main_image'];
	$data[$row['cat_id']]['castration'] = $row['castration'];
	$data[$row['cat_id']]['height'] = $row['height'];
	$data[$row['cat_id']]['weight'] = $row['weight'];
	$data[$row['cat_id']]['gender'] = $row['gender'];
	$data[$row['cat_id']]['cat_desc'] = $row['cat_desc'];
	$data[$row['cat_id']]['cat_id'] = $row['cat_id'];
	$data[$row['cat_id']]['images'][$row['image_cat']] = $row['image_cat'];
};
    }

if (isset($_GET['nochar'])) {
    
    $sql1 = "SELECT * FROM cat 
		LEFT JOIN main_image_cat ON cat.cat_id = main_image_cat.fk_cat_id 
		LEFT JOIN image_cat ON cat.cat_id = image_cat.fk_cat_id 
		LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
		WHERE adaption.fk_cat_id IS NULL AND cat.in_memoriam = 1 ";

$result=mysqli_query($conn, $sql1);
$data = array();
while($row = mysqli_fetch_array($result)){
	$data[$row['cat_id']]['cat_name'] = $row['cat_name'];
	$data[$row['cat_id']]['type'] = $row['type'];
	$data[$row['cat_id']]['post_date'] = $row['post_date'];
	$data[$row['cat_id']]['born_date'] = $row['born_date'];
	$data[$row['cat_id']]['main_image'] = $row['main_image'];
	$data[$row['cat_id']]['castration'] = $row['castration'];
	$data[$row['cat_id']]['height'] = $row['height'];
	$data[$row['cat_id']]['weight'] = $row['weight'];
	$data[$row['cat_id']]['gender'] = $row['gender'];
	$data[$row['cat_id']]['cat_desc'] = $row['cat_desc'];
	$data[$row['cat_id']]['cat_id'] = $row['cat_id'];
	$data[$row['cat_id']]['images'][$row['image_cat']] = $row['image_cat'];
};
    }

if (isset($_GET['filter_date'])) {
    $fmonth = $_GET['fmonth'];
    $fyear = $_GET['fyear'];
    $sql1 = "SELECT * FROM cat 
		LEFT JOIN main_image_cat ON cat.cat_id = main_image_cat.fk_cat_id 
		LEFT JOIN image_cat ON cat.cat_id = image_cat.fk_cat_id 
		LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
		WHERE adaption.fk_cat_id IS NULL AND cat.in_memoriam = 1 AND cat.born_date LIKE '$fyear-$fmonth%'";

$result=mysqli_query($conn, $sql1);
$data = array();
while($row = mysqli_fetch_array($result)){
	$data[$row['cat_id']]['cat_name'] = $row['cat_name'];
	$data[$row['cat_id']]['type'] = $row['type'];
	$data[$row['cat_id']]['post_date'] = $row['post_date'];
	$data[$row['cat_id']]['born_date'] = $row['born_date'];
	$data[$row['cat_id']]['main_image'] = $row['main_image'];
	$data[$row['cat_id']]['castration'] = $row['castration'];
	$data[$row['cat_id']]['height'] = $row['height'];
	$data[$row['cat_id']]['weight'] = $row['weight'];
	$data[$row['cat_id']]['gender'] = $row['gender'];
	$data[$row['cat_id']]['cat_desc'] = $row['cat_desc'];
	$data[$row['cat_id']]['cat_id'] = $row['cat_id'];
	$data[$row['cat_id']]['images'][$row['image_cat']] = $row['image_cat'];
};
    }    
/*
Ajax Search
$sql2 = "SELECT DISTINCT YEAR(born_date) FROM cat
		 LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
		 WHERE adaption.fk_cat_id IS NULL AND cat.in_memoriam = 1 ORDER BY YEAR(born_date) DESC";
$result = mysqli_query($conn, $sql2);
$rows2 = $result->fetch_all(MYSQLI_ASSOC);



$sql3 = "SELECT * FROM cat 
		LEFT JOIN main_image_cat ON cat.cat_id = main_image_cat.fk_cat_id 
		LEFT JOIN adaption ON cat.cat_id = adaption.fk_cat_id
		WHERE adaption.fk_cat_id IS NULL AND cat.in_memoriam = 1 AND YEAR(born_date) = ".$_POST["search"]."";
$result=mysqli_query($conn,$sql3);
$output='';
if (mysqli_num_rows($result)>0)  {
              $rows = $result->fetch_all(MYSQLI_ASSOC);
              foreach ($rows as $row) {
             {
              echo '<div class="part_divs col-md-3 offset-md-1 col-sm-5 offset-sm-2 mb-4 mt-2">
			          <div class="small_parts">
			            <img class="imag" src="../image_upload/'. $row["main_image"].'"  >
			          </div>
			        </div>';
           	 };
}}

*/
	

 ?>




