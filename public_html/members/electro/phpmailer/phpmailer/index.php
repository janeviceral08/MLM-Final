<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sending Email using PHPMailer</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Sending Email using PHPMailer</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<?php
				if(isset($_SESSION['message'])){
					?>
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
					<?php

					unset($_SESSION['message']);
				}
			?>
			<form method="POST" action="send.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" name="email" required>
				</div>
				<div class="form-group">
					<label>Subject:</label>
					<input type="text" class="form-control" name="subject" required>
				</div>
				<div class="form-group">
					<label>Message:</label>
					<textarea class="form-control" name="message" required></textarea>
				</div>
				<div class="form-group">
					<label>Add Attachment:</label>
					<input type="file" name="attachment">
				</div>
				<button type="submit" name="send" class="btn btn-primary">Send</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>