<?php
require('../php-includes/connect.php');
include('../php-includes/check-login.php');
    
$get_userid = $_SESSION['userid'];
$get_userids = mysqli_query($con,"select * from user where account='$get_userid'");
						$result_get_userid  = mysqli_fetch_array($get_userids);
						$email = $result_get_userid['email'];
	$result = '';
	$query = $con->query("SELECT * FROM `message` where userid ='$email' order by date_sent ASC");
	
	$result .= '
		<table class = "table table-bordered">
			<thead>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
	';
	if($query->num_rows > 0){
		while($fetch = $query->fetch_array()){
			$result .='
			
				<tr>
					<td class = "firstname" data-firstname = '.$fetch['message'].' contenteditable >'.$fetch['message'].'</td>
					<td class = "lastname" data-lastname = '.$fetch['message'].' contenteditable>'.$fetch['message'].'</td>
					<td class = "address" data-address = '.$fetch['message'].' contenteditable>'.$fetch['message'].'</td>
					<td><center><button class = "btn btn-danger btn_delete" name = "'.$fetch['message'].'"><span class = "glyphicon glyphicon-remove"></span></button></center></td>
				</tr>
				
			';
			
		}
		
		$result .='
				<tr>
					<td id = "firstname" contenteditable></td>
					<td id = "lastname" contenteditable></td>
					<td id = "address" contenteditable></td>
					<td><center><button class = "btn btn-success" id = "btn_add"><span class = "glyphicon glyphicon-plus"></span></button></center></td>
				</tr>
			
			';
			
	}else{
		$result .='
			<tr>
				<td id = "firstname" contenteditable></td>
					<td id = "lastname" contenteditable></td>
					<td id = "address" contenteditable></td>
				<td><center><button class = "btn btn-success" id = "btn_add"><span class = "glyphicon glyphicon-plus"></span></button></center></td>
			</tr>
		';
	}
	
	$result .= '
			</tbody>
		</table>
	';
	
	echo $result;
	
?>