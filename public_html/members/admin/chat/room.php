				    	<?php
				    	error_reporting(0); 

	?>
	<?php

ini_set( "display_errors", 0); 
require('../php-includes/connect.php');
include('../php-includes/check-login.php');
?>

<?php

if(isset($_POST['chat_msg'])){
        $id=$_GET['id'];
    

$get_userids = mysqli_query($con,"select * from user where account='$id'");
						$result_get_userid  = mysqli_fetch_array($get_userids);
						$email = $result_get_userid['email'];
    $chat_msg = mysqli_real_escape_string($con,$_POST['chat_msg']);
   
	$date = date("Y-m-d");
	date_default_timezone_set("asia/manila");
	$time = time();



	
     $query = mysqli_query($con,"insert into message(`messages`,`userid`,`date_sent`,`status`,`to_receiver`) values('$chat_msg','$email', '$time','unread','admin')");
       mysqli_query($con,"UPDATE user SET message = '1' WHERE email = '$email';");
            
               
       
 
       
	if($query){
			echo '<script>;window.location.assign("chatroom.php");</script>';
		}
	

	
	}



?>
						    <style>
.body {
position: absolute;
  width: 100%;
  height: 200%;
  z-index: 15;
  top: 20%;
  left: 20%;
  margin: -100px 0 0 -150px;

}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
    margin-right: 50px;
 

}

.darker {
  border-color: #ccc;
  background-color: #ddd;
  margin-right: 50px;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60%;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}
.left {
  float: left;
  margin-right: 20px;
  margin-left:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
	
		<div class="col-lg-12">
            <div class="panel panel-default" style="height:50px;">
                
				<span style="font-size:22px; margin-left:10px; position:relative; top:13px;"><strong>Chat Room: <?php echo $chatrow['room_no']; ?></strong></span>
				<div class="pull-right" style="margin-right:10px; margin-top:7px;">
					
				
				
				</div>
				<div class="showme hidden" style="position: absolute; left:570px; top:20px;">
				
				</div>
			</div>
			<div>
				<div class="panel panel-default" style="height: 500px;">
					<div style="height:10px;"></div>
				
					<span style="font-size:18px; margin-left:10px;">
	

	
	
	</span>
					<div id="chat_area" class="col-lg-13" style="margin-left:10px; max-height:400px; overflow-y:scroll;">
					    

<?php
	require('../php-includes/connect.php');
include('../php-includes/check-login.php');




$get_userids = mysqli_query($con,"select * from user where account='$id'");
						$result_get_userid  = mysqli_fetch_array($get_userids);
						$email = $result_get_userid['email'];
	
		$query=mysqli_query($con,"select * from message where userid='$email' order by date_sent desc");
		while($row=mysqli_fetch_array($query)){
	
		 
		   
		 if($row['to_receiver'] == 'admin') 
		{
		   
		    echo '  <div class="container darker" style="width: 80%; margin-left:280px">
	
			<img src="upload/profile.jpg" style="height:30px; width:30px; top:15px; left:10px;" class="right"> 
			<span style="font-size:18px; top:7px; left:15px;" class="right" ><strong>You </strong><i>'.date('M-d-Y h:i A',strtotime($row['date_sent'])+28800).'</i></span><br>
			<span style="font-size:20px; top:-2px; margin-right:50px;" class="right">'. $row['messages'].'</span>
		</div><br>';
		    
		}
		
	
		else{
		     echo ' <div class="container" style="width: 80%; margin-right:280px"">
	
			<img src="upload/profile.jpg" style="height:30px; width:30px; top:15px; left:10px;">
			<span style="font-size:18px; top:7px; left:15px;"  class="left"><strong>admin </strong><i>'.date('M-d-Y h:i A',strtotime($row['date_sent'])+28800).'</i></span><br>
			<span style="font-size:20px;top:-2px; margin-left:50px;"> '. $row['messages'].'</span>
		</div> <br>
	
		';
		}
		
		?>
	
		<?php
		}

	
?>
					</div>
				</div>
				<form method="post">
			<div class="input-group" >
					<textarea type="text" class="form-control" style="font-size:20px;padding: 20px 0;" placeholder="Type message..." id="chat_msg" name="chat_msg">
					    </textarea>
					<span class="input-group-btn">
					<button class="btn btn-success" style="font-size:20px;" type="submit" id="send_msg" value="<?php echo $email; ?>">
					<span >💬</span> Send
					</button>
					</span>
				</div>
				
			</div>	
			</form>
		</div>