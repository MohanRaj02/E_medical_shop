<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
session_start();
define("ID",$_SESSION['usrid']);
$sql="select * from medicine";
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
		<nav  class="white" class="nav-extended">
			<div class="nav-wrapper">
			  <ul id="nav-mobile" class="right hide-on-med-and-down blue">
				<li><a href="admin.php">Home</a></li>
				<li><a href="editmed.php">Edit medicines</a></li>
				<li><a href="logout.php">Log out</a></li>	
			  </ul>
			</div>
		</nav>
<table>
<tr>
<th>Drug Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Expiry Date</th>
</tr>
<?php
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	if(ID==$row['User_Id'])
	{
	echo "<tr>";
	echo "<td>".$row['Drug_Name']."</td>";
	echo "<td>".$row['Quantity']."</td>";
	echo "<td>".$row['Tablet_Price']."</td>";
	echo "<td>".$row['Expiry_Date']."</td>";
	echo "</tr>";
	}
}
mysql_close($con);
?>
</table>
<br>
</body>
</html>