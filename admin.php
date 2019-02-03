<?php
session_start(); 
define("NAME",$_SESSION['usrname']);
define("ID",$_SESSION['usrid']);
define("SHOP",$_SESSION['shopname']);

if(!isset($_SESSION['usrname'])){ 
header("location:log.php"); 
}
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
$i=0;
$mid=ID;
$sql="select Drug_Name  from medicine where Quantity <=5 and User_Id='$mid'";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res))
{
	$i++;
}
?>
<html>
	<head>
		<link href="material.txt" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
	body {
			background-image: url("bac.jpg");
			min-height:500px;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size:cover;
			}
	</style>
	</head>
	<body>
		<script type="text/javascript" src="js.txt"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script src="js/extra.js"></script>
		<script>
			$( document ).ready(function(){
			$(".dropdown-button").dropdown();
			});
		</script>
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="medicine.php">Add medicine</a></li>
			<li><a href="stock.php">Stock</a></li>
			<li><a href="viewmed.php">view medicine</a></li>
		</ul>
		<ul id="dropdown2" class="dropdown-content">
			<li><a href="aprofile.php">Profile</a></li>
			<li><a href="logout.php">sign out</a></li>
		</ul>
		<div class="navbar-fixed">
			<nav class="N/A transparent"> 
				<div class="nav-wrapper">
						<a href="#" class="brand-logo center"><h4 class="black-text"><?php echo SHOP ?></h4></a>
						<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Medicines<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="aorder.php">Order details</a></li>
						</ul>
						<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="not.php">Notification<span class="new badge"><?php echo $i;?></span></a></li>
							<li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo NAME?><i class="material-icons right">arrow_drop_down</i></a></li>
						</ul>
				</div>
			</nav>
		</div>
	</body>
</html>