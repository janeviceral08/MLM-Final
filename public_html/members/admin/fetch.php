<?php
	//connection

require('php-includes/connect.php');

	$output = '';

	$sql = "SELECT * FROM pin_request";
	$query = $con->query($sql);

	while($row = $query->fetch_assoc()){
		$output .= "
			<tr>
				<td>".$row['email']."</td>
				<td>".$row['amount']."</td>
				<td>".date('M d, Y', strtotime($row['date']))."</td>
			</tr>
		";
	}

	echo json_encode($output);
	
?>