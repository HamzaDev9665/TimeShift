<?php 

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
       $to = "hamzadyna541@gmail.com";

       if(mail($to,$name,$message,$email))
       {
           header("location:index.php?success");
       }
   }
}
else
{
    header("location:index.php");
}
?>