<?php
include('../../php-includes/check-login.php');
include('../conn.php');
$get_user = $_SESSION['userid'];

$get_userid = mysqli_query($conn,"select * from user where account='$get_user'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$userid = $result_get_userid['email'];
	if(isset($_POST['fetch'])){
		$id =$_POST['id'];
		
		$query=mysqli_query($conn,"select * from message where userid='$id'");
		while($row=mysqli_fetch_array($query)){
	echo "	<div>
			<img src='upload/profile.jpg' style='height:30px; width:30px; position:relative; top:15px; left:10px;'>
			<span style='font-size:10px; position:relative; top:7px; left:15px;'><i> </i></span><br>
			<span style='font-size:11px; position:relative; top:-2px; left:50px;'><strong>sadf</strong>: asd</span><br>
		</div>
		<div style='height:5px;'></div>";
		}
	}	
?>