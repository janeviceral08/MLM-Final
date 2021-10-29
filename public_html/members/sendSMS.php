<html>
	<head>
	 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>
	</head>

	<body>
	<button onclick="sendSMS()">Send SMS</button>

	<script>
		var sendSMS = function(){
			var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				debugger;
				if (this.readyState == 4 && this.status == 0) {
					var responseText = JSON.parse(this.responseText);
					alert('It worked');
					console.log(responseText);
				}
			  };
			  xhttp.open("GET", "http://194.59.164.174:3306/SendSMS?username=abcd&password=1234&phone=0946446465412x&message=hello+test", true);
			  xhttp.send();
		}
	</script>
	</body>
</html>
