<?php
  include('php-includes/check-login.php');
include('php-includes/connect.php');
    
     if(isset($_GET['id'])) {
       $sql = "SELECT * FROM pin_request WHERE id=" . $_GET['id'];
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
        <form action="view-pin-request.php" style="margin: 20px">
         <input type="submit" value="Back to view pin request" class="btn" style="background-color: #3a6520; color: white"/>
      </form>
  
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["id"]; ?>" style="  width: 100%;
  z-index: 0;" /><br/>
	
<?php		
	}
    mysqli_close($con);
?>
</BODY>
</HTML>