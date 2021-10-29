<head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 25px;
  text-align: center;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
</head>
<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$search = $userid;
?>
<?php
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
<title>Mlml Website - Tree</title>
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
<h1 class="page-header">Downlines</h1>
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
?>
<?php 
if($first_A_user!=""){
?>
<td width="50"><a href="tree.php?search-id=<?php echo $first_A_user ?>"><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p style="font-size: 11px" ><?php echo $first_A_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p><?php echo $first_A_user ?></p></td>
<?php
}
?>
<?php 
if($first_B_user!=""){
?>
<td width="50"><a href="tree.php?search-id=<?php echo $first_B_user ?>"><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p style="font-size: 11px"><?php echo $first_B_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p><?php echo $first_B_user ?></p></td>
<?php
}
?>
<?php 
if($first_C_user!=""){
?>
<td width="50"><a href="tree.php?search-id=<?php echo $first_C_user ?>"><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p style="font-size: 11px"><?php echo $first_C_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p><?php echo $first_C_user ?></p></td>
<?php
}
?>
<?php 
if($first_D_user!=""){
?>
<td width="50"><a href="tree.php?search-id=<?php echo $first_D_user ?>"><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p style="font-size: 11px"><?php echo $first_D_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p><?php echo $first_D_user ?></p></td>
<?php
}
?>
<?php 
if($first_E_user!=""){
?>
<td width="50"><a href="tree.php?search-id=<?php echo $first_E_user ?>"><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p style="font-size: 11px"><?php echo $first_E_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p><?php echo $first_E_user ?></p></td>
<?php
}
?>
<?php 
if($first_F_user!=""){
?>
<td width="50"><a href="tree.php?search-id=<?php echo $first_F_user ?>"><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p style="font-size: 11px"><?php echo $first_F_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#D520BE"></i><p><?php echo $first_F_user ?></p></td>
<?php
}
?>
</tr>

<tr height="150">
<?php 
if($first_G_user!=""){
?>
<td width="80"><a href="tree.php?search-id=<?php echo $first_G_user ?>"><i class="fa fa-user fa-4x" style="color:#361515"></i><p style="font-size: 11px"><?php echo $first_G_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#361515"></i></td>
<?php
}
?>
<?php 
if($first_H_user!=""){
?>
<td width="20"><a href="tree.php?search-id=<?php echo $first_H_user ?>"><i class="fa fa-user fa-4x" style="color:#361515"></i><p style="font-size: 11px"><?php echo $first_H_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#361515"></i></td>
<?php
}
?>
<?php 
if($first_I_user!=""){
?>
<td width="20"><a href="tree.php?search-id=<?php echo $first_I_user ?>"><i class="fa fa-user fa-4x" style="color:#361515"></i><p style="font-size: 11px"><?php echo $first_I_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#361515"></i></td>
<?php
}
?>
<?php 
if($first_J_user!=""){
?>
<td width="20"><a href="tree.php?search-id=<?php echo $first_J_user ?>"><i class="fa fa-user fa-4x" style="color:#361515"></i><p style="font-size: 11px"><?php echo $first_J_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#361515"></i></td>
<?php
}
?>
<?php 
if($first_K_user!=""){
?>
<td width="20"><a href="tree.php?search-id=<?php echo $first_K_user ?>"><i class="fa fa-user fa-4x" style="color:#361515"></i><p style="font-size: 11px"><?php echo $first_K_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#361515"></i></td>
<?php
}
?>
<?php 
if($first_L_user!=""){
?>
<td width="20"><a href="tree.php?search-id=<?php echo $first_L_user ?>"><i class="fa fa-user fa-4x" style="color:#361515"></i><p style="font-size: 11px"><?php echo $first_L_user ?></p></a></td>
<?php 
}
else{
?>
<td><i class="fa fa-user fa-4x" style="color:#361515"></i></td>
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