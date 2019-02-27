<?php 
include("dbh.inc.php");
mysqli_query($conn, "UPDATE counter SET numberr = numberr+1 WHERE counter_id=1");

$szum = mysqli_query($conn, "SELECT * FROM dog ");
$szum1 = mysqli_num_rows($szum) ;
echo $szum1;

?>