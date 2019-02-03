<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
session_start();
define("SHOP",$_SESSION['shopname']);
$sql="select * from order_detail";
$res=mysql_query($sql);
?>
<html>
<head>
		<link href="material.txt" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
		table {
    font-family: arial, sans-serif;
	border:1px solid black;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color:#69f0ae;
}
		</style>
	</head>
	<body>
		<script type="text/javascript" src="js.txt"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script src="js/extra.js"></script>
		<table>
			<tr>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Delivery Address</th>
			<th>Contact Number</th>
			<th>Bill Amount</th>
			</tr>
	<?php
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		if(SHOP==$row['Shop'])
		{
			echo "<tr>";
			echo "<td>".$row['Medicine_Name']."</td>";
			echo "<td>".$row['Quantity']."</td>";
			echo "<td>".$row['Ship_Address']."</td>";
			echo "<td>".$row['Contact_Number']."</td>";
			echo "<td>".$row['Amount']."</td>";
			echo "</tr>";
		}
	}
	?>
		</table>
	</body>
</html>