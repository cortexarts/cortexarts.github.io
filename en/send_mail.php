<?php
if(isset($_POST['Email'])) {

    $email_to = "info@cortexarts.com";
    $email_subject = "Contact";
 
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['Email']) ||
        !isset($_POST['Name']) ||
        !isset($_POST['Message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $email_from= $_POST['Email']; // required
    $name_from= $_POST['Name']; // required
    $message_from= $_POST['Message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name_from)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message_from) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($Name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message_from)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Website encoding -->
	<meta charset="utf-8">
	<!-- Website compatibility -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Website description -->
	<meta name="description" content="A game development organization based in The Netherlands. We work on open-source projects.">
	<!-- Website resolution -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- Website title -->
	<title>CortexArts</title>
	<!-- Website icon -->
	<link rel="icon" href="assets/images/CA_ico.png" type="image/x-icon">
	
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
	<!-- Material Design stylesheet -->
	<link rel="stylesheet" href="assets/styles/material-design.css" />
	<!-- Custom stylesheet -->
	<link rel="stylesheet" href="assets/styles/main.css" />
	<!-- Font Awesome icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Material Design icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!-- Material Design script -->
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<script type="text/javascript">
function delayer(){
    window.location = "contact.html"
}
</script>

<body onLoad="setTimeout('delayer()', 5000)">
Thank you for contacting us. We will be in touch with you very soon.
</body>
<?php
 
}
else {
 echo "Please fill in the form correctly!";
}
?>