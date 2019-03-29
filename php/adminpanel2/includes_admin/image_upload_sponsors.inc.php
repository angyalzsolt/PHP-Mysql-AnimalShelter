<?php 
require_once("dbh.inc.php");
$sql = "SELECT * FROM sponsors ORDER BY sponsors_id DESC LIMIT 1";
$imageFkIdss = mysqli_query($conn, $sql);
$imageFkIds = mysqli_fetch_assoc($imageFkIdss);
$imageFkId = $imageFkIds['sponsors_id'];

if(isset($_POST['submit'])){

	$file = $_FILES['file'];
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
				$imageFullName = "SPONSOR." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../../../image_upload/" . $imageFullName;
				//var_dump($fileDestination);
				if(empty($imageFkId)) {
					header("Location: admin_landing_page.php2?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM sponsors_image;";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						$result= mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

						$sql = "INSERT INTO sponsors_image(sponsors_image, fk_sponsors_id) VALUES ('".$imageFullName."', {$imageFkId} );";
						if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						//mysqli_stmt_bind_param($stmt, "ssss", $imageFullName);
						mysqli_stmt_execute($stmt);


						move_uploaded_file($fileTempName, $fileDestination);

						header("Location: ../admin_landing_page2.php?success");
					}
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

	//print_r($file);
}





 ?>