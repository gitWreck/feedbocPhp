<?php
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';
  
  $verification_code = $_POST['verification_code'];
  $email = $_POST['email'];
  
  $mail = new PHPMailer(true);
      
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'applicationfeedbox@gmail.com';
      $mail->Password = 'aenxacuixumaabpf';
      // $mail->Username = 'jrqconnect@gmail.com';
      // $mail->Password = 'rgbieypenmyzscpg';
      
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      
      $mail->addAddress($email);
      $mail->setFrom($email);
      
      $mail->isHTML(true);
      
      $mail->Subject = 'FeedBox Verification Code';
      $mail->Body = 'Your Verification Code is '.$verification_code;
      
      $mail->send();
?>