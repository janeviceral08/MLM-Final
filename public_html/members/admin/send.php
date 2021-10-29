<?php
ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('php-includes/connect.php');


if(isset($_POST['send'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
     $details = $_POST['details'];
    $id = $_POST['id'];
     $card_num = $_POST['card_num'];
    $tracking_number = $_POST['tracking_number'];
    $sender_name = $_POST['sender_name'];
    $paymaya_sender_name = $_POST['paymaya_sender_name'];
    $palawan_mobile = $_POST['palawan_mobile'];
    
    $gcash_mobile = $_POST['gcash_mobile'];
      $balance = $_POST['balance'];
    
    $date_processed = $_POST['date_processed'];
    $date = date("Y-m-d");
    $message = '<b>User Id:</b> '.$_POST['email'].' <br> <b>Details:</b> '.$_POST['details'].'<br> <b>Amount:</b> '.$_POST['amount'].' <br> <b>Transaction Fee:</b> '.$_POST['fee'].'<br> <b>Mode of Payout: </b>'.$_POST['mode'].' <br> <b>Date Processed:</b> '.$_POST['date_processed'].'<br><b>Date Approved:</b> '.$date.' <br><b> Amount:</b> '.$_POST['amount'].' <br><b> Remaining Balance:</b> '.$_POST['balance'].'';

    $filename = $_FILES['attachment']['name'];
    $location = 'attachment/' . $filename;
    move_uploaded_file($_FILES['attachment']['tmp_name'], $location);
    
    
    
    
    if($_POST['mode'] == "palawan express"){
        
        $message_palawan = '<b>User Id:</b> '.$_POST['email'].' <br><b> Details:</b> '.$_POST['details'].'<br><b> Amount: </b>'.$_POST['amount'].' <br> <b>Transaction Fee:</b> '.$_POST['fee'].'<br><b> Mode of Payout: </b>'.$_POST['mode'].' <br> <b>Date Processed:</b> '.$_POST['date_processed'].'<br><b>Date Approved:</b> '.$date.' <br> <b>Amount:</b> '.$_POST['amount'].'<br><b> Tracking Number: </b>'.$_POST['tracking_number'].'<br> <b>Sender Name:</b> '.$_POST['sender_name'].'<br><b> Sender Contact Number:</b> '.$_POST['palawan_mobile'].' <br> <b>Remaining Balance:</b> '.$_POST['balance'].'';
        
        
         	mysqli_query($con,"update payout_request set status='Approved', date_approved='$date', details='$details Tracking number: $tracking_number    Sender Name: $sender_name    Sender Contact Number: $palawan_mobile', note='The admin sent a copy of this transaction on your email $email' where id='$id'");
	
	echo '<script>alert("Sent successfully.");window.location.assign("view-payout-request.php");</script>';

    require 'vendor/autoload.php';

    
    $from = "mymlminfos@sbpzedcorp.com";
    $to = "jane.viceral@gmail.com";
    $subject = $date."Transaction Receipt";
    $message = $message_palawan;
    $headers = "From:" . $from;
    $mail->addAttachment($location, $filename);
    mail($to,$subject,$message,$mail, $headers);
    header('location:view-payout-request.php');
                              // Passing `true` enables exceptions
   
    header('location:view-payout-request.php');
}

    else if($_POST['mode'] == "paymaya"){
        
        $message_paymaya = '<b>User Id:</b> '.$_POST['email'].' <br> <b>Details:</b> '.$_POST['details'].'<br> <b>Amount: </b>'.$_POST['amount'].' <br> <b>Transaction Fee:</b> '.$_POST['fee'].'<br><b> Mode of Payout:</b> '.$_POST['mode'].' <br><b> Date Processed:</b> '.$_POST['date_processed'].'<br><b>Date Approved:</b> '.$date.' <br> <b>Amount:</b> '.$_POST['amount'].'<br><b> Card number of Sender:</b> '.$_POST['card_num'].'<br> <b>Sender Name:</b> '.$_POST['paymaya_sender_name'].' <br> <b>Remaining Balance:</b> '.$_POST['balance'].'';
        
        
         	mysqli_query($con,"update payout_request set status='Approved', date_approved='$date', details='$details Card number of Sender: $card_num    Sender: $paymaya_sender_name', note='The admin sent a copy of this transaction on your email $email' where id='$id'");
	
	echo '<script>alert("Sent successfully.");window.location.assign("view-payout-request.php");</script>';

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
        $mail->addAddress($email);              
        $mail->addReplyTo('mymlminfos@gmail.com');
        
        
        //Attachment
        if(!empty($filename)){
            $mail->addAttachment($location, $filename); 
        }
       
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $date;
        $mail->Body    = $message_paymaya;

        $mail->send();
        $_SESSION['message'] = 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }

    header('location:view-payout-request.php');
}

 else if($_POST['mode'] == "gcash"){
        
        $message_gcash = '<b>User Id:</b> '.$_POST['email'].' <br> <b>Details:</b> '.$_POST['details'].'<br> <b>Amount:</b> '.$_POST['amount'].' <br> <b>Transaction Fee:</b> '.$_POST['fee'].'<br> <b>Mode of Payout:</b> '.$_POST['mode'].' <br> <b>Date Processed:</b> '.$_POST['date_processed'].'<br><b>Date Approved:</b> '.$date.' <br> <b>Amount:</b> '.$_POST['amount'].'<br> <b>Sender Number: </b>'.$_POST['gcash_mobile'].' <br> <b>Remaining Balance:</b> '.$_POST['balance'].'';
        
        
         	mysqli_query($con,"update payout_request set status='Approved', date_approved='$date', details='$details    Sender Number: $gcash_mobile', note='The admin sent a copy of this transaction on your email $email' where id='$id'");
	
	echo '<script>alert("Sent successfully.");window.location.assign("view-payout-request.php");</script>';

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
        $mail->addAddress($email);              
        $mail->addReplyTo('mymlminfos@gmail.com');
        
        //Attachment
        if(!empty($filename)){
            $mail->addAttachment($location, $filename); 
        }
       
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $date;
        $mail->Body    = $message_gcash;

        $mail->send();
        $_SESSION['message'] = 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }

    header('location:view-payout-request.php');
}

        
    }

  
else{
    $_SESSION['message'] = 'Please fill up the form first';
    header('location:view-payout-request.php');
}