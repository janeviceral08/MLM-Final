<?php
include('connect.php');

$userid = $_SESSION['userid'];

$query2 = mysqli_query($con,"SELECT * FROM `user` WHERE account='$userid'");
						$result_from_query2 = mysqli_fetch_array($query2);
						 $user_email=$result_from_query2['email'];
						 
$query1 = mysqli_query($con,"SELECT COUNT(user_id) as items FROM `cart` WHERE user_id='$user_email'");
						$result = mysqli_fetch_array($query1);
                $items=$result['items'];
                
                
                $query3 = mysqli_query($con,"SELECT * FROM `message` WHERE userid='$user_email' order by date_sent DESC limit 1");
						$result3 = mysqli_fetch_array($query3);
                $status=$result3['status'];
                 $to_receiver=$result3['to_receiver'];
?>


        <style>

    
    .topnav {
  overflow: hidden;
  background-color: black;
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
  background-color: #0e8239;
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
 <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=install_email
        page_id="101925948515472"
  theme_color="#13cf13">
      </div>
      
      

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: black;">
            
                <!-- /.navbar-header -->

    <section class="content-header">
               <div class="topnav" id="myTopnav">
  <a href="home.php"  style="font-size: 22px" class="active">Home</a>
  
  <a href="profile.php"  style="font-size: 22px"> User Profile</a>
 <a href="payment_setting.php"  style="font-size: 22px"> Payment Settings</a>
 <a href="logout.php"  style="font-size: 22px"> Logout</a>
  <a href="javascript:void(0);" style="font-size:22px; margin-right: 0px; " class="icon" onclick="myFunction()">⚙️</a>
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
                        <span class="sr-only" >Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
</div>
  </section>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu" style="font-size: 25px;">
                             <li>
                            <a href="join.php" style="color: #065724"><i class="fa fa-user-plus fa-fw"></i> Add Distributor</a>
                        </li>
                          <li>
                            <a href="tree.php" style="color: #065724"><i class="fa fa-sitemap"></i> User Portfolio</a>
                        </li>
                       
	<li>
                            <a href="chat/chatroom.php" style="color: #065724"><i class="fa fa-commenting-o"></i> Message</a>
                        </li>
                        
                 	<li>
                            <a href="request_replace.php" style="color: #065724"><i class="fa fa-user-times"></i> Replacement Request</a>
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
