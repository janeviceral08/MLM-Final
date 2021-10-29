<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
?>


<?php
//Clicked on send buton
if(isset($_POST['send'])){
	$userid = mysqli_real_escape_string($con,$_POST['userid']);
	$bunos_count = mysqli_real_escape_string($con,$_POST['bunos_count']);


	
	//updae pin request status
	if($bunos_count == 1 && $bunos_count < 6 )
	{
	mysqli_query($con,"update bunos set active1= 1 where userid='$userid'");
	
	echo '<script>alert("Notified LEVEL 1 successfully.");window.location.assign("bonus.php");</script>';	
    }
    	else if($bunos_count == 7 && $bunos_count < 14){
										        	mysqli_query($con,"update bunos set active2= 1 where userid='$userid'");
	
	echo '<script>alert("Notified LEVEL 2 successfully.");window.location.assign("bonus.php");</script>';
										} 
										else if($bunos_count>14 && $bunos_count < 158){
										        	mysqli_query($con,"update bunos set active3= 1 where userid='$userid'");
	
	echo '<script>alert("Notified for LEVEL 3 successfully.");window.location.assign("bonus.php");</script>';
										} 
										else if($bunos_count > 157 && $bunos_count < 1886){
										   	mysqli_query($con,"update bunos set active4= 1 where userid='$userid'");
	
	echo '<script>alert("Notified LEVEL 4 successfully.");window.location.assign("bonus.php");</script>';
										} 
										else if($bunos_count>1885 && $bunos_count < 22622){
										       	mysqli_query($con,"update bunos set active5= 1 where userid='$userid'");
	
	echo '<script>alert("Notified LEVEL 5 successfully.");window.location.assign("bonus.php");</script>';
										} 
										else if($bunos_count>22621 && $bunos_count < 271454){
										       	mysqli_query($con,"update bunos set active6= 1 where userid='$userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("bonus.php");</script>';
										} 
										else if($bunos_count > 271453){
										      	mysqli_query($con,"update bunos set active6= 1 where userid='$userid'");
	
	echo '<script>alert("Notified LEVEL 6 successfully.");window.location.assign("bonus.php");</script>';
										} 
   
	

}




function level1($email){
	global $con;
	
	$query =mysqli_query($con,"select SUM(amount) as level1 from income_history where user_id='$email' AND level='1'");
	$result = mysqli_fetch_array($query);
	return $result['level1']; 
}

function level2($email){
	global $con;
	
	$query =mysqli_query($con,"select SUM(amount) as level2 from income_history where user_id='$email' AND level='2'");
	$result = mysqli_fetch_array($query);
	return $result['level2']; 
}

function level3($email){
	global $con;
	
	$query =mysqli_query($con,"select SUM(amount) as level3 from income_history where user_id='$email' AND level='3'");
	$result = mysqli_fetch_array($query);
	return $result['level3']; 
}

function level4($email){
	global $con;
	
	$query =mysqli_query($con,"select SUM(amount) as level4 from income_history where user_id='$email' AND level='4'");
	$result = mysqli_fetch_array($query);
	return $result['level4']; 
}

function level5($email){
	global $con;
	
	$query =mysqli_query($con,"select SUM(amount) as level5 from income_history where user_id='$email' AND level='5'");
	$result = mysqli_fetch_array($query);
	return $result['level5']; 
}

function level6($email){
	global $con;
	
	$query =mysqli_query($con,"select SUM(amount) as level6 from income_history where user_id='$email' AND level='6'");
	$result = mysqli_fetch_array($query);
	return $result['level6']; 
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

    <title>Mlml Website  - Distributors Bonus</title>

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
    margin: 12px 0 0 0; 
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
       
        <button class="btn" onclick="printDiv('historyTables')" ><i class="fa fa-print"></i> Print</button>
            	<div class="row" id="historyTables">
 
            <div class="container-fluid">
              <br>
              <br>
          
              <!-- /.row -->
  
			
				   
                <div class="col-lg-12">
                    <div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>

								<th>Full Name</th>
						
                                   
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                     <th>Level 1</th>
                                    <th>Level 2</th>
                                     <th>Level 3</th>
                                    <th>Level 4</th>
                                     <th>Level 5</th>
                                  
								    <th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($con,"SELECT * FROM bunos JOIN user ON bunos.userid= user.email");
								while($hrow=mysqli_fetch_array($h)){
								    $fullname =  $hrow["first_name"] . ' ' . $hrow["middle_name"]. ' ' . $hrow["last_name"];
								    
								    	$id = $hrow['id'];
											$email = $hrow['email'];
										
										
                                            $bunos_count = $hrow['bunos_count'];
                                            $mobile = $hrow['mobile'];
									?>
										<tr>
											<td class="hidden"></td>
										
											<td><?php echo  $fullname; ?></td>
									
										
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $mobile; ?></td>
                                                <td><?php 
                                                  $return_value1 = level1($email);
                                                	 if( $hrow['active1'] == 1){
										                if($return_value1 >= 3840){
										                      echo "<strike style='color: blue;'>".number_format($return_value1,2)."</strike>";
										                    
										                }else{
										                     echo "<strike>".number_format($return_value1,2)."</strike>";
										                }
                                              
										}
										else{  
										    if($return_value1 >= 3840){
										                      echo "<p style='color: blue;'>".number_format($return_value1,2)."</p>";
										                    
										                }else{
										                     echo "<p>".number_format($return_value1,2)."</p>";
										                }
                                              
										     
                                                
										} 
                                                
                                                
                                                ?></td>
                                                 <td><?php 
                                                 $return_value2 = level2($email);
                                                	 if( $hrow['active2'] == 1){
                                                	    
            										     if($return_value2 >= 12096){
										                      echo "<strike style='color: blue;'>".number_format($return_value2,2)."</strike>";
										                    
										                }else{
										                     echo "<strike>".number_format($return_value2,2)."</strike>";
										                }
										}
										else{
										       if($return_value2 >= 12096){
										                      echo "<p style='color: blue;'>".number_format($return_value2,2)."</p>";
										                    
										                }else{
										                     echo "<p>".number_format($return_value2,2)."</p>";
										                }
										} 
                                                
                                                
                                                ?></td>
                                                 <td><?php 
                                                 $return_value3 = level3($email);
                                                	 if( $hrow['active3'] == 1){
										           if($return_value3 >= 31104){
										                      echo "<strike style='color: blue;'>".number_format($return_value3,2)."</strike>";
										                    
										                }else{
										                     echo "<strike>".number_format($return_value3,2)."</strike>";
										                }
										}
										else{
										           if($return_value3 >= 31104){
										                      echo "<p style='color: blue;'>".number_format($return_value3,2)."</p>";
										                    
										                }else{
										                     echo "<p>".number_format($return_value3,2)."</p>";
										                }
										} 
                                                
                                                
                                                ?></td>
                                                 <td><?php 
                                                 $return_value4 = level4($email);
                                                	 if( $hrow['active4'] == 1){
										          if($return_value4>= 103680){
										                      echo "<strike style='color: blue;'>".number_format($return_value4,2)."</strike>";
										                    
										                }else{
										                     echo "<strike>".number_format($return_value4,2)."</strike>";
										                }
										}
										else{
										          if($return_value4 >= 103680){
										                      echo "<p style='color: blue;'>".number_format($return_value4,2)."</p>";
										                    
										                }else{
										                     echo "<p>".number_format($return_value4,2)."</p>";
										                }
										} 
                                                
                                                
                                                ?></td>
                                                 <td><?php 
                                                 $return_value5 = level5($email);
                                                	 if( $hrow['active5'] == 1){
										           if($return_value5 >= 273715.2){
										                      echo "<strike style='color: blue;'>".number_format($return_value5,2)."</strike>";
										                    
										                }else{
										                     echo "<strike>".number_format($return_value5,2)."</strike>";
										                }
										}
										else{
										         if($return_value5 >= 273715.2){
										                      echo "<p style='color: blue;'>".number_format($return_value5,2)."</p>";
										                    
										                }else{
										                     echo "<p>".number_format($return_value5,2)."</p>";
										                }
										} 
                                                
                                                
                                                ?></td>
                                              
												<td id="myDIV">
												<a href="update_bonus.php?rowid=<?php echo $hrow['email']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-check"></span> Update</a>
											<a href="bonus_view_tree.php?rowid=<?php echo $hrow['email']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Trees</a>
											</td>
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
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;
		
           document.getElementById("myDIV").style.display = "block";
         
			window.print();

			document.body.innerHTML = originalContents;

}

</script>
</body>

</html>
