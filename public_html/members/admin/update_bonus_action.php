<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

require('php-includes/connect.php');


if(isset($_POST['proceed'])){

    $userid = $_POST['userid'];

    $active1 = $_POST['active1'];
    $active2 = $_POST['active2'];
    $active3 = $_POST['active3'];
    $active4 = $_POST['active4'];
    $active5 = $_POST['active5'];
 

   

        
         	mysqli_query($con,"update bunos set active1='$active1',active2='$active2',active3='$active3',active4='$active4',active5='$active5' where userid='$userid'");
 
	
	echo '<script>alert("Notified successfully.");window.location.assign("update_bonus.php?rowid='.$userid.'");</script>';

}
