<?php 
require("dbh.inc.php");


if(isset($_POST['submitOther'])) {
/*
checking for error in ordered style
echo "<pre>";
print_r($_FILES);
echo "</pre>";
*/
	$i =intval($_POST["counter"]);
	//echo $i;

	for($x=0; $x<=$i; $x++) {

	//short if statement
	$file = ($x == 0) ? $_FILES['file'] : $_FILES['file'.$x] ;

	//echo "file: ".$file['name'];

	$fileName = $file['name'];
	$fileType = $file['type'];
	$fileTempName = $file['tmp_name'];
	$fileError = $file['error'];
	$fileSize = $file['size'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if($fileError === 0) {
			if($fileSize < 20000000) {
				$imageFullName = "SHELTER." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../../../image_upload/" . $imageFullName;

					$sql = "SELECT * FROM place;";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						$result= mysqli_stmt_get_result($stmt);

						$sql = "INSERT INTO place(url) VALUES ('".$imageFullName."');";
						if(!$sql){
							echo "SUCCESS!!!FIRST ROUND";
						};
						if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
						} else {
						
						mysqli_stmt_execute($stmt);


						move_uploaded_file($fileTempName, $fileDestination);
						header("Location: ../upload_shelter.php?success");
						}
					}
				

			} else {
				echo "File size is too big";
				exit();
			}
		} else {
			echo "You had an error!";
			exit();
		}
	} else {
		echo "You need to upload a proper file type!";
		exit();
	}

};
}


 ?>