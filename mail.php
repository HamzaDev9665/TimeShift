<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];
    $to = "hamzaloza@mailna.co";

    $headers = "From: ".$name."\r\n"."CC:hamzaloza@mailna.co";
    $txt ="You have reciverd an e-mail from".$name."\r\n"."Email: ".$email."Message: ".$message;

    if($email != NULL){
        mail($to,$name,$message,$email);
    }

?>