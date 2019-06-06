<?php 

$sql1 = "SELECT * FROM dog
		 LEFT JOIN main_image_dog ON dog.dog_id = main_image_dog.fk_dog_id 
		 LEFT JOIN image_dog ON dog.dog_id = image_dog.fk_dog_id 
		 LEFT JOIN adaption ON dog.dog_id = adaption.fk_dog_id
		 LEFT JOIN supporter ON dog.dog_id = supporter.fk_dog_id
		 WHERE adaption.fk_dog_id IS NULL AND dog.in_memoriam = 1";

$result=mysqli_query($conn, $sql1);
$data = array();
while($row = mysqli_fetch_array($result)){
	$data[$row['dog_id']]['dog_name'] = $row['dog_name'];
	$data[$row['dog_id']]['type'] = $row['type'];
	$data[$row['dog_id']]['post_date'] = $row['post_date'];
	$data[$row['dog_id']]['born_date'] = $row['born_date'];
	$data[$row['dog_id']]['main_image'] = $row['main_image_dog'];
	$data[$row['dog_id']]['castration'] = $row['castration'];
	$data[$row['dog_id']]['height'] = $row['height'];
	$data[$row['dog_id']]['weight'] = $row['weight'];
	$data[$row['dog_id']]['dog_desc'] = $row['dog_desc'];
	$data[$row['dog_id']]['gender'] = $row['gender'];
	$data[$row['dog_id']]['dog_id'] = $row['dog_id'];
	$data[$row['dog_id']]['supporter'] = $row['name'];
	$data[$row['dog_id']]['images'][$row["image_dog"]] = $row['image_dog'];
};
$j = json_encode($data);
/*
Normal Search
$sql2 = "SELECT DISTINCT YEAR(born_date) FROM dog
		 LEFT JOIN main_image_dog ON dog.dog_id = main_image_dog.fk_dog_id 
		 LEFT JOIN image_dog ON dog.dog_id = image_dog.fk_dog_id 
		 LEFT JOIN adaption ON dog.dog_id = adaption.fk_dog_id
		 WHERE adaption.fk_dog_id IS NULL AND dog.in_memoriam = 1";
$result = mysqli_query($conn, $sql2);
$rows2 = $result->fetch_all(MYSQLI_ASSOC);		 
*/
 ?>