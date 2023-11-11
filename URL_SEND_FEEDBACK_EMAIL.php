<?php
  
  date_default_timezone_set('Asia/Manila');
    
    include 'config.php';
     
    $conn = mysqli_connect($servername, $username, $password, $dbname);

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';
  
  $email = $_POST['email'];
  $feedback_id = $_POST['feedback_id'];
  
  $mail = new PHPMailer(true);
      
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'applicationfeedbox@gmail.com';
      $mail->Password = 'aenxacuixumaabpf';
      
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      
      $mail->addAddress($email);
      $mail->setFrom($email);
      
      $mail->isHTML(true);
      
      $mail->Subject = 'FeedBox Feedback Update';
      $mail->Body = 'Your Feedback is in progress';
      
      $mail->send();
      
          
    $sql = "UPDATE feedback SET 
    status = 'In Progress'
    
    WHERE feedback_id='".$feedback_id."'";
    
    $conn->query($sql);

$conn->close();
?>