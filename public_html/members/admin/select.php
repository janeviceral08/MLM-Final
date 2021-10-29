<?php
	require 'connect.php';
	$result = '';
	$query = $conn->query("SELECT * FROM `compensation`");
	
	$result .= '
		<table class = "table table-bordered">
			<thead>
				<tr>
					<th>Level</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
	';
	if($query->num_rows > 0){
		while($fetch = $query->fetch_array()){
			$result .='
			
				<tr>
					<td class = "firstname">'.$fetch['level'].'</td>
					<td class = "lastname" data-lastname = '.$fetch['level'].' contenteditable>'.$fetch['amount'].'</td>
				
				</tr>
				
			';
			
		}
		
		$result .='
				<tr>
					<td id = "firstname" contenteditable></td>
					<td id = "lastname" contenteditable></td>
				
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