<?php

$emails = array(
"tobiwily@yahoo.com",
"daviking95@gmail.com",
//....as many email address as you need
);

foreach($emails as $email) {

$to      =  $email;
$subject = 'the subject';
$message = 'This is a test cron job to run every minute.';
mail($to, $subject, $message, $headers);

}

?>