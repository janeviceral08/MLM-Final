<?php
  include('php-includes/check-login.php');
require('php-includes/connect.php');
    $id=$_GET['id'];
?>
<HTML>
<HEAD>
<TITLE>Processing Payout Request</TITLE>
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
     <div class="row" style="margin: auto">
                	<div class="col-lg-7">
        <form action="view-payout-request.php" style="margin: 20px">
         <input type="submit" value="Back to view payout request" class="btn" style="background-color: #3a6520; color: white"/>
      </form>
  	<?php 
							
							$query = mysqli_query($con,"select * from questions where id='$id'");
							if(mysqli_num_rows($query)>0){
								while($row=mysqli_fetch_array($query)){
								
								?>
			<form method="POST" action="send-message.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" name="subject" value="<?php echo $row['name'] ?>" readonly>
				</div>
					<div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" name="emails" value="<?php echo $row['emails'] ?>" readonly>
				</div>
						<div class="form-group" style="display: none">
					<label>id:</label>
					<input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
				</div>
						<div class="form-group" >
					<label>Question:</label>
					<input type="text" class="form-control" name="question" value="<?php echo $row['question'] ?>" readonly>
				</div>
				<div class="form-group">
					<label>Answer:</label>
					<textarea  type="text" class="form-control" name="answer"> </textarea>	</div>
                         
			
				<button type="submit" name="send" class="btn btn-primary">Send</button>
			</form>
			<?php
									
								}
							}
							else{
							?>
			<?php
							}
							?>
</div>
</div>
</BODY>
</HTML>