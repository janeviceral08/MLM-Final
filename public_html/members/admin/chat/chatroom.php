<?php
include('../php-includes/connect.php');
include('../php-includes/check-login.php');
include('../ChromePhp.php');

$id=$_GET['id'];


$get_userid = mysqli_query($con,"select * from user where email='$id'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$userid = $result_get_userid['email'];
 mysqli_query($con,"UPDATE user SET message = '2' WHERE email = '$id';");
  mysqli_query($con,"UPDATE message SET status = 'read' WHERE userid = '$id';");
?>


<?php

if(isset($_POST['chat_msg'])){
        $id=$_GET['id'];
    
    $chat_msg = mysqli_real_escape_string($con,$_POST['chat_msg']);
   
	$date = date("Y-m-d");
	date_default_timezone_set("asia/manila");
	$time = time();



	
     $query = mysqli_query($con,"insert into message(`messages`,`userid`,`date_sent`,`status`,`to_receiver`) values('$chat_msg','$id', NOW(),'unread','$id')");
       mysqli_query($con,"UPDATE user SET message = '1' WHERE email = '$email' and to_receiver = 'admin';");
            
               
       
 
       
	if($query){
			echo '<script>;window.location.assign("chatroom.php?id='.$id.'");</script>';
		}
	

	
	}



?>

<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Leafy Root Foods Inc. Website  - Join</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 
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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-13">
                         <div class="row">
	<div class="col-lg-12">
            <div class="panel panel-default" style="height:50px;">
                
				<span style="font-size:22px; margin-left:10px; position:relative; top:13px;"><strong>Chat Room: <?php echo $result_get_userid['first_name'].' '.$result_get_userid['middle_name'].' '.$result_get_userid['last_name']; ?></strong></span>
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
$id=$_GET['id'];

$get_userids = mysqli_query($con,"select * from user where account='$id'");
						$result_get_userid  = mysqli_fetch_array($get_userids);
						$emails = $result_get_userid['email'];
	
		$query=mysqli_query($con,"select * from message where userid='$id' order by date_sent desc");
		while($row=mysqli_fetch_array($query)){
	
		 
		   
		 if($row['to_receiver'] != 'admin') 
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
			<span style="font-size:18px; top:7px; left:15px;"  class="left"><strong>'.$result_get_userid['first_name'].' '.$result_get_userid['middle_name'].' '.$result_get_userid['last_name'].' </strong><i>'.date('M-d-Y h:i A',strtotime($row['date_sent'])+28800).'</i></span><br>
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
	</div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
               
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
