<?php 

include("../../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
if(isset($_POST['send'])) {
 	$namefrom = $_POST['name'];
 	$subjectfrom = $_POST['subject'];
 	$messagefrom = $_POST['message'];
try {
		//$mail->SMTPDebug = 2;
		$mail->isSMTP();
		$mail->Host = 'mail.eva.codefactory.live';
		$mail->SMTPAuth = true;
		$mail->Username = 'animalshelter@eva.codefactory.live';
		$mail->Password = 'Password1!';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom('animalshelter@eva.codefactory.live','AnimalShelter');
		$mail->addAddress('animalshelter@eva.codefactory.live','Eva');
		//$mail->addAddress('somebody elses emailaddress');

		$mail->isHTML(true);
		$mail->Subject = $subjectfrom;
		$mail->Body = 'From: '.$namefrom."<br>\nWritten: ".$messagefrom;

		$mail->send();
	header('Location:../contact.php?success');

} catch (Exception $e){
	header('Location:../contact.php?error');
}

}
?>