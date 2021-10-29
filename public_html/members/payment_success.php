<?php
include('php-includes/check-login.php');
	include('php-includes/connect.php');
	if(!isset($_SESSION['userid'])){
	header('Location:index.php');
	}
	$uid=$_SESSION['userid'];
		$sql_user = "SELECT * FROM user WHERE account = '$uid'";
				$run_query_user = mysqli_query($con,$sql_user);
				$row_user = mysqli_fetch_array($run_query_user);
					$user_email = $row_user["email"];
	
	
	
	$sql="SELECT * FROM customer_order JOIN user ON customer_order.uid = user.email  WHERE customer_order.uid='$user_email' ORDER BY customer_order.id DESC limit 1";
	$run_query=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($run_query);
	$trid=$row['tr_id'];
	$mobile=$row['mobile'];
	$full_name=$row['first_name']. " " .$row['middle_name']. " ".$row['last_name'];
	
	$sqls="SELECT SUM(p_total) as total FROM customer_order WHERE tr_id='$trid'";
	$run_querys=mysqli_query($con,$sqls);
	$rows=mysqli_fetch_array($run_querys);
		$total=$rows['total'];

 ?>
 
 
 
 <?php
if(isset($_POST['payout_request'])) {

if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
	
	$trid = mysqli_real_escape_string($con,$_POST['trid']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	
		$mode = mysqli_real_escape_string($con,$_POST['mode']);
	$amount = mysqli_real_escape_string($con,$_POST['amount']);
    $date = date("y-m-d");
    $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
	  date_default_timezone_set("asia/manila");
	$date = date("Y-m-d H:i:s");

		$query1 = mysqli_query($con,"select * from customer_order where uid='$user_email'");
						$result = mysqli_fetch_array($query1);
	
	
	if($trid != null || $trid != '' || $trid != ' ')
	{
        //Insert the value 
    
                $query = mysqli_query($con,"INSERT INTO order_history_details(user_id,tr_id,date_transac,address,mode,details,status,amount,tracking_number,date_process, imageType,imageData) VALUES ('$user_email','$trid','$date','$address','$mode','Follow Up','To be Process','$amount', ' ', '0000-00-00 00:00:00','{$imageProperties['mime']}', '{$imgData}')");
                $sql3="DELETE FROM cart WHERE user_id='$user_email'";
		$run_query3=mysqli_query($con,$sql3);
            
       	if($query){
			echo '<script>alert("Order sent successfully");window.location.assign("products.php");</script>';
		}
		else{
			//echo mysqli_error($con);
		echo '<script>alert("something went wrong try again");window.location.assign("payment_success.php");</script>';

		}     
           

}
  
}
else{
    echo '<script>alert("Please fill all the fields");</script>';
}
}






?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<style type="text/css">
		.content{
			display: none;
		}
	</style>
</head>
<body>
	<div class='content'>
		<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">MLM</a>
			</div>

			
		</div>
	</div>
	<br><br><br><br><br>
	<div class='container-fluid'>
		<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>
			<div class="panel panel-default">
  				<div class="panel-heading"><h4>Thank you <?php echo $user_email ?>! </h4>
  				<p> Please proceed on filling up the additional information to verify your orders </p></div>
  				<div class="panel-body">
    			
    				<br>Your Transaction ID is <?php echo $trid; ?> 
    			
    				
    				<p></p>
    				
    				<form name="frmOne" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
    				      <div class="form-group">
                            <label for="sel1">transaction id:</label>
                            	<input type="text" name = "trid" value="<?php echo $trid; ?> " class="form-control" readonly>
                            </div>
                            <div class="form-group">
                            <label for="sel1">Receiver Name:</label>
                            	<input type="text" value="<?php echo $full_name; ?> " class="form-control" readonly>
                            </div>
                                                        <div class="form-group">
                            <label for="sel1">Receiver Number:</label>
                            	<input type="text" value="<?php echo $mobile; ?> " class="form-control" readonly>
                            </div>
                            <div class="form-group">
                            <label for="sel1">Amount:</label>
                            	<input type="text" name = "amount" value="<?php echo $total; ?> " class="form-control" readonly>
                            </div>
                             <div class="form-group">
                            <label for="sel1">Delivery Address:</label>
                            	<input type="text" name = "address" class="form-control">
                            </div>
            <div class="form-group">
                            <label for="sel1">Receipt Image</label>
                            <input name="userImage" type="file" class="inputFile" />
                            </div>
                          
  <div class="form-group">
                <label for="sel1">Mode of payment:</label>
                
                            <select  class="form-control" name="mode">

                                <option value="Western Union"> Western Union</option>
                    <option value="Mlhuillier"> Mlhuillier</option>
                    <option value="Cebuana "> Cebuana </option>
                    <option value="Palawan Express"> Palawan Express</option>
                    <option value="LBC Remit"> LBC Remit</option>
                    <option value="Gcash"> Gcash</option>
                    <option value="Coins.ph"> Coins.ph</option> 
                    <option value="BDO"> BDO</option>
                </select>
                            </div>
          
            </div>


      
         
      
      	<input type="submit" name="payout_request" class="btn btn-primary" value='Submit'>
    

        


</form>
    				
    				
    			
  				</div>
			</div>
		<div class='col-md-2'></div>
	</div>

	</div>

	</div>
	</div>
	<!--Pre-loader -->
	<div class="preload"><img src="assets/images/loading.gif" style="width:400px;
    height: 400px;
    position: relative;
    top: 0px;
    left: 469px;"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	<script>
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'none';
        document.getElementById('gcash').style.display = 'contents';
              document.getElementById('palawan').style.display = 'none';
    }
    else if (document.getElementById('gcashCheck').checked) {
        document.getElementById('gcash').style.display = 'none';
         document.getElementById('ifYes').style.display = 'none';
                   document.getElementById('palawan').style.display = 'contents';
    }
     else if (document.getElementById('noCheck').checked) {
        document.getElementById('gcash').style.display = 'none';
                  document.getElementById('palawan').style.display = 'none';
         document.getElementById('ifYes').style.display = 'contents';
    }

}



</script>
	
	
	<script type="text/javascript">
		
    	
    	$(".preload").fadeOut(5000, function(){
        $(".content").fadeIn(500);        	
		}); 

	</script>
</body>
</html>