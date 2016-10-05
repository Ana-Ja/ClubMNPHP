<?php
function mandarCorreo($de, $a, $asunto, $mensaje){
	require './PHPMailer/PHPMailerAutoload.php';

	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = "smtp.mandrillapp.com";
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 587;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "curso@web.com";
	//Password to use for SMTP authentication
	$mail->Password = "OM4SmQc21BkpyYuz8ZOyhw";
	//Set who the message is to be sent from
	$mail->setFrom($de[0], $de[1]);
	//Set an alternative reply-to address
	$mail->addReplyTo($de[0], $de[1]);
	//Set who the message is to be sent to
	$mail->addAddress($a[0],$a[1]);
	//Set the subject line
	$mail->Subject = $asunto;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML($mensaje);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Esto es el mensaje en modo texto';
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
	if (!$mail->send()) {
		return 0;
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		return 1;
	    echo "Message sent!";
	}
}
?>