<?php
  include('php-includes/check-login.php');
include('php-includes/connect.php');
    
     if(isset($_GET['id'])) {
       $sql = "SELECT * FROM order_history_details WHERE id=" . $_GET['id'];
   	$result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
	}
    
   
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</HEAD>
<BODY>
    <br>
    <br>
    <a class="btn" style="background-color: #3a6520; color: white; margin-left: 50px" href="http://sbpzedcorp.com/admin/order.php">Back to Order List</a>
     <br>
    <br>
  
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView_order.php?image_id=<?php echo $row["id"]; ?>" style="  width: 100%;
  z-index: 0;" /><br/>
	
<?php		
	}
    mysqli_close($con);
?>
</BODY>
</HTML>