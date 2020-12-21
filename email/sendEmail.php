<?php
require '../vendor/autoload.php';

//test credentials
$sendEmail = new \SendGrid\Mail\Mail(); 
$sendEmail->setFrom("nicholasmallare@gmail.com", "BST Scholarship Committee");
$sendEmail->setSubject("B.S.T Scholarship");
$sendEmail->addTo("slicknicki@gmail.com", "Nick Mallare");
$sendEmail->addContent("text/plain", "$message");
$sendEmail->addContent(
    "text/html", "<strong>$message</strong>"
);
//key goes here
$sendgrid = new \SendGrid('');
try {
    $response = $sendgrid->send($sendEmail);
  
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>
