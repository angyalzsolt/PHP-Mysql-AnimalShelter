<?php 
require_once("dbh.inc.php");
$sql = "SELECT * FROM team ORDER BY team_id DESC LIMIT 1";
$imageFkIdss = mysqli_query($conn, $sql);
$imageFkIds = mysqli_fetch_assoc($imageFkIdss);
$imageFkId = $imageFkIds['team_id'];

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
				$imageFullName = "TEAM." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../../../image_upload/" . $imageFullName;
				if(empty($imageFkId)) {
					header("Location: admin_landing_page.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM team_image;";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						$result= mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;
						$sql = "INSERT INTO team_image(team_image, fk_team_id) VALUES ('".$imageFullName."', {$imageFkId} );";
						if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						move_uploaded_file($fileTempName, $fileDestination);
						header("Location: ../upload_team.php?success");
					}
					}
				}

			} else {
				echo "File size is too big";
				exit();
			}
		} else {
			echo "You had an error!".$fileError;
			exit();
		}
	} else {
		echo "You need to upload a proper file type!";
		exit();
	}

	//print_r($file);
}





 ?>