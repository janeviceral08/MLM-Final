<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
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

  <style>
.btn {
    margin: 12px;
    margin-bottom: 12px;
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>

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
                         
<br>
<div class="table-responsive">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">				
<div class="w3-container">
  <h2><?php echo $_GET['rowid']?> Downlines</h2>

  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, '1st');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%">1st Level</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, '2nd');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%">2nd Level</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, '3rd');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%">3rd Level</div>
    </a>
      <a href="javascript:void(0)" onclick="openCity(event, '4th');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%">4th Level</div>
    </a>
      <a href="javascript:void(0)" onclick="openCity(event, '5th');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%">5th Level</div>
    </a>
  </div>

									 <div id="1st" class="w3-container city" style="display:block">
									      <button class="btn" onclick="printDiv('1st')" ><i class="fa fa-print"></i> Print</button>
            <br>
              <br>
             
 	<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable1">
						<thead>
							<tr>
								<th class="hidden"></th>
								
								<th>Name</th>
                                <th>Email</th>
                                <th>Account #</th>
                                <th>Mobile</th>
                                <th>Address</th>
								<th>Person Joined</th>
								 
								
							</tr>
						</thead>
						<tbody>
<?php
    $id= $_GET['rowid'];
	$h=mysqli_query($con,"SELECT * FROM user where under_userid ='$id'");
		$i=1;
								while($hrow=mysqli_fetch_array($h)){
							
									?>
										<tr>
											<td class="hidden"></td>
										
													<td><?php echo $hrow['first_name']. ' '.$hrow['middle_name'].' '.$hrow['last_name']; ?></td>
													<td><?php echo $hrow['email']; ?></td>
													<td><?php echo $hrow['account']; ?></td>
													<td><?php echo $hrow['mobile']; ?>, <?php echo $hrow['mobile2']; ?></td>
													<td>HOME: <?php echo $hrow['address']; ?> | WORK: <?php echo $hrow['work_address']; ?></td>
													<td><?php echo $hrow['date_entered']; ?></td>
										
										</tr>
						</tbody>
									<?php
									
								}
							?>
       </table>
  </div>

 
 <div id="2nd" class="w3-container city" style="display:none">
      <button class="btn" onclick="printDiv('2nd')" ><i class="fa fa-print"></i> Print</button>
      <br>
              <br>
		 	<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable2">
						<thead>
							<tr>
								<th class="hidden"></th>
							
									<th>Name</th>
                                <th>Email</th>
                                <th>Account #</th>
                                <th>Mobile</th>
                                <th>Address</th>
								<th>Person Joined</th>
								
								
							</tr>
						</thead>
						<tbody>					
<?php
 $id= $_GET['rowid'];
	$h=mysqli_query($con,"SELECT * FROM user where under_userid ='$id'");
    	while($hrow=mysqli_fetch_array($h)){
    	    $under_user_id = $hrow['email'];
    	    
    	    ?>
    	    	
    	    <?php
	$h2=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id'");
	
								while($hrow2=mysqli_fetch_array($h2)){
								   
									?>
										<tr>
											<td class="hidden"></td>
									
													<td><?php echo $hrow2['first_name']. ' '.$hrow2['middle_name'].' '.$hrow2['last_name']; ?></td>
														<td><?php echo $hrow2['email']; ?></td>
													<td><?php echo $hrow2['account']; ?></td>
													<td><?php echo $hrow2['mobile']; ?>, <?php echo $hrow2['mobile2']; ?></td>
													<td>HOME: <?php echo $hrow2['address']; ?> | WORK: <?php echo $hrow2['work_address']; ?></td>
													<td><?php echo $hrow2['date_entered']; ?></td>
										
										</tr>
						</tbody>
									<?php
									
								}
    	}
							?>
							</table>
     </div>
     
     
     
     

 <div id="3rd" class="w3-container city" style="display:none">
           <button class="btn" onclick="printDiv('3rd')" ><i class="fa fa-print"></i> Print</button>
           <br>
              <br>
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable3">
						<thead>
							<tr>
								<th class="hidden"></th>
						
								<th>Name</th>
                                <th>Email</th>
                                <th>Account #</th>
                                <th>Mobile</th>
                                <th>Address</th>
								<th>Person Joined</th>
								
								
							</tr>
						</thead>
						<tbody>			
<?php
 $id= $_GET['rowid'];
	$h=mysqli_query($con,"SELECT * FROM user where under_userid ='$id'");
    	while($hrow=mysqli_fetch_array($h)){
    	    $under_user_id = $hrow['email'];
    	    	$h2=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id'");
    	while($hrow2=mysqli_fetch_array($h2)){
    	    $under_user_id2 = $hrow2['email'];
    	  
	$h3=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id2'");

								while($hrow3=mysqli_fetch_array($h3)){
								
									?>
										<tr>
											<td class="hidden"></td>
											
													<td><?php echo $hrow3['first_name']. ' '.$hrow3['middle_name'].' '.$hrow3['last_name']; ?></td>
														<td><?php echo $hrow3['email']; ?></td>
													<td><?php echo $hrow3['account']; ?></td>
													<td><?php echo $hrow3['mobile']; ?>, <?php echo $hrow3['mobile2']; ?></td>
													<td>HOME: <?php echo $hrow3['address']; ?> | WORK: <?php echo $hrow3['work_address']; ?></td>
													<td><?php echo $hrow3['date_entered']; ?></td>
											
										</tr>
						</tbody>
									<?php
									
								}
								}
    	}
							?>
							    </table>
     </div>
  




 <div id="4th" class="w3-container city" style="display:none">
      <button class="btn" onclick="printDiv('4th')" ><i class="fa fa-print"></i> Print</button>
      <br>
              <br>
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable4">
						<thead>
							<tr>
								<th class="hidden"></th>
							
									<th>Name</th>
                                <th>Email</th>
                                <th>Account #</th>
                                <th>Mobile</th>
                                <th>Address</th>
								<th>Person Joined</th>
							
							</tr>
						</thead>
						<tbody>			
<?php
 $id= $_GET['rowid'];
	$h=mysqli_query($con,"SELECT * FROM user where under_userid ='$id'");
    	while($hrow=mysqli_fetch_array($h)){
    	    $under_user_id = $hrow['email'];
    	    	$h2=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id'");
    	while($hrow2=mysqli_fetch_array($h2)){
    	    $under_user_id2 = $hrow2['email'];
    	  	$h3=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id2'");
    	while($hrow3=mysqli_fetch_array($h3)){
    	    $under_user_id3 = $hrow3['email'];
	$h4=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id3'");
	
								while($hrow4=mysqli_fetch_array($h4)){
								  
									?>
										<tr>
											<td class="hidden"></td>
										
													<td><?php echo $hrow4['first_name']. ' '.$hrow4['middle_name'].' '.$hrow4['last_name']; ?></td>
														<td><?php echo $hrow4['email']; ?></td>
													<td><?php echo $hrow4['account']; ?></td>
													<td><?php echo $hrow4['mobile']; ?>, <?php echo $hrow4['mobile2']; ?></td>
													<td>HOME: <?php echo $hrow4['address']; ?> | WORK: <?php echo $hrow4['work_address']; ?></td>
													<td><?php echo $hrow4['date_entered']; ?></td>
										
										</tr>
						</tbody>
									<?php
									
								}}
								}
    	}
							?>
							    </table>
     </div>
     
     
     
     
  

 <div id="5th" class="w3-container city" style="display:none">
           <button class="btn" onclick="printDiv('5th')" ><i class="fa fa-print"></i> Print</button>
           <br>
              <br>
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable5th">
						<thead>
							<tr>
								<th class="hidden"></th>
							
								<th>Name</th>
                                <th>Email</th>
                                <th>Account #</th>
                                <th>Mobile</th>
                                <th>Address</th>
								<th>Person Joined</th>
					
								
							</tr>
						</thead>
						<tbody>			
<?php
 $id= $_GET['rowid'];
	$h=mysqli_query($con,"SELECT * FROM user where under_userid ='$id'");
    	while($hrow=mysqli_fetch_array($h)){
    	    $under_user_id = $hrow['email'];
    	    	$h2=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id'");
    	while($hrow2=mysqli_fetch_array($h2)){
    	    $under_user_id2 = $hrow2['email'];
    	  	$h3=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id2'");
    	while($hrow3=mysqli_fetch_array($h3)){
    	    $under_user_id3 = $hrow3['email'];
	$h4=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id3'");
								while($hrow4=mysqli_fetch_array($h4)){
								    	    $under_user_id4 = $hrow4['email'];
	$h5=mysqli_query($con,"SELECT * FROM user where under_userid ='$under_user_id4'");
	
								while($hrow5=mysqli_fetch_array($h5)){
								   
									?>
										<tr>
											<td class="hidden"></td>
										
													<td><?php echo $hrow5['first_name']. ' '.$hrow5['middle_name'].' '.$hrow5['last_name']; ?></td>
														<td><?php echo $hrow5['email']; ?></td>
													<td><?php echo $hrow5['account']; ?></td>
													<td><?php echo $hrow5['mobile']; ?>, <?php echo $hrow5['mobile2']; ?></td>
													<td>HOME: <?php echo $hrow5['address']; ?> | WORK: <?php echo $hrow5['work_address']; ?></td>
													<td><?php echo $hrow5['date_entered']; ?></td>
											
										
										</tr>
						</tbody>
									<?php
										
								}}
								}
    	}}
							?>
							    </table>
     </div>
  
</div>

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
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}



function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;
           
         
			window.print();

			document.body.innerHTML = originalContents;

}
</script>
</body>

</html>
