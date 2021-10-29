<?php
error_reporting(E_ALL ^ E_NOTICE);  
include('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];

$get_userid = mysqli_query($con,"select * from user where account='$email'");
						$result_get_userid  = mysqli_fetch_array($get_userid );
						$userid = $result_get_userid['email'];



$search = $userid;
?><?php
function tree_data($userid){
global $con;
$data = array();
$query = mysqli_query($con,"select * from tree where userid='$userid'");
$result = mysqli_fetch_array($query);
$data['A'] = $result['A'];
$data['B'] = $result['B'];
$data['C'] = $result['C'];
$data['D'] = $result['D'];
$data['E'] = $result['E'];
$data['F'] = $result['F'];
$data['G'] = $result['G'];
$data['H'] = $result['H'];
$data['I'] = $result['I'];
$data['J'] = $result['J'];
$data['K'] = $result['K'];
$data['L'] = $result['L'];
$data['Acount'] = $result['Acount'];
$data['Bcount'] = $result['Bcount'];
$data['Ccount'] = $result['Ccount'];
$data['Dcount'] = $result['Dcount'];
$data['Ecount'] = $result['Ecount'];
$data['Fcount'] = $result['Fcount'];
$data['Gcount'] = $result['Gcount'];
$data['Hcount'] = $result['Hcount'];
$data['Icount'] = $result['Icount'];
$data['Jcount'] = $result['Jcount'];
$data['Kcount'] = $result['Kcount'];
$data['Lcount'] = $result['Lcount'];
return $data;
}
?>
<?php 
if(isset($_GET['search-id'])){
$search_id = mysqli_real_escape_string($con,$_GET['search-id']);
if($search_id!=""){
$query_check = mysqli_query($con,"select * from user where email='$search_id'");
if(mysqli_num_rows($query_check)>0){
$search = $search_id;
}
else{
echo '<script>alert("Access Denied");window.location.assign("tree.php");</script>';
}
}
else{
echo '<script>alert("Access Denied");window.location.assign("tree.php");</script>';
} 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>
<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<style>
#tooltip {
  display: inline;
  position: relative;
}
#tooltip:hover:after{
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  background: #444;
  border-radius: 8px;
  color: #fff;
content: attr(title);
  margin: -50px auto 0;
  font-size: 16px;
  padding: 13px;
  width: 220px;
}

</style>

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
<h1 class="page-header">Resellers Data</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-18">
<div class="table-responsive">
<table class="table" style="text-align:center; border: 1px solid black; width: 100%; word-wrap:break-word;
              table-layout: fixed;">
<tr>
<?php
$data = tree_data($search);
?>

</tr>
<tr height="150">
<?php
$first_A_user = $data['A'];
$first_B_user = $data['B'];
$first_C_user = $data['C'];
$first_D_user = $data['D'];
$first_E_user = $data['E'];
$first_F_user = $data['F'];
$first_G_user = $data['G'];
$first_H_user = $data['H'];
$first_I_user = $data['I'];
$first_J_user = $data['J'];
$first_K_user = $data['K'];
$first_L_user = $data['L'];
$query1 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_A_user'");
$result1 = mysqli_fetch_array($query1);
$queryinfo1 = mysqli_query($con,"select * from user where email='$first_A_user'");
$resultinfo1 = mysqli_fetch_array($queryinfo1);

$query2 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_B_user'");
$result2 = mysqli_fetch_array($query2);
$queryinfo2 = mysqli_query($con,"select * from user where email='$first_B_user'");
$resultinfo2 = mysqli_fetch_array($queryinfo2);

$query3 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_C_user'");
$result3 = mysqli_fetch_array($query3);
$queryinfo3 = mysqli_query($con,"select * from user where email='$first_C_user'");
$resultinfo3 = mysqli_fetch_array($queryinfo3);

$query4 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_D_user'");
$result4 = mysqli_fetch_array($query4);
$queryinfo4 = mysqli_query($con,"select * from user where email='$first_D_user'");
$resultinfo4 = mysqli_fetch_array($queryinfo4);

$query5 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_E_user'");
$result5 = mysqli_fetch_array($query5);
$queryinfo5 = mysqli_query($con,"select * from user where email='$first_E_user'");
$resultinfo5 = mysqli_fetch_array($queryinfo5);

$query6 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_F_user'");
$result6 = mysqli_fetch_array($query6);
$queryinfo6 = mysqli_query($con,"select * from user where email='$first_F_user'");
$resultinfo6 = mysqli_fetch_array($queryinfo6);

$query7 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_G_user'");
$result7 = mysqli_fetch_array($query7);
$queryinfo7 = mysqli_query($con,"select * from user where email='$first_G_user'");
$resultinfo7 = mysqli_fetch_array($queryinfo7);

$query8 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_H_user'");
$result8 = mysqli_fetch_array($query8);
$queryinfo8 = mysqli_query($con,"select * from user where email='$first_H_user'");
$resultinfo8 = mysqli_fetch_array($queryinfo8);

$query9 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_I_user'");
$result9 = mysqli_fetch_array($query9);
$queryinfo9 = mysqli_query($con,"select * from user where email='$first_I_user'");
$resultinfo9 = mysqli_fetch_array($queryinfo9);

$query10 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_J_user'");
$result10 = mysqli_fetch_array($query10);
$queryinfo10 = mysqli_query($con,"select * from user where email='$first_J_user'");
$resultinfo10 = mysqli_fetch_array($queryinfo10);

$query11 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_K_user'");
$result11 = mysqli_fetch_array($query11);
$queryinfo11 = mysqli_query($con,"select * from user where email='$first_K_user'");
$resultinfo11 = mysqli_fetch_array($queryinfo11);

$query12 = mysqli_query($con,"select *, COUNT(email) as downline_count from user where under_userid='$first_L_user'");
$result12 = mysqli_fetch_array($query12);
$queryinfo12 = mysqli_query($con,"select * from user where email='$first_L_user'");
$resultinfo12 = mysqli_fetch_array($queryinfo12);
?>
<?php 
if($first_A_user!=""){
    if($resultinfo1['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;">
    <i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo1['mobile'] ?>, <?php echo $resultinfo1['account'] ?> , <?php echo $resultinfo1['last_movement'] ?>"  > <span class="badge" style="font-size: 20px;"><?php echo $result1['downline_count'] ?></span></i><p style="font-size: 15px" ><?php echo $first_A_user ?></p>
    
 
    </td>
    <?php 
}
 if($resultinfo1['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo1['mobile'] ?>, <?php echo $resultinfo1['account'] ?>, <?php echo $resultinfo1['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result1['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_A_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo1['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo1['mobile'] ?>, <?php echo $resultinfo1['account'] ?>, <?php echo $resultinfo1['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result1['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_A_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo1['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo1['mobile'] ?>, <?php echo $resultinfo1['account'] ?>, <?php echo $resultinfo1['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result1['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_A_user ?></p>
     
    </td>
    <?php
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i><p><?php echo $first_A_user ?></p></td>
<?php
}
?>
<?php 
if($first_B_user!=""){
    if($resultinfo2['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo2['mobile'] ?>, <?php echo $resultinfo2['account'] ?>, <?php echo $resultinfo2['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result2['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_B_user ?></p>
     
    </td>
    <?php 
}
 if($resultinfo2['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo2['mobile'] ?>, <?php echo $resultinfo2['account'] ?>, <?php echo $resultinfo2['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result2['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_B_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo2['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo2['mobile'] ?>, <?php echo $resultinfo2['account'] ?>, <?php echo $resultinfo2['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result2['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_B_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo2['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo2['mobile'] ?>, <?php echo $resultinfo2['account'] ?>, <?php echo $resultinfo2['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result2['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_B_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i><p><?php echo $first_B_user ?></p></td>
<?php
}
?>
<?php 
if($first_C_user!=""){
       if($resultinfo3['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo3['mobile'] ?>, <?php echo $resultinfo3['account'] ?>, <?php echo $resultinfo3['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result3['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_C_user ?></p></td>
<?php 
}
 if($resultinfo3['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo3['mobile'] ?>, <?php echo $resultinfo3['account'] ?>, <?php echo $resultinfo3['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result3['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_C_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo3['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo3['mobile'] ?>, <?php echo $resultinfo3['account'] ?>, <?php echo $resultinfo3['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result3['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_C_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo3['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo3['mobile'] ?>, <?php echo $resultinfo3['account'] ?>, <?php echo $resultinfo3['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result3['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_C_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i><p><?php echo $first_C_user ?></p></td>
<?php
}
?>
<?php 
if($first_D_user!=""){
       if($resultinfo4['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo4['mobile'] ?>, <?php echo $resultinfo4['account'] ?>, <?php echo $resultinfo4['last_movement'] ?>  "><span class="badge" style="font-size: 20px;"><?php echo $result4['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_D_user ?></p></td>
<?php 
}
 if($resultinfo4['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo4['mobile'] ?>, <?php echo $resultinfo4['account'] ?>, <?php echo $resultinfo4['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result4['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_D_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo4['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo4['mobile'] ?>, <?php echo $resultinfo4['account'] ?>, <?php echo $resultinfo4['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result4['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_D_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo4['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo4['mobile'] ?>, <?php echo $resultinfo4['account'] ?>, <?php echo $resultinfo4['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result4['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_D_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i><p><?php echo $first_D_user ?></p></td>
<?php
}
?>
<?php 
if($first_E_user!=""){
       if($resultinfo5['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo5['mobile'] ?>, <?php echo $resultinfo5['account'] ?>, <?php echo $resultinfo5['last_movement'] ?>  "><span class="badge" style="font-size: 20px;"><?php echo $result5['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_E_user ?></p></td>
<?php 
}
 if($resultinfo5['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo5['mobile'] ?>, <?php echo $resultinfo5['account'] ?>, <?php echo $resultinfo5['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result5['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_E_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo5['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo5['mobile'] ?>, <?php echo $resultinfo5['account'] ?>, <?php echo $resultinfo5['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result5['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_E_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo5['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo5['mobile'] ?>, <?php echo $resultinfo5['account'] ?>, <?php echo $resultinfo5['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result5['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_E_user ?></p>
     
    </td>

<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i><p><?php echo $first_E_user ?></p></td>
<?php
}
?>
<?php 
if($first_F_user!=""){
       if($resultinfo6['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo6['mobile'] ?>, <?php echo $resultinfo6['account'] ?> , <?php echo $resultinfo6['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result6['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_F_user ?></p></td>
<?php 
}
 if($resultinfo6['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo6['mobile'] ?>, <?php echo $resultinfo6['account'] ?>, <?php echo $resultinfo6['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result6['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_F_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo6['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo6['mobile'] ?>, <?php echo $resultinfo6['account'] ?>, <?php echo $resultinfo6['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result6['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_F_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo6['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo6['mobile'] ?>, <?php echo $resultinfo6['account'] ?>, <?php echo $resultinfo6['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result6['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_F_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i><p><?php echo $first_F_user ?></p></td>
<?php
}
?>
</tr>

<tr height="150">
<?php 
if($first_G_user!=""){
       if($resultinfo7['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo7['mobile'] ?>, <?php echo $resultinfo7['account'] ?> , <?php echo $resultinfo7['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result7['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_G_user ?></p></td>
<?php 
}
 if($resultinfo7['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo7['mobile'] ?>, <?php echo $resultinfo7['account'] ?>, <?php echo $resultinfo7['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result7['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_G_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo7['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo7['mobile'] ?>, <?php echo $resultinfo7['account'] ?>, <?php echo $resultinfo7['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result7['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_G_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo7['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo7['mobile'] ?>, <?php echo $resultinfo7['account'] ?>, <?php echo $resultinfo7['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result7['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_G_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i></td>
<?php
}
?>
<?php 
if($first_H_user!=""){
       if($resultinfo8['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo8['mobile'] ?>, <?php echo $resultinfo8['account'] ?>, <?php echo $resultinfo8['last_movement'] ?>  "><span class="badge" style="font-size: 20px;"><?php echo $result8['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_H_user ?></p></td>
<?php 
}
 if($resultinfo8['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo8['mobile'] ?>, <?php echo $resultinfo8['account'] ?>, <?php echo $resultinfo8['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result8['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_H_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo8['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo8['mobile'] ?>, <?php echo $resultinfo8['account'] ?>, <?php echo $resultinfo8['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result8['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_H_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo8['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo8['mobile'] ?>, <?php echo $resultinfo8['account'] ?>, <?php echo $resultinfo8['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result8['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_H_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i></td>
<?php
}
?>
<?php 
if($first_I_user!=""){
       if($resultinfo9['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo9['mobile'] ?>, <?php echo $resultinfo9['account'] ?> , <?php echo $resultinfo9['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result9['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_I_user ?></p></td>
<?php 
}
 if($resultinfo9['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo9['mobile'] ?>, <?php echo $resultinfo9['account'] ?>, <?php echo $resultinfo9['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result9['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_I_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo9['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo9['mobile'] ?>, <?php echo $resultinfo9['account'] ?>, <?php echo $resultinfo9['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result9['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_I_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo9['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo9['mobile'] ?>, <?php echo $resultinfo9['account'] ?>, <?php echo $resultinfo9['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result9['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_I_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i></td>
<?php
}
?>
<?php 
if($first_J_user!=""){
       if($resultinfo10['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo10['mobile'] ?>, <?php echo $resultinfo10['account'] ?> , <?php echo $resultinfo10['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result10['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_J_user ?></p></td>
<?php 
}
 if($resultinfo10['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo10['mobile'] ?>, <?php echo $resultinfo10['account'] ?>, <?php echo $resultinfo10['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result10['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_J_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo10['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo10['mobile'] ?>, <?php echo $resultinfo10['account'] ?>, <?php echo $resultinfo10['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result10['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_J_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo10['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo10['mobile'] ?>, <?php echo $resultinfo10['account'] ?>, <?php echo $resultinfo10['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result10['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_J_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i></td>
<?php
}
?>
<?php 
if($first_K_user!=""){
       if($resultinfo11['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo11['mobile'] ?>, <?php echo $resultinfo11['account'] ?> , <?php echo $resultinfo11['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result11['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_K_user ?></p></td>
<?php 
}
 if($resultinfo11['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo11['mobile'] ?>, <?php echo $resultinfo11['account'] ?>, <?php echo $resultinfo11['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result11['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_K_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo11['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo11['mobile'] ?>, <?php echo $resultinfo11['account'] ?>, <?php echo $resultinfo11['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result11['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_K_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo11['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo11['mobile'] ?>, <?php echo $resultinfo11['account'] ?>, <?php echo $resultinfo11['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result11['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_K_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i></td>
<?php
}
?>
<?php 
if($first_L_user!=""){
       if($resultinfo12['is_active'] == "no")
    {
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#f79862" title="<?php echo $resultinfo12['mobile'] ?>, <?php echo $resultinfo12['account'] ?> , <?php echo $resultinfo12['last_movement'] ?> "><span class="badge" style="font-size: 20px;"><?php echo $result12['downline_count'] ?></span></i><p style="font-size: 15px"><?php echo $first_L_user ?></p></td>
<?php 
}
 if($resultinfo12['is_active'] == "For Delivery"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#fada5e" title="<?php echo $resultinfo12['mobile'] ?>, <?php echo $resultinfo12['account'] ?>, <?php echo $resultinfo12['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result12['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_L_user ?></p>
     
    </td>
     <?php 
}
 if($resultinfo12['is_active'] == "request"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#0278ae" title="<?php echo $resultinfo12['mobile'] ?>, <?php echo $resultinfo12['account'] ?>, <?php echo $resultinfo12['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result12['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_L_user ?></p>
     
    </td>
         <?php 
}
 if($resultinfo12['is_active'] == "Confirmed"){
?>
<td width="50" style="word-wrap:break-word;white-space: normal;"><i class="fa fa-user fa-4x" id="tooltip" style="color:#065724" title="<?php echo $resultinfo12['mobile'] ?>, <?php echo $resultinfo12['account'] ?>, <?php echo $resultinfo12['last_movement'] ?> ">
    <span class="badge" style="font-size: 20px;"><?php echo $result12['downline_count'] ?></span></i>
  
    <p style="font-size: 15px"><?php echo $first_L_user ?></p>
     
    </td>
<?php 
}
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:'grey'"></i></td>
<?php
}
?>
</tr>

</table>

</div>
</div>
</div>
</div>
<!-- /.container-fluid -->

<?php include('home.php') ?>



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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
   
</body>

</html>