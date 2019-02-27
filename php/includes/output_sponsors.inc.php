<?php 

$sql = "SELECT * FROM sponsors LEFT JOIN sponsors_image ON sponsors.sponsors_id = sponsors_image.fk_sponsors_id";

$sponsorsRows = mysqli_query($conn, $sql);

$sponsorsResult = $sponsorsRows->fetch_all(MYSQLI_ASSOC);


 ?>