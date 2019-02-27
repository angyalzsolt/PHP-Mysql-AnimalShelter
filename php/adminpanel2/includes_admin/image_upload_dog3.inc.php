<?php 
include("dbh.inc.php");



if(isset($_POST['submitOther'])) {
	$dogid = $_POST['submitOther'];
	$file = $_FILES['file'];
	$file1 = $_FILES['file1'];
	$file2 = $_FILES['file2'];
	$file3 = $_FILES['file3'];
	$file4 = $_FILES['file4'];

	$all = array($file,$file1,$file2,$file3,$file4);

	foreach ($all as $file ) {
	$fileName = $file['name'];
	$fileType = $file['type'];
	$fileTempName = $file['tmp_name'];
	$fileError = $file['error'];
	$fileSize = $file['size'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$sql = "SELECT * FROM dog WHERE dog_id=$dogid";
$imageFkIdss = mysqli_query($conn, $sql);
$imageFkIds = mysqli_fetch_assoc($imageFkIdss);
$imageFkId = $imageFkIds['dog_id'];
	if (in_array($fileActualExt, $allowed)) {
		if($fileError === 0) {
			if($fileSize < 20000000) {
				$imageFullName = "DOG." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../../../image_upload/" . $imageFullName;
				if(empty($imageFkId)) {
					header("Location: admin_landing_page.php?succesAll");
					exit();
				} else {
					$sql = "SELECT * FROM image_dog;";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						$result= mysqli_stmt_get_result($stmt);
						$sql = "INSERT INTO image_dog(image_dog, fk_dog_id) VALUES ('".$imageFullName."', {$imageFkId} );";
						if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
						} else {
						mysqli_stmt_execute($stmt);
						move_uploaded_file($fileTempName, $fileDestination);
						header("Location: ../select_dog.php?success");
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
};
}
 ?>