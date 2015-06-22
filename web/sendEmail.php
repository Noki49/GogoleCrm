<?php

// Replace this with your own email address
$siteOwnersEmail = 'leblond.morgan@hotmail.fr';


if($_POST) {

   $name = trim(stripslashes($_POST['nom']));
   $prenom = trim(stripcslashes($_POST['prenom']));
   $email = trim(stripslashes($_POST['email']));
   $contact_message = trim(stripslashes($_POST['message']));


	if (strlen($name) < 2) {
		$error['name'] = "Entrer votre nom.";
	}

	if (strlen($prenom) < 2) {
		$error['prenom'] = "Entrer votre prénom.";
	}
	

	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Entrer une adresse mail valide.";
	}


	if (strlen($contact_message) < 15) {
		$error['message'] = "Votre message fait moins de 15 caractères.";
	}



   // Set Message
   $message .= "Email from: " . $name . " " . $prenom . "<br />";
   $message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $message, $headers);

		if ($mail) { echo "OK"; }
      else { echo "Erreur lors de l'envoi du message. Essayer à nouveau."; }
		
	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

}

?>