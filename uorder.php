<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
session_start();
define("UNAME",$_SESSION['uusrname']);
$sql="select * from order_detail";
$res=mysql_query($sql);
if(! $res ) {
      die('Could not get data: ' . mysql_error());
   }
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
		<h1 style="text-align:center; font-size: 50px; color:#00FF66">Order Details</h1>
		<table>
			<tr bgcolor=yellow>
			<th>Medicines</th>
			<th>Quantity</th>
			<th>Shop Name</th>
			<th>Delivery Address</th>
			<th>Phone Number</th>
			<th>Bill Amount</th>
			</tr>
		<?php
			while($row=mysql_fetch_array($res,MYSQL_ASSOC))
			{
				if(UNAME==$row['User_Name'])
				{
				echo "<tr>";
				echo "<td>".$row['Medicine_Name']."</td>";
				echo "<td>".$row['Quantity']."</td>";
				echo "<td>".$row['Shop']."</td>";
				echo "<td>".$row['Ship_Address']."</td>";
				echo "<td>".$row['Contact_Number']."</td>";
				echo "<td>".$row['Amount']."</td>";
				echo "</tr>";
				}
			}
		mysql_close($con);
		?>
		</table>
	</body>
</html>