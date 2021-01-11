<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;     

    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';



       $name = $_POST['name'];
       $email = $_POST['email'];
       $message = $_POST['message'];
       header('Content-Type: application/json');
       if ($name === ''){
       print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
       exit();
       }
       if ($email === ''){
       print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
       exit();
       } else {
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
       print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
       exit();
       }
       }
       if ($message === ''){
       print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
       exit();
       }

   
   
    $mail = new PHPMailer();

    /*$mail->isSMTP(); 
    $mail->Host = "smtp.gmail.com"; 
    $mail->SMTPAuth = true; 
    $mail->Port = 587;
    $mail->Username = "yourmaile@gmail.com"; 
    $mail->Password = '********'; 
    $mail->SMTPSecure = 'tls'; */  

    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAddress("foss.rajarata@gmail.com");
    $mail->isHTML(true);
    $mail->Subject='Form Submission From Web';
    $mail->Body='<h3>Name :'.$_POST['name'].'<br> Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</h3>';;

    if($mail->Send())
    {
       print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
       exit(); 
       
    }
    else
    {
       print json_encode(array('message' => 'Something went Wrong.Please try again.', 'code' => 0));
       exit(); 
    }
       $mail->smtpClose();


?>




