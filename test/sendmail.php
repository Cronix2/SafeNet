<?php
    require __DIR__ . '/../Include/env.php';

    $emailAddress = getenv('EMAIL_ADDRESS');


    $to = $emailAddress;
    $subject = "Test mail";
    $message = "Hello! This is a simple email message.";
    
    $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";

    if(mail($to, $subject, $message, $headers)){
        echo "Mail sent successfully";
    }else{
        echo "Mail not sent";
    }