<?php
    include('connect.php');
    if(isset($_GET['pid'])){
         $pid = $_GET['pid'];
        $q= mysqli_query($db,"select * from join_request where jr_id='$pid'");
        $query = mysqli_fetch_array($q);
        
        mysqli_query($db,"update join_request set delivery_status='processing' where jr_id='$pid' limit 1");
        	echo '<script>alert("Successfully set the delivery status to PROCESSING.");window.location.assign("orders.php");</script>';	

            
    }else if(isset($_GET['prid'])){
         $prid = $_GET['prid'];
        $q= mysqli_query($db,"select * from join_request where jr_id='$prid'");
        $query = mysqli_fetch_array($q);
        
        if( $query['classification'] == '3' || $query['classification'] == '2' ){
            
            $userid = $query['refered'];
        
        mysqli_query($db,"update join_request set delivery_status='delivered' where jr_id='$prid' limit 1");
        
        $number_of_downline=mysqli_query($db,"select count(account) as downline_count from user where under_userid='$userid'");
		$downline_number=mysqli_fetch_array($number_of_downline); 
		$downline_count = $downline_number['downline_count'];
 
    $tr_id = $query['order_id'];
    $tracking_number = $query['transac_code'];
    $upline = ($query['qty']*$query['price'])*.01;
    $downline = ($query['qty']*$query['price'])*.156/($downline_count + 1);
    
    date_default_timezone_set("asia/manila");
	$date = date("Y-m-d H:i:s");
		$income_data = income($userid);
		$new_day_bal = $income_data['day_bal'] + $downline;
					$new_current_bal = $income_data['current_bal']+ $downline;
					$new_total_bal = $income_data['total_bal']+ $downline;
					 	
          echo '<script>alert("Upline Received: '.$upline.'   Downline Received: '.$downline.'    User_id: '.$userid.'");window.location.assign("orders.php");</script>';
    $query_up = mysqli_query($db,"select * from user where account='$userid'");
									if(mysqli_num_rows($query_up)>0){
										$i=1;
										while($row=mysqli_fetch_array($query_up)){
											$id = $row['under_userid'];
												mysqli_query($db,"update income set  repurchase_total = repurchase_total + '$downline', day_bal = day_bal +'$downline', current_bal = current_bal +'$downline', total_bal = total_bal +'$downline'  where userid='$userid'");
										}
									}
    

        
         	mysqli_query($db,"update order_history_details set status='Delivering', tracking_number='$tracking_number', date_process='$date' where tr_id='$tr_id'");
         	mysqli_query($db,"update income set day_bal = day_bal +'$downline', current_bal = current_bal +'$downline', total_bal = total_bal +'$downline', repurchase_total = repurchase_total + '$downline' where under_userid='$userid'");	
         	
          echo '<script>alert("Successfully set the delivery status to DELIVERED.");window.location.assign("orders.php");</script>';
        }
        
        	else{
        	      mysqli_query($db,"update join_request set delivery_status='delivered' where jr_id='$prid' limit 1");
        	}
        	
        	
            
    }else if(isset($_GET['cid'])){
         $cid = $_GET['cid'];
        $q= mysqli_query($db,"select * from join_request where jr_id='$cid'");
        $query = mysqli_fetch_array($q);
        $product = $query['product'];
        $refered = $query['refered'];
        
        mysqli_query($db,"update join_request set delivery_status='cancelled' where jr_id='$cid' limit 1");
         mysqli_query($db,"update store_product set quantity=quantity+1 where product='$product' and store_uid='$refered'");
        
            	echo '<script>alert("Successfully set the delivery status to CANCELLED.");window.location.assign("orders.php");</script>';	
    }
        
function income($userid){
	include('connect.php');
	$data = array();
	$querys = mysqli_query($db,"select * from income where under_userid='$userid'");
	$result = mysqli_fetch_array($querys);
	$data['day_bal'] = $result['day_bal'];
	$data['current_bal'] = $result['current_bal'];
	$data['total_bal'] = $result['total_bal'];
	
	return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>MLM<span>ADMIN</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages
                  </a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span> Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span> Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span> Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span> New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="index.php?logout='1'">Logout</a>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a>
          </p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a  href="payout_requests.php">
              <i class="fa fa-dashboard"></i>
              <span>Payout Requests</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active" href="payout_requests.php">
              <i class="fa fa-dashboard"></i>
              <span>Orders</span>
              </a>
          </li>
          <li class="sub-menu">
            <a   href="membership_request.php">
              <i class="fa fa-dashboard"></i>
              <span>Membership Requests</span>
              </a>
          </li>
          <li class="sub-menu">
            <a   href="bonus_achievements.php">
              <i class="fa fa-dashboard"></i>
              <span>Bonus Achievements</span>
              </a>
          </li>
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Settings</span>
              </a>
            <ul class="sub">
              <li><a href="#">Add Users</a></li>
              <li><a href="#">Compensation Rates</a></li>
              <li><a href="#">User Profile</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Reports</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
       
      <section class="wrapper site-min-height">
           <h3><i class="fa fa-angle-right"></i> Basic Table Examples</h3>
        <div class="row mt">

          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#Pending">Pending</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#Processing">Processing</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#Delivered">Delivered</a>
                  </li>
                   <li>
                    <a data-toggle="tab" href="#Cancelled">Cancelled</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="Pending" class="tab-pane active">
                    <div class="row">
                      <!-- /col-md-6 -->
                        <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i>Orders</h4>
                    <hr>
                    <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Order No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Receiver</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Billing Address</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Contact No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Sender</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Date Ordered</th>
                    <th><i class="fa fa-bookmark"></i> Product</th>
                     <th><i class="fa fa-bookmark"></i> Amount</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                                include('connect.php');
                                
								$h=mysqli_query($db,"select * from join_request where delivery_status = 'pending' order by date_requested desc");
								
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td><?php echo $hrow['order_id']; ?></td>
											<td><?php echo $hrow['first_name']; $hrow['first_name']; ?></td>
											<td><?php echo $hrow['address']; ?></td>
											<td><?php echo $hrow['contact']; ?></td>
											<td><?php echo $hrow['store_email']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_requested']));?></td>
											<td><?php echo $hrow['product']; ?></td>
											<td><?php echo $hrow['price']; ?></td>
											<td><span class="label label-warning label-mini"><?php echo $hrow['delivery_status']; ?></span></td>
										     <td>
                                              <button class="btn btn-success btn-xs" onclick="location.href='orders.php?pid=<?php echo $hrow['jr_id']; ?>'"><i class="fa fa-check"></i></button>
                                              
                                              <button class="btn btn-danger btn-xs" onclick="location.href='orders.php?cid=<?php echo $hrow['jr_id']; ?>'"><i class="fa fa-trash-o "></i></button>
                                            </td>   
										</tr>
									<?php
								}
							?>
                </tbody>
              </table>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="Processing" class="tab-pane">
                    <div class="row">
                      <!-- /col-md-6 -->
                        <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Orders</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Order No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Receiver</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Billing Address</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Contact No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Sender</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Date Ordered</th>
                    <th><i class="fa fa-bookmark"></i> Product</th>
                     <th><i class="fa fa-bookmark"></i> Amount</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                                include('connect.php');
                                
								$h=mysqli_query($db,"select * from join_request where delivery_status='processing' order by date_requested desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td><?php echo $hrow['order_id']; ?></td>
											<td><?php echo $hrow['first_name']; $hrow['first_name']; ?></td>
											<td><?php echo $hrow['address']; ?></td>
											<td><?php echo $hrow['contact']; ?></td>
											<td><?php echo $hrow['store_email']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_requested']));?></td>
											<td><?php echo $hrow['product']; ?></td>
											<td><?php echo $hrow['price']; ?></td>
											<td><span class="label label-warning label-mini"><?php echo $hrow['delivery_status']; ?></span></td>
										     <td>
                                              <button class="btn btn-primary btn-xs" onclick="location.href='orders.php?prid=<?php echo $hrow['jr_id']; ?>'"><i class="fa fa-pencil"></i></button>
                                              <button class="btn btn-danger btn-xs" onclick="location.href='orders.php?cid=<?php echo $hrow['jr_id']; ?>'"><i class="fa fa-trash-o "></i></button>
                                            </td>   
										</tr>
									<?php
								}
							?>
                </tbody>
              </table>
                      <!-- /col-md-8 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="Delivered" class="tab-pane">
                    <div class="row">
                      <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Orders</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Order No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Receiver</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Billing Address</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Contact No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Sender</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Date Ordered</th>
                    <th><i class="fa fa-bookmark"></i> Product</th>
                     <th><i class="fa fa-bookmark"></i> Amount</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                                include('connect.php');
                                
								$h=mysqli_query($db,"select * from join_request where delivery_status='delivered' order by date_requested desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td><?php echo $hrow['order_id']; ?></td>
											<td><?php echo $hrow['first_name']; $hrow['first_name']; ?></td>
											<td><?php echo $hrow['address']; ?></td>
											<td><?php echo $hrow['contact']; ?></td>
											<td><?php echo $hrow['store_email']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_requested']));?></td>
											<td><?php echo $hrow['product']; ?></td>
											<td><?php echo $hrow['price']; ?></td>
											<td><span class="label label-warning label-mini"><?php echo $hrow['delivery_status']; ?></span></td>
										        
										</tr>
									<?php
								}
							?>
                </tbody>
              </table>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <!-- /tab-pane -->
                  <div id="Cancelled" class="tab-pane">
                    <div class="row">
                      <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Orders</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Order No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Receiver</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Billing Address</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Contact No.</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Sender</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Date Ordered</th>
                    <th><i class="fa fa-bookmark"></i> Product</th>
                     <th><i class="fa fa-bookmark"></i> Amount</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                     <th><i class=" fa fa-edit"></i> Reason</th>
                  
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                                include('connect.php');
                                
								$h=mysqli_query($db,"select * from join_request where delivery_status='cancelled' order by date_requested desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td><?php echo $hrow['order_id']; ?></td>
											<td><?php echo $hrow['first_name']; $hrow['first_name']; ?></td>
											<td><?php echo $hrow['address']; ?></td>
											<td><?php echo $hrow['contact']; ?></td>
											<td><?php echo $hrow['store_email']; ?></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['date_requested']));?></td>
											<td><?php echo $hrow['product']; ?></td>
											<td><?php echo $hrow['price']; ?></td>
											<td><span class="label label-warning label-mini"><?php echo $hrow['delivery_status']; ?></span></td>
										     <td>Return to Seller or Change of Mind</td>
										</tr>
									<?php
								}
							?>
                </tbody>
              </table>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
     
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="basic_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  
</body>

</html>
