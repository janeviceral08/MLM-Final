<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlml Website  - Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Home</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	 <?php
						$query = mysqli_query($con,"select * from income where userid='$userid'");
						$result = mysqli_fetch_array($query);
					?>
                	<div class="col-lg-3">
                    	<div class="panel panel-info">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Today's Income</h4>
                            </div>
                            <div class="panel-body">
                            	<?php 
								echo $result['day_bal']
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    	<div class="panel panel-success">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Current Income</h4>
                            </div>
                            <div class="panel-body">
                            	<?php 
								echo $result['current_bal']
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    	<div class="panel panel-danger">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Total Income</h4>
                            </div>
                            <div class="panel-body">
                            	<?php 
								echo $result['total_bal']
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    	<div class="panel panel-warning">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Available Pin</h4>
                            </div>
                            <div class="panel-body">
                            	<?php 
								echo  mysqli_num_rows(mysqli_query($con,"select * from pin_list where userid='$userid' and status='open'"));
								?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                    	<div class="panel panel-warning">
                        	<div class="panel-heading">
                            	<h4 class="panel-title"> Bonus</h4>
                            </div>
                            <div class="panel-body">
                            <?php 
                                $query=mysqli_query($con,"SELECT * FROM bunos WHERE userid = '$userid'");
                                while($row=mysqli_fetch_array($query)){
								?>
                         <?php 
                                                if($row['bunos_count'] == 1 && $row['active1'] == 1)
                                                {
                                                  echo "Bonus for level 1";
                                                }
                                                elseif($row['bunos_count'] == 4 && $row['active2'] == 1)
                                                {
                                                    echo "Bonus for level 2";
                                                  }
                                                elseif($row['bunos_count'] == 13 && $row['active3'] == 1)
                                                  {
                                                      echo "Bonus for level 3";
                                                    }
                                                elseif($row['bunos_count'] == 40 && $row['active4'] == 1)
                                                    {
                                                        echo "Bonus for level 4";
                                                      }
                                                elseif($row['bunos_count'] == 121 && $row['active5'] == 1)
                                                      {
                                                          echo "Bonus for level 5";
                                                        }
                                                elseif($row['bunos_count'] == 364 && $row['active6'] == 1)
                                                        {
                                                            echo "Bonus for level 6";
                                                          }
                                                else{
                                                    echo "you don't have any bonus yet";
                                                }
                                                
                                                ?>
							<?php
                            }
                          
                                ?>
                              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered table-striped">
                            	<tr>
                                	<th>S.n.</th>
                                    <th>Details</th>
                                </tr>
                                <?php
									$i=1;
									$query = mysqli_query($con,"select * from income_history where user_id='$userid' order by id desc");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
                                            $amount = $row['amount'];
                                            $level = $row['level'];
										?>
                                        	<tr>
                                            	<td><?php echo $i ?></td>
                                                <td><?php echo "You received " .$amount. " from your level ". $level." downline."  ?></td>
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="2">Sorry you have no income.</td>
                                        </tr>
                                    <?php
									}
								?>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
