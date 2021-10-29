<?php
include('../php-includes/connect.php');

$userid = $_SESSION['userid'];

$query1 = mysqli_query($con,"SELECT COUNT(user_id) as items FROM `cart` WHERE user_id='$userid'");
						$result = mysqli_fetch_array($query1);
                $items=$result['items'];

?>
        <style>
    body, html {
    font-size: 22px;
    zoom: 90%;
    }
    
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
    
    <?php



include('../php-includes/connect.php');

$userid = $_SESSION['userid'];

$query1 = mysqli_query($con,"SELECT COUNT(user_id) as orders FROM order_history_details WHERE status='To be Process'");
						$result = mysqli_fetch_array($query1);
                $orders=$result['orders'];
                
                $query2 = mysqli_query($con,"SELECT COUNT(email) as pins FROM pin_request WHERE status='open'");
						$result_pin = mysqli_fetch_array($query2);
                $pins=$result_pin['pins'];
                
                 $query3 = mysqli_query($con,"SELECT COUNT(userid) as payout FROM payout_request WHERE status='pending'");
						$result_payout = mysqli_fetch_array($query3);
                $payout=$result_payout['payout'];
                
                 $query4 = mysqli_query($con,"SELECT COUNT(DISTINCT userid) as message FROM message WHERE status='unread' AND to_receiver='admin'");
						$result_message = mysqli_fetch_array($query4);
                $message=$result_message['message'];

?>


    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: black;">
            
                <!-- /.navbar-header -->

               <div class="topnav" id="myTopnav">
  <a href="../home.php"  style="font-size: 22px" class="active">Leafy Roots Foods INC.</a>
  <a href="../profile.php"  style="font-size: 22px"><i class="fa fa-user fa-fw"></i> User Profile </a>
  <a href="../compensationSetting.php"  style="font-size: 22px"><i class="fa fa-gear fa-fw"></i> Settings</a>
 <a href="../logout.php"  style="font-size: 22px"> Logout</a>
  <a href="javascript:void(0);" style="font-size:22px; margin-right: 0px" class="icon" onclick="myFunction()">&#128203;</a>
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
</div>
               <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                            <a href="../home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="../view-pin-request.php"><i class="fa fa-adjust fa-fw"></i> View Pin Request  <span class="badge"><?php echo $pins ?></span></a>
                        </li>
                            <li>
                            <a href="../view-payout-request.php"><i class="fa fa-adjust fa-fw"></i> View Payout Request <span class="badge"><?php echo $payout ?></span></a>
                        </li>
                        <li>
                            <a href="../order.php"><i class="fa fa-adjust fa-fw"></i>Orders     <span class="badge"><?php echo $orders ?></span></a> 
                        </li>
                        <li>
                            <a href="../message.php"><i class="fa fa-rupee fa-fw"></i> Messages <span class="badge"><?php echo $message ?></span></a>
                        </li>
                        <li>

                            <a href="../bonus.php"><i class="fa fa-adjust fa-fw"></i>Bonus Request
      </a>
                        </li>
                     
                        <li>
                            <a href="../pin-history.php"><i class="fa fa-adjust fa-fw"></i> Pin History</a>
                        </li>
                       
                          <li>
                            <a href="../payout-history.php"><i class="fa fa-adjust fa-fw"></i> View Payout History</a>
                        </li>
                        
                          <li>
                            <a href="../order_history.php"><i class="fa fa-adjust fa-fw"></i>Orders History</a>
                        </li>
                        <li>
                            <a href="../purchased_products.php"><i class="fa fa-adjust fa-fw"></i>Purchased Products</a>
                        </li>
                        <li>
                            <a href="../income.php"><i class="fa fa-rupee fa-fw"></i> Income</a>
                        </li>
                        <li>
                            <a href="../user_income_log.php"><i class="fa fa-rupee fa-fw"></i> Users Log </a>
                        </li>
                        <li>
                            <a href="../user_list.php"><i class="fa fa-rupee fa-fw"></i> Users List </a>
                        </li>
                         
                        <li>
                            <a href="../message-answered.php"><i class="fa fa-rupee fa-fw"></i> Answered Messages </a>
                        </li>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            
                  <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>