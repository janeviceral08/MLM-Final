<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Compensation Table</title>
		<link rel = "stylesheet" type = "text/css" href = "php_-_live_crud_operation_in_html_table/css/bootstrap.css" />
		<meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1"/>
		       <style>
    
    .topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
    </style>
	</head>
<body>
	 <div class="topnav" id="myTopnav">
  <a href="home.php"  style="font-size: 22px">Leafy Roots Foods INC.</a>
  <a href="profile.php"  style="font-size: 22px"><i class="fa fa-user fa-fw"></i> User Profile </a>
  <a href="compensationSetting.php"  style="font-size: 22px" class="active"><i class="fa fa-gear fa-fw"></i> Settings</a>
 <a href="logout.php"  style="font-size: 22px"> Logout</a>
  <a href="javascript:void(0);" style="font-size:22px; margin-right: 0px" class="icon" onclick="myFunction()">&#128203;</a>
 
</div>
	<div class = "col-md-3"></div>
	<div class = "col-md-6 well">
		<h3 class = "text-primary">Compensation Table</h3>
		<hr style = "border-top:1px solid #000;" />
		<div id = "data"></data>
	</div>
</body>
<script src = "php_-_live_crud_operation_in_html_table/js/jquery-3.2.1.js"></script>

<script src = "php_-_live_crud_operation_in_html_table/js/script.js"></script>
</html>