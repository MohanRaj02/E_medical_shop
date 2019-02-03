<?php
session_start();
define("ID",$_SESSION['usrid']);
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
$i=ID;
$sql="select Drug_Name from medicine where User_Id='$i'and Quantity<=5";
$res=mysql_Query("$sql");
?>
<html>
	<head>
		<link href="material.txt" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<script type="text/javascript" src="js.txt"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script src="js/extra.js"></script>
		<?php
		if($res>1)
		{
		while($row=mysql_fetch_array($res))
		{
			echo"<font color=green size='6pt'>".$row['Drug_Name']."</font>";
			echo"<center><a href='editmed1.php'><h5>click here to update the quantity</h5><button class='waves-effect waves-light green btn' type='submit'>Change</button></a>";
		}
		}
		?>
	</body>
</html>