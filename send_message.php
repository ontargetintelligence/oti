<?php

require_once('phpmailer/PHPMailerAutoload.php');

$name       = "";
$email    	= "";
$message    = "";
$newsletter = 0;

//Set the variables based on POST parameters
foreach ($_POST as $key => $value) {
    if(isset($_POST[$key])) {
        ${$key} = $value;
    }
}

$data = '{"name": "'.$name.'", "email": "'.$email.'", "message": "'.$message.'"}';

//Create a new PHPMailer instance
$mail = new PHPMailer();

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
$mail->Host = 'p3plcpnl0086.prod.phx3.secureserver.net';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "pat.grant@ontargetintelligence.ca";

//Password to use for SMTP authentication
$mail->Password = "?IcmT=P&wR4.";

//Set who the message is to be sent from
$mail->setFrom('pat.grant@ontargetintelligence.ca', 'Website Contact Form');

//Set an alternative reply-to address
$mail->addReplyTo('pat.grant@ontargetintelligence.ca', 'Do Not Reply');

//Set who the message is to be sent to
$mail->addAddress('pat.grant@ontargetintelligence.ca', 'Patrick Grant');

//Set the subject line
$mail->Subject = 'Mail from website contact form';

//Set the mail body
$mail->Body = $data;

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    header("Status: 404");
} else {
    echo "Message sent!";
}

?> 