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
							
							$query = mysqli_query($con,"select * from payout_request where id='$id'");
							if(mysqli_num_rows($query)>0){
								while($row=mysqli_fetch_array($query)){
								    $user= $row['userid'];
									$remaining=mysqli_query($con,"select * from income where userid='$user'");
	$remaining_result=mysqli_fetch_array($remaining);
	
								?>
			<form method="POST" action="send.php" enctype="multipart/form-data">
			    	<div class="form-group">
					<label>Remaining Balance:</label>
					<input type="text" class="form-control" name="balance" value="<?php echo $remaining_result['current_bal'] ?>" readonly>
				</div>
				<div class="form-group">
					<label>User Id:</label>
					<input type="text" class="form-control" name="subject" value="<?php echo $row['userid'] ?>" readonly>
				</div>
					<div class="form-group" style="display: none">
					<label>Subject:</label>
					<input type="text" class="form-control" name="email" value="<?php echo $row['userid'] ?>" readonly>
				</div>
						<div class="form-group" style="display: none">
					<label>id:</label>
					<input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
				</div>
				<div class="form-group">
					<label>Details:</label>
					<input type="text" class="form-control" name="details" value="<?php echo $row['details'] ?>" readonly>	</div>
					<div class="form-group">
					<label>Amount:</label>
					<input type="text" class="form-control" name="amount" value="<?php echo $row['amount'] ?>" readonly>
				</div>
			   <div class="form-group">
                            <label for="sel1">Transaction Fee:</label>
                            	<input type="text" name = "fee" value="<?php echo $row["fee"]; ?>" class="form-control" readonly>
                            </div>
                             <div class="form-group">
                            <label for="sel1">Mode of Payout:</label>
                            	<input type="text" name = "mode" value="<?php echo $row["mode"]; ?>" style="text-transform: capitalize;" class="form-control" readonly>
                            </div>
                
                                 <div class="form-group">
                            <label for="sel1">Date Process:</label>
                            	<input type="date" name = "date_processed" value="<?php echo $row["date_processed"]; ?>" class="form-control" readonly>
                            </div>
                                <div id="palawan" style="display:none">
  <br>
    <div class="form-group" id="card-number-field">
                <label for="cardNumber"> Tracking Number</label>
                <input type="text" name="tracking_number"  class="form-control"  id="palawan_form">
            </div>
        <div class="form-group" id="card-number-field">
                <label for="cardNumber">Sender Name</label>
                <input type="text" name="sender_name"  class="form-control"  id="palawan_form">
            </div>
                <div class="form-group" id="card-number-field">
                <label for="cardNumber">Mobile Number</label>
                <input type="text" name="palawan_mobile" class="form-control" placeholder="09156678769" id="palawan_form">
            </div>
         
    </div>
    
                                    <div id="paymaya" style="display:none">
  <br>
        <div class="form-group" id="card-number-field">
                <label for="cardNumber">Sender Name</label>
                <input type="text" name="paymaya_sender_name"  class="form-control"  id="paymaya_form">
            </div>
                <div class="form-group" id="card-number-field">
                <label for="cardNumber">Paymaya Account Number</label>
                <input type="text" name="card_num" class="form-control" placeholder="1111-2222-3333-4444" id="paymaya_form">
            </div>
         
    </div>
                                    <div id="gcash" style="display:none">
  <br>
        <div class="form-group" id="card-number-field">
                <label for="cardNumber">Sender Mobile Number</label>
                <input type="text" name="gcash_mobile"  class="form-control"  id="gcash_form">
            </div>
           
         
    </div>
                            <?php
                            if($row["mode"] == "palawan express"){
                           echo '<script>
                            document.getElementById("palawan").style.display = "contents";
                            document.getElementById("palawan_form").required = true;
                           </script>';

                            }
                            else if($row["mode"] == "paymaya"){
                           echo '<script>
                            document.getElementById("paymaya").style.display = "contents";
                               document.getElementById("paymaya_form").required = true;
                           </script>';

                            }
                            else if($row["mode"] == "gcash"){
                           echo '<script>
                            document.getElementById("gcash").style.display = "contents";
                              document.getElementById("gcash_form").required = true;
                           </script>';

                            }
                            
                            ?>
				<div class="form-group">
					<label>Add Attachment:</label>
					<input type="file" name="attachment" required>
				</div>
				<input type="submit" name="send" class="btn btn-primary" id='myBtn' onclick='myFunction()' value="Send">
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
<script>


function myFunction(){
    document.getElementById("myBtn").value="Send";
}

</script>
</BODY>
</HTML>