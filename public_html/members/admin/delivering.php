<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$product_amount = 2000;

?>
<?php
//Clicked on send buton
if(isset($_POST['send'])){
    						
$capping = 5000000;
	$userid = mysqli_real_escape_string($con,$_POST['userid']);
$get_userid = mysqli_query($con,"select * from user where account='$userid'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
	
	$pin =$result_get_userid['account'];
		$side = $result_get_userid['side'];
	$email = $result_get_userid['email'];
	$under_userid = $result_get_userid['under_userid'];;
		//Update count and Income.
		$temp_under_userid = $under_userid;
	
		$date=date("Y-m-d");
		$level = getUserLevel($under_userid);
			$query = mysqli_query($con,"update user set is_active='Confirmed', date_activated = '$date' where account='$userid' limit 1");
		//Insert into Tree
		//So that later on we can view tree.
		$query = mysqli_query($con,"insert into tree(`userid`,`user_level`) values('$email', '$level')");
		$query = mysqli_query($con,"insert into bunos(`userid` ) values('$email')");
		$query = mysqli_query($con,"insert into payment_method(`userid` ) values('$email')");
		//Insert to side
		$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");
		//updatelast movement
		$query = mysqli_query($con,"update user set last_movement='$date' where email='$under_userid'");
		//Update pin status to close
		$query = mysqli_query($con,"update pin_list set status='close' where pin='$pin'");
		
		//Inset into Icome
	$query = mysqli_query($con,"insert into income (`userid`,`under_userid`) values('$email','$userid')");
		echo mysqli_error($con);
		
		
	$flag = 1;
		$temp_side_count = $side.'count'; //leftcount or rightcount
		
		$temp_side = $side;
		$total_count=1;
		$i=1;
		while($total_count>0){
			$i;
			$q = mysqli_query($con,"select * from tree where userid='$temp_under_userid'");
			$r = mysqli_fetch_array($q);
			$current_temp_side_count = $r[$temp_side_count]+1;
			$temp_under_userid;
			$temp_side_count;
			mysqli_query($con,"update tree set `$temp_side_count`=$current_temp_side_count where userid='$temp_under_userid'");
			
			//income
			if($temp_under_userid!=""){
				$income_data = income($temp_under_userid);
				$bunos_data = bunos($temp_under_userid);
				//check capping
				//$income_data['day_bal'];
				if($income_data['day_bal']<$capping){
					$tree_data = tree($temp_under_userid);
					
					//check leftplusright
					//$tree_data['leftcount'];
					//$tree_data['rightcount'];
					//$leftplusright;
					
					$temp_A_count = $tree_data['Acount'];
					$temp_B_count = $tree_data['Bcount'];
					$temp_C_count = $tree_data['Ccount'];
					$temp_D_count = $tree_data['Dcount'];
					$temp_E_count = $tree_data['Ecount'];
					$temp_F_count = $tree_data['Fcount'];
					$temp_G_count = $tree_data['Gcount'];
					$temp_H_count = $tree_data['Hcount'];
					$temp_I_count = $tree_data['Icount'];
					$temp_J_count = $tree_data['Jcount'];
					$temp_K_count = $tree_data['Kcount'];
					$temp_L_count = $tree_data['Lcount'];

					
				
					$user_Compensation = userCompensation($i);
				
					$new_day_bal = $income_data['day_bal']+ $user_Compensation;
					$new_current_bal = $income_data['current_bal']+ $user_Compensation;
					$new_total_bal = $income_data['total_bal']+ $user_Compensation;
					$date= date("y-m-d");
								
					mysqli_query($con,"update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid' limit 1");
					if($i != 7){
					$q=mysqli_query($con,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$temp_under_userid', '$user_Compensation', '$i','$date','compensation' )");
				
					}

					//Both left and right side should at least 1 user
					if($temp_A_count>0 && $temp_B_count>0 && $temp_C_count>0 && $temp_D_count>0 && $temp_E_count>0 && $temp_F_count>0 && $temp_G_count>0 && $temp_H_count>0 && $temp_I_count>0 && $temp_J_count>0 && $temp_K_count>0 && $temp_L_count>0){
						if($temp_side=='A'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_A_count<=$temp_B_count && $temp_A_count<=$temp_C_count && $temp_A_count<=$temp_D_count && $temp_A_count<=$temp_E_count && $temp_A_count<=$temp_F_count && $temp_A_count<=$temp_G_count && $temp_A_count<=$temp_H_count && $temp_A_count<=$temp_I_count && $temp_A_count<=$temp_J_count && $temp_A_count<=$temp_K_count && $temp_A_count<=$temp_L_count){
								
							$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='B'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_B_count<=$temp_A_count && $temp_B_count<=$temp_C_count && $temp_B_count<=$temp_D_count && $temp_B_count<=$temp_E_count && $temp_B_count<=$temp_F_count && $temp_B_count<=$temp_G_count && $temp_B_count<=$temp_H_count && $temp_B_count<=$temp_I_count && $temp_B_count<=$temp_J_count && $temp_B_count<=$temp_K_count && $temp_B_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='C'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_C_count<=$temp_A_count && $temp_C_count<=$temp_B_count && $temp_C_count<=$temp_D_count && $temp_C_count<=$temp_E_count && $temp_C_count<=$temp_F_count && $temp_C_count<=$temp_G_count && $temp_C_count<=$temp_H_count && $temp_Ccount<=$temp_I_count && $temp_C_count<=$temp_J_count && $temp_C_count<=$temp_K_count && $temp_C_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='D'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_D_count<=$temp_A_count && $temp_D_count<=$temp_C_count && $temp_D_count<=$temp_B_count && $temp_D_count<=$temp_E_count && $temp_D_count<=$temp_F_count && $temp_D_count<=$temp_G_count && $temp_D_count<=$temp_H_count && $temp_D_count<=$temp_I_count && $temp_D_count<=$temp_J_count && $temp_D_count<=$temp_K_count && $temp_D_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='E'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_E_count<=$temp_A_count && $temp_E_count<=$temp_C_count && $temp_E_count<=$temp_D_count && $temp_E_count<=$temp_B_count && $temp_E_count<=$temp_F_count && $temp_E_count<=$temp_G_count && $temp_E_count<=$temp_H_count && $temp_E_count<=$temp_I_count && $temp_E_count<=$temp_J_count && $temp_E_count<=$temp_K_count && $temp_E_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='F'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_F_count<=$temp_A_count && $temp_F_count<=$temp_C_count && $temp_F_count<=$temp_D_count && $temp_F_count<=$temp_E_count && $temp_F_count<=$temp_B_count && $temp_F_count<=$temp_G_count && $temp_F_count<=$temp_H_count && $temp_F_count<=$temp_I_count && $temp_F_count<=$temp_J_count && $temp_F_count<=$temp_K_count && $temp_F_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='G'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_G_count<=$temp_A_count && $temp_G_count<=$temp_C_count && $temp_G_count<=$temp_D_count && $temp_G_count<=$temp_E_count && $temp_G_count<=$temp_F_count && $temp_G_count<=$temp_B_count && $temp_G_count<=$temp_H_count && $temp_G_count<=$temp_I_count && $temp_G_count<=$temp_J_count && $temp_G_count<=$temp_K_count && $temp_G_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='H'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_H_count<=$temp_A_count && $temp_H_count<=$temp_C_count && $temp_H_count<=$temp_D_count && $temp_H_count<=$temp_E_count && $temp_H_count<=$temp_F_count && $temp_H_count<=$temp_G_count && $temp_H_count<=$temp_B_count && $temp_H_count<=$temp_I_count && $temp_H_count<=$temp_J_count && $temp_H_count<=$temp_K_count && $temp_H_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='I'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_I_count<=$temp_A_count && $temp_I_count<=$temp_C_count && $temp_I_count<=$temp_D_count && $temp_I_count<=$temp_E_count && $temp_I_count<=$temp_F_count && $temp_I_count<=$temp_G_count && $temp_I_count<=$temp_H_count && $temp_I_count<=$temp_B_count && $temp_I_count<=$temp_J_count && $temp_I_count<=$temp_K_count && $temp_I_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='J'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_J_count<=$temp_A_count && $temp_J_count<=$temp_C_count && $temp_J_count<=$temp_D_count && $temp_J_count<=$temp_E_count && $temp_J_count<=$temp_F_count && $temp_J_count<=$temp_G_count && $temp_J_count<=$temp_H_count && $temp_J_count<=$temp_I_count && $temp_J_count<=$temp_B_count && $temp_J_count<=$temp_K_count && $temp_J_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						elseif($temp_side=='K'){
							$temp_A_count;
							$temp_B_count;
							$temp_C_count;
							$temp_D_count;
							$temp_E_count;
							$temp_F_count;
							$temp_G_count;
							$temp_H_count;
							$temp_I_count;
							$temp_J_count;
							$temp_K_count;
							$temp_L_count;
							if($temp_K_count<=$temp_A_count && $temp_K_count<=$temp_C_count && $temp_K_count<=$temp_D_count && $temp_K_count<=$temp_E_count && $temp_K_count<=$temp_F_count && $temp_K_count<=$temp_G_count && $temp_K_count<=$temp_H_count && $temp_K_count<=$temp_I_count && $temp_K_count<=$temp_J_count && $temp_K_count<=$temp_B_count && $temp_K_count<=$temp_L_count){
								
								$new_bunos_count = $bunos_data['bunos_count']+1;
								
								//update income
								mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	

							}
						}
						else{
							if($temp_C_count<=$temp_A_count && $temp_C_count<=$temp_B_count){
						
								$new_bunos_count = $bunos_data['bunos_count']+1;
								$temp_under_userid;
								//update income
								if(mysqli_query($con,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1")){
									
								}
							}
						}
					}//Both left and right side should at least 1 user
					
				}
				//change under_userid
			
				$next_under_userid = getUnderId($temp_under_userid);
				$temp_side = getUnderIdPlace($temp_under_userid);
				$temp_side_count = $temp_side.'count';
				$temp_under_userid = $next_under_userid;	
				
				$i++;
			}
			
			//Chaeck for the last user
			if($temp_under_userid==""){
				$total_count=0;
			}
			
		}//Loop
		
	
	echo '<script>alert("Successfully Distribute Income.");window.location.assign("delivering.php");</script>';	
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
function income($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from income where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['day_bal'] = $result['day_bal'];
	$data['current_bal'] = $result['current_bal'];
	$data['total_bal'] = $result['total_bal'];
	
	return $data;
}
function tree($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from tree where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['A'] = $result['A'];
	$data['B'] = $result['B'];
	$data['C'] = $result['C'];
	$data['D'] = $result['D'];
	$data['E'] = $result['E'];
	$data['F'] = $result['F'];
	$data['G'] = $result['G'];
	$data['H'] = $result['H'];
	$data['I'] = $result['I'];
	$data['J'] = $result['J'];
	$data['K'] = $result['K'];
	$data['L'] = $result['L'];
	$data['Acount'] = $result['Acount'];
	$data['Bcount'] = $result['Bcount'];
	$data['Ccount'] = $result['Ccount'];
	$data['Dcount'] = $result['Dcount'];
	$data['Ecount'] = $result['Ecount'];
	$data['Fcount'] = $result['Fcount'];
	$data['Gcount'] = $result['Gcount'];
	$data['Hcount'] = $result['Hcount'];
	$data['Icount'] = $result['Icount'];
	$data['Jcount'] = $result['Jcount'];
	$data['Kcount'] = $result['Kcount'];
	$data['Lcount'] = $result['Lcount'];
	
	return $data;
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

function userCompensation($userlevel){
	global $con;
	$data = array();

	$level = $userlevel;

	switch ($level) {
		case 0:	
			$query1 = mysqli_query($con,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 1:		
			$query1 = mysqli_query($con,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 2:		
			$query1 = mysqli_query($con,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 3:		
			$query1 = mysqli_query($con,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 4:
			
			$query1 = mysqli_query($con,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 5:
			$query1 = mysqli_query($con,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
	   // case 6:
		//	$query1 = mysqli_query($con,"select * from compensation where level='$level'");
		//	$result1 = mysqli_fetch_array($query1);
		//	return $result1['amount'];
			break;	
		default:
		return 0;
	}
	
	return $data;
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

    <title>Mlml Website  - Pin Request</title>

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
              <br>
              <br>
          
              <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
							
							         <th>S.n.</th>
                                    <th>Distributors Email</th>
                                    <th>Name</th>
                                    <th>Home Address</th>
                                    <th>Work Address</th>
                                    <th>Deliver To</th>
                                    <th>Mobile</th>
                                    <th>Facebook</th>
                                    <th>Email</th>
                                    <th>Account #</th>
                                    <th>Password</th>
                                    <th>Tracking Number</th>
                                    <th>User Input Tracking Number</th>
                                    <th>Date</th>
                                    <th>Send</th>
                                    <th>Cancel</th>
							</tr>
						</thead>
						<tbody>
					 <?php
									$query = mysqli_query($con,"select * from user where is_active='For Delivery'");
									if(mysqli_num_rows($query)>0){
										$i=1;
										while($row=mysqli_fetch_array($query)){
											$id = $row['id'];
											$account = $row['account'];
											$full_name = $row['first_name'] .' '.$row['middle_name'].' ' .$row['last_name'];
											$amount = $row['is_active'];
                                            
                                            $fb= $row['facebook'];
                                            $image = $row['mobile'].' '.$row['mobile2'];
                                          	$under_userid= $row['under_userid'];
                                            $email = $row['email'];
                                            	$account = $row['account'];
                                            	$date = $row['date_entered'];
										?>
                                        	<tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><?php echo $under_userid; ?></td>
                                                <td><?php echo $full_name; ?></td>
                                                 <td><?php echo $row['address']; ?></td>
                                                  <td><?php echo $row['work_address']; ?></td>
                                                   <td><?php echo $row['delivery_address']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                 <td><?php echo $fb; ?></td>
                                                 <td><?php echo $email; ?></td>
                                                <td><?php echo $account; ?></td>
                                                 <td><?php echo $row['password']; ?></td>
                                            <td><?php echo $row['tracking_num']; ?></td>
                                               <td><?php echo $row['user_tracking']; ?></td>
                                                <td>
                                                <?php echo date("M d, Y", strtotime($row['date_entered']));?>
                                                </td>
                                             
                                                	<td>   <form method="post" onSubmit="if(!confirm('Action cannot be undone. You sure to continue?')){return false;}" name="MyForm">
                                                	<input type="hidden" name="userid" value="<?php echo $account ?>" readonly>
                                                    <input type="submit" name="send" value="Activate" class="btn btn-primary" onclick="javascript:document.MyForm.send.value='Please Wait...'"> </form>
                                                    </td>
                                               
                                                <td>Cancel</td>
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="12" align="center">You have request approval.</td>
                                        </tr>
                                    <?php
									}
								?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
              
              
              
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

<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
});
</script>
</body>

</html>
