<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../php-includes/connect.php');


if(isset($_POST['send'])){

    $emails = $_POST['emails'];
    $subject = $_POST['subject'];
     $answer = $_POST['answer'];
      $question = $_POST['question'];
    $id = $_POST['id'];
    $oursubject ='Leafy Root Foods INC. Answered your Question';
    $date = date("Y-m-d");
    $message = 'Hello! Good day Mr./Ms.: '.$_POST['subject'].' <br> Question <br> '.$_POST['question'].'<br> <br> Answer <br> '.$_POST['answer'].'  ';

    $filename = $_FILES['attachment']['name'];
    $location = 'attachment/' . $filename;
    move_uploaded_file($_FILES['attachment']['tmp_name'], $location);
    
    

        
        
         	mysqli_query($con,"update questions set status='Answered', date_answered='$date', answer='$answer' where id='$id'");
	
	echo '<script>alert("Sent successfully.");window.location.assign("message.php");</script>';

    //Load composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mymlminfos@gmail.com';     // Your Email/ Server Email
        $mail->Password = 'm1m1n70s';                     // Your Password
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('mymlminfos@gmail.com');
        
        //Recipients
        $mail->addAddress($emails);              
        $mail->addReplyTo('mymlminfos@gmail.com');
        
        
        //Attachment
        if(!empty($filename)){
            $mail->addAttachment($location, $filename); 
        }
       
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $oursubject;
        $mail->Body    = $message;

        $mail->send();
        $_SESSION['message'] = 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }

    header('location:message.php');


        
    }