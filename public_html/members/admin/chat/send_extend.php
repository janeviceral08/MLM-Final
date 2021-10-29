<?php
	include('../../../db.php');
	session_start();
	if(isset($_POST['extend'])){		
		$msg=$_POST['extend'];
		$id=$_POST['id'];
		mysqli_query($con,"insert into `chat` (userid, chatroomid, message, chat_date, read_stat,hotel_id, sender) values ('0', '$id', '$msg' ,  NOW(), 1,1, 'guest')") or die(mysqli_error());
		mysqli_query($con,"UPDATE chatroom SET latest_message = '$msg', time_last = NOW(), fromwhom = 1  where chatroomid='$id'");
			mysqli_query($con,"UPDATE rooms SET message_no = message_no + 1 where chatroom='$id'");
			header("location: chatroom.php");
	}
?>