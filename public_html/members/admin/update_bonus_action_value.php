<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

require('php-includes/connect.php');

if(isset($_POST['proceed1'])){

    $userid = $_POST['userid'];

    $bonus1 = $_POST['bonus1'];
    	$date=date("Y-m-d");
   
        $get_userid = mysqli_query($con,"select * from income where userid='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$day_bal =$result_get_userid['day_bal']+ $bonus1;
						$current_bal =$result_get_userid['current_bal']+$bonus1;
						$total_bal =$result_get_userid['total_bal']+$bonus1;
						
							mysqli_query($con,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$userid', '$bonus1', '0','$date','Level 1 Bonus' )");
         
            mysqli_query($con,"update income set day_bal='$day_bal', current_bal='$current_bal', total_bal='$total_bal' where userid='$userid'");
		mysqli_query($con,"update bunos set bonus1='$bonus1' where userid='$userid'");
	echo '<script>alert("Sent successfully.");window.location.assign("update_bonus.php?rowid='.$userid.'");</script>';

}

if(isset($_POST['proceed2'])){

    $userid = $_POST['userid'];

    $bonus2 = $_POST['bonus2'];
   
        	$date=date("Y-m-d");
   
        $get_userid = mysqli_query($con,"select * from income where userid='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$day_bal =$result_get_userid['day_bal']+ $bonus2;
						$current_bal =$result_get_userid['current_bal']+$bonus2;
						$total_bal =$result_get_userid['total_bal']+$bonus2;
						
							mysqli_query($con,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$userid', '$bonus2', '0','$date','Level 2 Bonus' )");
         
            mysqli_query($con,"update income set day_bal='$day_bal', current_bal='$current_bal', total_bal='$total_bal' where userid='$userid'");
         	mysqli_query($con,"update bunos set bonus2='$bonus2' where userid='$userid'");
 
	
	echo '<script>alert("Sent successfully.");window.location.assign("update_bonus.php?rowid='.$userid.'");</script>';

}


if(isset($_POST['proceed3'])){

    $userid = $_POST['userid'];

    $bonus3 = $_POST['bonus3'];
   
        	$date=date("Y-m-d");
   
        $get_userid = mysqli_query($con,"select * from income where userid='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$day_bal =$result_get_userid['day_bal']+ $bonus3;
						$current_bal =$result_get_userid['current_bal']+$bonus3;
						$total_bal =$result_get_userid['total_bal']+$bonus3;
						
							mysqli_query($con,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$userid', '$bonus3', '0','$date','Level 3 Bonus' )");
         
            mysqli_query($con,"update income set day_bal='$day_bal', current_bal='$current_bal', total_bal='$total_bal' where userid='$userid'");
         	mysqli_query($con,"update bunos set bonus3='$bonus3' where userid='$userid'");
 
	
	echo '<script>alert("Sent successfully.");window.location.assign("update_bonus.php?rowid='.$userid.'");</script>';

}

if(isset($_POST['proceed4'])){

    $userid = $_POST['userid'];

    $bonus4 = $_POST['bonus4'];
   
        	$date=date("Y-m-d");
   
        $get_userid = mysqli_query($con,"select * from income where userid='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$day_bal =$result_get_userid['day_bal']+ $bonus4;
						$current_bal =$result_get_userid['current_bal']+$bonus4;
						$total_bal =$result_get_userid['total_bal']+$bonus4;
						
							mysqli_query($con,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$userid', '$bonus4', '0','$date','Level 4 Bonus' )");
         
            mysqli_query($con,"update income set day_bal='$day_bal', current_bal='$current_bal', total_bal='$total_bal' where userid='$userid'");
         	mysqli_query($con,"update bunos set bonus4='$bonus4' where userid='$userid'");
 
	
	echo '<script>alert("Sent successfully.");window.location.assign("update_bonus.php?rowid='.$userid.'");</script>';

}

if(isset($_POST['proceed5'])){

    $userid = $_POST['userid'];

    $bonus5 = $_POST['bonus5'];
   
        	$date=date("Y-m-d");
   
        $get_userid = mysqli_query($con,"select * from income where userid='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$day_bal =$result_get_userid['day_bal']+ $bonus5;
						$current_bal =$result_get_userid['current_bal']+$bonus5;
						$total_bal =$result_get_userid['total_bal']+$bonus5;
						
							mysqli_query($con,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$userid', '$bonus5', '0','$date','Level 5 Bonus' )");
         
            mysqli_query($con,"update income set day_bal='$day_bal', current_bal='$current_bal', total_bal='$total_bal' where userid='$userid'");
         	mysqli_query($con,"update bunos set bonus5='$bonus5' where userid='$userid'");
 
	
	echo '<script>alert("Sent successfully.");window.location.assign("update_bonus.php?rowid='.$userid.'");</script>';

}
