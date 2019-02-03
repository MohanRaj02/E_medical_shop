<?php
session_start();
define("ID",$_SESSION['usrid']);
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
$i=ID;
$sql="select * from medicine where User_Id='$i'";
$res=mysql_query($sql);
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
		<h1 style="text-align:center; font-size: 50px; color:#00FF66">Stock Details</h1>
		<table>
<tr bgcolor=red>
<th>Drug Name</th>
<th>Product Type</th>
<th>Quantity</th>
</tr>
<?php
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo "<tr >";
	echo "<td>".$row['Drug_Name']."</td>";
	echo "<td>".$row['Product_Type']."</td>";
	echo "<td>".$row['Quantity']."</td>";
	echo "</tr>";
	
}
mysql_close($con);
?>
</table>
</body>
</html>
</html>