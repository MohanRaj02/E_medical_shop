<?php
session_start();
define("NAME",$_SESSION['usrname']);
?>
<html>
	<head>
		<link href="material.txt" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
  tr:nth-child(even) {
  background-color: #CCCCCC;
  }
  </style>
	</head>
	<body>
		<script type="text/javascript" src="js.txt"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script src="js/extra.js"></script>
		 <div class="container">
  <div class="jumbotron">
    <h1 style="text-align:center; font-size: 50px; color:#00FF66">Profile</h1> 
   <br><br>
   
  </div>
  </div>  
		<table class="container">
		<?php
		$con=mysql_connect("localhost","root","")
		or die("cannot connected");
		mysql_select_db("medishop",$con);
		$u=NAME;
		$sql="select * from admin_account where User_Name='$u'";
		$res=mysql_query($sql);
		$row=mysql_fetch_assoc($res);
		echo"<tr><td>First Name</td><td>".$row['First_Name']."</td></tr>";
		echo"<tr><td>Last Name</td><td>".$row['Last_Name']."</td></tr>";
		echo"<tr><td>Shop Name</td><td>".$row['Shop_Name']."</td></tr>";
		echo"<tr><td>Address</td><td>".$row['Address']."</td></tr>";
		echo"<tr><td>District</td><td>".$row['District']."</td></tr>";
		echo"<tr><td>State</td><td>".$row['State']."</td></tr>";
		echo"<tr><td>Gender</td><td>".$row['Gender']."</td></tr>";
		echo"<tr><td>E-mail</td><td>".$row['Email']."</td></tr>";
		echo"<tr><td>Phone Number</td><td>".$row['Phone_Number']."</td></tr>";
		?>
		</table>
	</body>
</html>