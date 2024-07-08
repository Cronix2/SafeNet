<?php
    require __DIR__ . '/../Include/env.php';

    $emailAddress_reciever = getenv('EMAIL_ADDRESS_RECIEVER');
    $emailAddress_sender = getenv('EMAIL_ADDRESS_SENDER');


    $to = $emailAddress_reciever;
    $subject = "Test mail";
    $message = "Hello! This is a simple email message.";
    
    $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: " . $emailAddress_sender . "\r\n";

    echo "FROM :" . $emailAddress_sender . "<br>";
    echo "TO :" . $to . "<br>";
    echo $subject . "<br>";
    echo $message . "<br>";

    if(mail($to, $subject, $message, $headers)){
        echo "Mail sent successfully";
    }else{
        echo "Mail not sent";
    }