<?php
 include('connect.php');
//User cliced on join
if(isset($_GET['join_user'])){
    $id = $_GET['join_user'];
    $q= mysqli_query($db,"select * from join_request where jr_id='$id'");
    $join = mysqli_fetch_array($q);
    
    $generated_pin = rand(100000,999999);
    $time = time();
    
    
    
	$side='';
	$email = $join['email'];
	$mobile = $join['contact'];
	$address = $join['address'];
	$firstname =  $join['first_name'];
	$lastname =  $join['last_name'];
	$middlename =  $join['middle_name'];
	$birthdate =  $join['birthdate'];
	$gender =  $join['gender'];
	$password = "sbpcorp123456";
    $under_userid =  $join['refered'];
    $store_name =  $join['username'];
    $product =  $join['product'];
    $price =  $join['price'];
    $username = $join['username'];
    $order_id = $join['order_id'];
     
    $q1= mysqli_query($db,"select * from tree where userid ='$under_userid'");
        $sides = mysqli_fetch_array($q1);
        if( $sides['A'] == NULL ){
            $side = 'A';
        }else if($sides['B'] == NULL){
            $side = 'B';
        }else if($sides['C'] == NULL){
            $side = 'C';
        }else if($sides['D'] == NULL){
            $side = 'D';
        }else if($sides['E'] == NULL){
            $side = 'E';
        }else if($sides['F'] == NULL){
            $side = 'F';
        }else if($sides['G'] == NULL){
            $side = 'G';
        }else if($sides['H'] == NULL){
            $side = 'H';
        }else if($sides['I'] == NULL){
            $side = 'I';
        }else if($sides['J'] == NULL){
            $side = 'J';
        }else if($sides['K'] == NULL){
            $side = 'K';
        }else if($sides['L'] == NULL){
            $side = 'L';
        }
	
       


	
	$flag = 0;

	$level = getUserLevel($under_userid);
	
	if($mobile!='' && $address!='' && $side!=''){
		//User filled all the fields.
				if(!email_check($under_userid)){
					//Under userid is ok
					if(side_check($under_userid,$side)){
						//Side check
						$flag=1;
					}
					else{
						echo '<script>alert("The side you selected is not available.");</script>';
					}
				}
				else{
					//check under userid
					echo '<script>alert("Invalid Under userid.");</script>';
				}
			}
		
	else{
		//check all fields are fill
		echo '<script>alert("Please fill all the fields.");</script>';
	}
	
	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
	if($flag==1){
		$date=date("Y-m-d");
		//Insert into User profile
		$query = mysqli_query($db,"insert into user(`last_name`,`middle_name`,`first_name`,`email`,`password`,`mobile`,`address`,`account`,`under_userid`,`side`,`user_level`,`date_entered`,`bithdate`,`gender`) values('$lastname','$middlename','$firstname','$email','$password','$mobile','$address','$generated_pin-$time','$under_userid','$side','$level','$date','$birthdate','$gender')");
		
		//Insert into Tree
		//So that later on we can view tree.
		$query = mysqli_query($db,"insert into tree(`userid`,`user_level`) values('$generated_pin-$time', '$level')");
		$query = mysqli_query($db,"insert into bunos(`userid` ) values('$generated_pin-$time')");
		$query = mysqli_query($db,"insert into payment_method(`userid` ) values('$generated_pin-$time')");
		//Insert to side
		$query = mysqli_query($db,"update tree set `$side`='$generated_pin-$time' where userid='$under_userid'");
		
		//insert to store
		$query = mysqli_query($db,"insert into store(`store_name`, `store_create`, `store_uid` ) values('$store_name', NOW(), '$generated_pin-$time')");
		$query = mysqli_query($db,"insert into store_product(`store_uid`, `product`, `price`, `quantity`, `description`, `date_added`, `user_store_name`, `images_img`, `from_user`, `user_email`, `cat` ) values('$generated_pin-$time', '$product', '$price', '12', 'sample and test only', NOW(), '$username', '', 'admin', '$email', 'Health Products')");
		
			$query = mysqli_query($db,"insert into store_product(`store_uid`, `product`, `price`, `quantity`, `description`, `date_added`, `user_store_name`, `images_img`, `from_user`, `user_email`, `cat` ) values('$generated_pin-$time', 'VGX Kit', '$price', '0', 'sample and test only', NOW(), '$username', '', 'admin', '$email', 'Health Products')");
			
				$query = mysqli_query($db,"insert into chatroom(`chat_name`, `date_created`, `chat_password`, `userid`) values('$generated_pin-$time', NOW(), '$order_id', '$generated_pin-$time')");
		 
		 
		 mysqli_query($db,"update join_request set status='confirmed' where jr_id='$id' limit 1");
		 
		
		//Inset into Icome
	    $query = mysqli_query($db,"insert into income (`userid`,`under_userid`) values('$generated_pin-$time','$under_userid')");
		echo mysqli_error($db);
		//This is the main part to join a user\
		//If you will do any mistake here. Then the site will not work.
		
		//Update count and Income.
		$temp_under_userid = $under_userid;
		$temp_side_count = $side.'count'; //leftcount or rightcount
		
		$temp_side = $side;
		$total_count=1;
		$i=1;
		while($total_count>0){
			$i;
			$q = mysqli_query($db,"select * from tree where userid='$temp_under_userid'");
			$r = mysqli_fetch_array($q);
			$current_temp_side_count = $r[$temp_side_count]+1;
			$temp_under_userid;
			$temp_side_count;
			mysqli_query($db,"update tree set `$temp_side_count`=$current_temp_side_count where userid='$temp_under_userid'");
			
			//income
			if($temp_under_userid!=""){
				$income_data = income($temp_under_userid);
				$bunos_data = bunos($temp_under_userid);
				//check capping
				//$income_data['day_bal'];
			
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
								
					mysqli_query($db,"update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid' limit 1");
					if($i != 7){
					$q=mysqli_query($db,"insert into income_history(`user_id`,`amount`,`level`,`date`,`category`) values('$temp_under_userid', '$user_Compensation', '$i','$date','compensation' )");
				
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");
								
									if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 

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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
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
								mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1");	
if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
							}
						}
						else{
							if($temp_C_count<=$temp_A_count && $temp_C_count<=$temp_B_count){
						
								$new_bunos_count = $bunos_data['bunos_count']+1;
								$temp_under_userid;
								//update income
								if(mysqli_query($db,"update bunos set bunos_count='$new_bunos_count' where userid='$temp_under_userid' limit 1")){
									
									if($new_bunos_count == 1 && $new_bunos_count < 6 )
	{
	mysqli_query($db,"update bunos set active1= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("membership_request.php");</script>';	
    }
    	else if($new_bunos_count == 7 && $new_bunos_count < 14){
										        	mysqli_query($db,"update bunos set active2= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>14 && $new_bunos_count < 158){
										        	mysqli_query($db,"update bunos set active3= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 157 && $new_bunos_count < 1886){
										   	mysqli_query($db,"update bunos set active4= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count >1885 && $new_bunos_count < 22622){
										       	mysqli_query($db,"update bunos set active5= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count>22621 && $new_bunos_count < 271454){
										       	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
										else if($new_bunos_count > 271453){
										      	mysqli_query($db,"update bunos set active6= 1 where userid='$temp_under_userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("membership_request.php");</script>';
										} 
									
								}
							}
						}
					}//Both left and right side should at least 1 user
					
				
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
		
		
		
		
		echo mysqli_error($db);
		
		echo '<script>alert("Testing success.");window.location.assign("membership_request.php");</script>' ;
		
	}
	
}
?><!--/join user-->

<?php 
//functions
function pin_check($pin){
	global $db,$userid;
	
	$query =mysqli_query($db,"select * from pin_list where pin='$pin' and userid='$userid' and status='open'");
	if(mysqli_num_rows($query)>0){
		return true;
	}
	else{
		return false;
	}
}
function email_check($uid){
	global $db;
	
	$query =mysqli_query($db,"select * from user where account='$uid'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}

function side_check($email,$side){
	global $db;
	
	$query =mysqli_query($db,"select * from tree where userid='$email'");
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
	global $db;
	$data = array();
	$query = mysqli_query($db,"select * from income where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['day_bal'] = $result['day_bal'];
	$data['current_bal'] = $result['current_bal'];
	$data['total_bal'] = $result['total_bal'];
	
	return $data;
}
function tree($userid){
	global $db;
	$data = array();
	$query = mysqli_query($db,"select * from tree where userid='$userid'");
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
	global $db;
	$bunos = array();
	$query = mysqli_query($db,"select * from bunos where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$bunos['bunos_count'] = $result['bunos_count'];

	
	return $bunos;
}
function getUnderId($userid){
	global $db;
	$query = mysqli_query($db,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($userid){
	global $db;
	$query = mysqli_query($db,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
}
function getUserLevel($userid){
	global $db;
	$query = mysqli_query($db,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['user_level'] + 1; 
}

function userCompensation($userlevel){
	global $db;
	$data = array();

	$level = $userlevel;

	switch ($level) {
		case 0:	
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 1:		
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 2:		
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 3:		
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 4:
			
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
		case 5:
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
			break;
	    case 6:
			$query1 = mysqli_query($db,"select * from compensation where level='$level'");
			$result1 = mysqli_fetch_array($query1);
			return $result1['amount'];
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>MLM<span>ADMIN</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages
                  </a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span> Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span> Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span> Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span> New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="login.html">Logout</a>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a>
          </p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="payout_requests.php">
              <i class="fa fa-dashboard"></i>
              <span>Payout Requests</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="orders.php">
              <i class="fa fa-dashboard"></i>
              <span>Orders</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active"  href="membership_request.php">
              <i class="fa fa-dashboard"></i>
              <span>Membership Requests</span>
              </a>
          </li>
          <li class="sub-menu">
            <a   href="bonus_achievements.php">
              <i class="fa fa-dashboard"></i>
              <span>Bonus Achievements</span>
              </a>
          </li>
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Settings</span>
              </a>
            <ul class="sub">
              <li><a href="#">Add Users</a></li>
              <li><a href="#">Compensation Rates</a></li>
              <li><a href="#">User Profile</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Reports</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Membership Requests</h3>
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Membership Requests</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Name</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Contact</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Address</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Birthday</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Gender</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Date Requested</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Refferal ID</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                                include('connect.php');
                                
								$h=mysqli_query($db,"select * from join_request where status = 'pending' order by date_requested desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td><?php echo $hrow['first_name'];
											          echo ' ';
											          echo  $hrow['last_name'];
											?>
											</td>
											<td><?php echo $hrow['email']; ?></td>
											<td><?php echo $hrow['contact']; ?></td>
											<td><?php echo $hrow['address']; ?></td>
											<td><?php echo $hrow['birthdate']; ?></td>
											<td><?php echo $hrow['gender']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_requested']));?></td>
										
											<td><?php echo $hrow['store_email']; ?></td>
											<td><span class="label label-warning label-mini"><?php echo $hrow['status']; ?></span></td>
										     <td>
                                              <button class="btn btn-success btn-xs" onclick="location.href='membership_request.php?join_user=<?php echo $hrow['jr_id']; ?>'"><i class="fa fa-check"></i></button>
                                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </td>   
										</tr>
									<?php
								}
							?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="basic_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  
</body>

</html>
