<style>

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
<?php
	require('../php-includes/connect.php');
include('../php-includes/check-login.php');


$get_userid = $_SESSION['userid'];


$get_userids = mysqli_query($con,"select * from user where account='$get_userid'");
						$result_get_userid  = mysqli_fetch_array($get_userids);
						$email = $result_get_userid['email'];
						

		$query=mysqli_query($con,"select * from message where userid='$email'");
		while($row=mysqli_fetch_array($query)){
	
		 
		   
		    echo '  <div class="container darker" style="width: 100%">
	
			<img src="../upload/profile.jpg" style="height:30px; width:30px; top:15px; left:10px;" class="right"> 
			<span style="font-size:18px; top:7px; left:15px;" class="right" ><strong>Guest </strong><i>'.date('M-d-Y h:i A',strtotime($row['date_sent'])+28800).'</i></span><br>
			<span style="font-size:20px; top:-2px; margin-right:-230px;" class="right">'. $row['message'].'</span>
		</div><br>';
		    
		
		   
	
	}	
?>