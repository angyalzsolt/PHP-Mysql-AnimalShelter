<?php 
$servername = "eva.codefactory.live";
$username = "evacf_piestany";
$password = "$!JjwYmD9M";
$dbname = "evacf_piestany";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error() . "\n");
}
?>

