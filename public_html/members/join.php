
<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
include('ChromePhp.php');
error_reporting(0);
$get_user = $_SESSION['userid'];



$get_userid = mysqli_query($con,"select * from user where account='$get_user'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$userid = $result_get_userid['email'];
$get_userid_pin = mysqli_query($con,"select * from pin_list where userid='$get_user' and status='open' limit 1");
						$result_get_userid_pin  = mysqli_fetch_array($get_userid_pin );
						$userid_pin = $result_get_userid_pin['pin'];
										
						
$capping = 5000000;
?>
<?php
//User cliced on join
if(isset($_POST['join_user'])){
	$side='';
	$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
	$middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
	$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
	$gender = mysqli_real_escape_string($con,$_POST['gender']);
	$birthdate = mysqli_real_escape_string($con,$_POST['birthdate']);
	
	 $pin= substr(rand(100000,999999), 3);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$side = mysqli_real_escape_string($con,$_POST['side']);
	$password = rand(100000,999999);
	$mobile2 = mysqli_real_escape_string($con,$_POST['mobile2']);
		$fb = mysqli_real_escape_string($con,$_POST['fb']);
		$beneficiary = mysqli_real_escape_string($con,$_POST['beneficiary']);
	$beneficiary_contact = mysqli_real_escape_string($con,$_POST['beneficiary_contact']);
	$beneficiary_Address = mysqli_real_escape_string($con,$_POST['beneficiary_Address']);
		$deliver = mysqli_real_escape_string($con,$_POST['deliver']);
			$work_address = mysqli_real_escape_string($con,$_POST['work_address']);
				$region = mysqli_real_escape_string($con,$_POST['region']);
	
	
	
	$under_userid = $userid;
	ChromePhp::log($side);
	$flag = 0;
$str=time();


 $t= substr($str, -5);


	$level = getUserLevel($under_userid);
	
	if($email!='' && $mobile!='' && $address!='' && $side!=''&& $region!=''){
	
			//Pin is ok
			if(email_check($email)){
				//Email is ok
				if(!email_check($under_userid)){
					//Under userid is ok
					if(side_check($under_userid,$side)){
						//Side check
						$flag=1;
						
						
						
					}
					else{
		echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> The Side you selected is NOT AVAILABLE
				</div>";
					}
				}
				else{
					//check under userid
				echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Invalid Under User ID
				</div>";
				}
			}
			else{
				//check email
				echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Sorry!</strong> Email is Unavailable
				</div>";
			}
	
	}
	else{
		//check all fields are fill
	echo "<div class='alert alert-danger' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  					<strong>Please</strong> Fill All the Fields!
				</div>";
	}
	
	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
	if($flag==1){
		$date=date("Y-m-d");
		//Insert into User profile
		$query = mysqli_query($con,"insert into user(`last_name`,`middle_name`,`first_name`,`email`,`password`,`mobile`,`address`,`birthday`,`account`,`under_userid`,`side`,`user_level`,`date_entered`,`birthdate`,`gender`,`beneficiary`,`beneficiary_contact`,`beneficiary_address`,`mobile2`,`facebook`,`date_activated`,`delivery_address`,`work_address`,`region`) values('$last_name','$middle_name','$first_name','$email','$password','$mobile','$address', '$birthdate','$pin-$t','$userid','$side','$level','$date','$birthdate','$gender','$beneficiary','$beneficiary_contact','$beneficiary_Address','$mobile2', '$fb','0000-00-00 00:00:00', '$deliver', '$work_address', '$region')");
			 
		$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");
		
		
		echo mysqli_error($con);
		
					echo '<script>window.location.replace("tree.php");</script>';
	}
	
}
?>
<?php 
//functions
function pin_check($pin){
	global $con,$get_user;
	
	$query =mysqli_query($con,"select * from pin_list where pin='$pin' and userid='$get_user' and status='open'");
	if(mysqli_num_rows($query)>0){
		return true;
	}
	else{
		return false;
	}
}
function email_check($email){
	global $con;
	
	$query =mysqli_query($con,"select * from user where email='$email'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}
function side_check($email,$side){
	global $con;
	
	$query =mysqli_query($con,"select * from tree where userid='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result[$side];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}
function bunos($userid){
	global $con;
	$bunos = array();
	$query = mysqli_query($con,"select * from bunos where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$bunos['bunos_count'] = $result['bunos_count'];

	
	return $bunos;
}
function getUnderId($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
}
function getUserLevel($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['user_level'] + 1; 
}



?>

<!DOCTYPE html>
<html lang="en">

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

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <h2>Pay only When the Product is Received</h2>
                        <h1 class="page-header">Distributor's Request</h1>
                     
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    
                	<div class="col-lg-4">
                
                    	<form method="post" name="MyForm">
                    	    	 
                    	        <div class="form-group">
                                <label>Account ID</label>
                                <input type="text" name="accountID" value='<?php echo $get_user ?>' style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control"  readonly>
                            </div>
                             
                              <div class="form-group">
                                <label>First name</label>
                                <input type="text" name="first_name" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name="middle_name" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                             <div class="form-group">
                                <label>Last name</label>
                                <input type="text" name="last_name" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Gender</label>
                                <input type="radio" name="gender" style="width:25px; height:25px;" value="Male" checked> Male
                                <input type="radio" name="gender" style="width:25px; height:25px;" value="Female"> Female
                                
                               
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                            
                              <div class="form-group">
                                <label>Alternative Mobile Number</label>
                                <input type="text" name="mobile2" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" >
                            </div>
                              <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="fb" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email"  style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control"  required>
                                <div id="uname_response" ></div>
                            </div>
                             <div class="form-group">
                                <label>Birth Date</label>
                                <input type="date" name="birthdate" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Home Address</label>
                                <input type="text" name="address" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Work Address</label>
                                <input type="text" name="work_address" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control">
                            </div>
                             <div class="form-group">
                                <label>Province</label>
                              <select name="region"  onchange="myFunction(event)" required style=" border-radius: 25px; width: 100%; height: 50px; border-color: #0e8239; background: white">
                                    <option value="" disabled selected>Choose Region</option>
                                     <?php
									$i=1;
									$query = mysqli_query($con,"select * from refprovince ORDER BY provDesc asc");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
										
										?>
                                        <option value="<?php echo $row['regCode']?>"><?php echo $row['provDesc']?></option>
                                        <?php
										
										}
									}
								?>
                                   
                                  
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Deliver To</label>
                                <input type="radio" name="deliver" style="width:25px; height:25px;" value="Home Address" checked> Home Addres
                                <input type="radio" name="deliver" style="width:25px; height:25px;" value="Work Address"> Work Address
                                
                               
                            </div>
                            
                             <div class="form-group">
                                <label>Beneficiary Name</label>
                                <input type="text" name="beneficiary" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                             <div class="form-group">
                                <label>Beneficiary Contact Information</label>
                                <input type="text" name="beneficiary_contact" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                             <div class="form-group">
                                <label>Beneficiary Address</label>
                                <input type="text" name="beneficiary_Address" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control" required>
                            </div>
                             <div class="form-group">
                                <label>Product Cost</label>
                              <input type="text" value="2,000" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control"  readonly>
                            </div>
                              <div class="form-group">
                                <label>Shipping Fee (COD)</label>
                              <input  type="text" id="myText" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control"  readonly>
                            </div>
                             <div class="form-group">
                                <label>Total Payment</label>
                              <input type="text" id="totalpayment" style="font-size: 22px; border-color : #0e8239; padding: 21px; border-radius: 25px;" class="form-control"  readonly>
                            </div>
                            <div class="form-group">
                                <label>Side</label><br>

                         <?php 
                         
                         	$users_email = $result_get_userid['email'];
						$get_tree_A = mysqli_query($con,"SELECT COUNT(A) AS CA FROM tree where userid='$users_email'");
						$result_get_tree_A  = mysqli_fetch_array($get_tree_A);
						$get_tree_result_A = $result_get_tree_A['CA'];
						
						$get_tree_B = mysqli_query($con,"SELECT COUNT(B) AS CB FROM tree where userid='$users_email'");
						$result_get_tree_B  = mysqli_fetch_array($get_tree_B);
						$get_tree_result_B = $result_get_tree_B['CB'];
						
						$get_tree_C = mysqli_query($con,"SELECT COUNT(C) AS CC FROM tree where userid='$users_email'");
						$result_get_tree_C  = mysqli_fetch_array($get_tree_C);
						$get_tree_result_C = $result_get_tree_C['CC'];
						
							$get_tree_D = mysqli_query($con,"SELECT COUNT(D) AS CD FROM tree where userid='$users_email'");
						$result_get_tree_D  = mysqli_fetch_array($get_tree_D);
						$get_tree_result_D = $result_get_tree_D['CD'];
						
							$get_tree_E = mysqli_query($con,"SELECT COUNT(E) AS CE FROM tree where userid='$users_email'");
						$result_get_tree_E  = mysqli_fetch_array($get_tree_E);
						$get_tree_result_E = $result_get_tree_E['CE'];
						
							$get_tree_F = mysqli_query($con,"SELECT COUNT(F) AS CF FROM tree where userid='$users_email'");
						$result_get_tree_F  = mysqli_fetch_array($get_tree_F);
						$get_tree_result_F = $result_get_tree_F['CF'];
						
							$get_tree_G = mysqli_query($con,"SELECT COUNT(G) AS CG FROM tree where userid='$users_email'");
						$result_get_tree_G  = mysqli_fetch_array($get_tree_G);
						$get_tree_result_G = $result_get_tree_G['CG'];
						
							$get_tree_H = mysqli_query($con,"SELECT COUNT(H) AS CH FROM tree where userid='$users_email'");
						$result_get_tree_H  = mysqli_fetch_array($get_tree_H);
						$get_tree_result_H= $result_get_tree_H['CH'];
						
							$get_tree_I = mysqli_query($con,"SELECT COUNT(I) AS CI FROM tree where userid='$users_email'");
						$result_get_tree_I  = mysqli_fetch_array($get_tree_I);
						$get_tree_result_I= $result_get_tree_I['CI'];
						
							$get_tree_J = mysqli_query($con,"SELECT COUNT(J) AS CJ FROM tree where userid='$users_email'");
						$result_get_tree_J  = mysqli_fetch_array($get_tree_J);
						$get_tree_result_J= $result_get_tree_J['CJ'];
						
							$get_tree_K = mysqli_query($con,"SELECT COUNT(K) AS CK FROM tree where userid='$users_email'");
						$result_get_tree_K  = mysqli_fetch_array($get_tree_K);
						$get_tree_result_K= $result_get_tree_K['CK'];
						
							$get_tree_L = mysqli_query($con,"SELECT COUNT(L) AS CL FROM tree where userid='$users_email'");
						$result_get_tree_L  = mysqli_fetch_array($get_tree_L);
						$get_tree_result_L= $result_get_tree_L['CL'];
						
						
			     	
			     		
			     		if($result_get_tree_A['CA'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="A" disabled> A';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="A" > A';
			     		}
			     		
			     			if($result_get_tree_B['CB'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="B" disabled> B';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="B" > B';
			     		}
			     		
			     			if($result_get_tree_C['CC'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="C" disabled> C';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="C" > C';
			     		}
			     			if($result_get_tree_D['CD'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="D" disabled> D';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="D" > D';
			     		}
			     			if($result_get_tree_E['CE'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="E" disabled> E';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="E" > E';
			     		}
			     			if($result_get_tree_F['CF'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="F" disabled> F';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="F" > F';
			     		}
			     			if($result_get_tree_G['CG'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="G" disabled> G';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="G" > G';
			     		}
			     			if($result_get_tree_H['CH'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="H" disabled> H';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="H" > H';
			     		}
			     			if($result_get_tree_I['CI'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="I" disabled> I';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="I" > I';
			     		}
			     			if($result_get_tree_J['CJ'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="J" disabled> J';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="J" > J';
			     		}
			     			if($result_get_tree_K['CK'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="K" disabled> K';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="K" > K';
			     		}
			     		
			     			if($result_get_tree_L['CL'] >0){
			     		    echo'
                                <input type="radio" name="side" style="width:25px; height:25px;" value="L" disabled> L';
                    
			     		}
			     		else{
			     		    echo'<input type="radio" name="side" style="width:25px; height:25px;" value="L" > L';
			     		}
			     		
						?> 
					
                                
                                
                                
                                
                         
                            </div>
                            
                            <div class="form-group">
                          	<input type="submit" name="join_user" class="btn btn-primary" value="Join" onclick="javascript:document.MyForm.join_user.value='Please Wait...'" style="width: 100px; height: 50px; font-size: 25px">
                          	
                        </div>
                        </form>
                        
                    </div>
                    
                </div><!--/.row-->
                
            </div>
    
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
<script>
    function myFunction(e) {
 if(e.target.value == '01' || e.target.value == '02'|| e.target.value == '03'|| e.target.value == '04'|| e.target.value == '17'|| e.target.value == '05'|| e.target.value == '13'|| e.target.value == '14'){
 document.getElementById("myText").value = '135',
  document.getElementById("totalpayment").value = '2,135'
 }
 else if(e.target.value == '09' || e.target.value == '10'|| e.target.value == '11'|| e.target.value == '12'|| e.target.value == '15'|| e.target.value == '16'){
 document.getElementById("myText").value = '105',
   document.getElementById("totalpayment").value = '2,105'
 }
     else if(e.target.value == '06' || e.target.value == '07'|| e.target.value == '08'){
 document.getElementById("myText").value = '125',
   document.getElementById("totalpayment").value = '2,125'
 }
 
}
</script>

<script>  
 $(document).ready(function(){  
   $('#email').blur(function(){

     var email = $(this).val();

     $.ajax({
      url:'check_email.php',
      method:"POST",
      data:{email:email},
      success:function(data)
      {
       if(data != '0')
       {
        $('#uname_response').html('<span class="text-danger">Email not available</span>');
  
       }
       else
       {
        $('#uname_response').html('<span class="text-success">Email Available</span>');
     
       }
      }
     })

  });
 });  
</script>
     
</body>

</html>
