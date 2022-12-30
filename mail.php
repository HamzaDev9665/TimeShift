<?php 
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


function   outlooksmtp($emailR,$subject,$Body){
    $mail = new PHPMailer(true);
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "info@delfisoft.ma"; // Gmail address which you want to use as SMTP server
    $mail->Password = 'delfisoft'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '465' ;
    $mail->setFrom('info@delfisoft.ma'); // Gmail address which you used as SMTP server
    $mail->addAddress($emailR); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $Body;

    $mail->send();
    return "done";
  } catch (Exception $e){
    return "error";
  }

}




if(isset($_POST['send']))
{
   $name = $_POST['name'];
   $email = $_POST['email'];
   $tel = $_POST['tel'];
   $message = $_POST['message'];

   if(empty($name) || empty($email) || empty($tel) || empty($message))
   {
       header('location:index.php?error');
   }
   else
   {
       $to = "info@delfisoft.ma";

       if(outlooksmtp($email,$name,$message) =="done" )
       {
           header("location:contact.html");
       }
       else {
       header('location:contact.html');
       }
   }
}
else
{
         header("location:contact.html");
}
?>


