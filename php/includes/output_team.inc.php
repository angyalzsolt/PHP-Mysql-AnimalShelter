<?php

$sql = "SELECT * FROM team LEFT JOIN team_image ON team.team_id = team_image.fk_team_id";

$teamRows = mysqli_query($conn, $sql);

$teamResult = $teamRows->fetch_all(MYSQLI_ASSOC);


 ?>