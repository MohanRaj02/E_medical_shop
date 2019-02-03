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
		<div class="navbar-fixed">
			<nav class="blue-grey" >
				<div class="nav-wrapper">
					<ul class="right hide-on-med-and-down">
						<li><a href="fullstock.php">view full </a></li>
						<li><a href="admin.php">Home</a></li>
					</ul>
					<ul class="left hide-on-med-and-down">
					<form action="<?php $_PHP_SELF ?>" method="post">
						<div class="input-field">
						  <input id="search" name="ser" type="text" placeholder="tablet name.."/>
						  <label for="ser"><i class="material-icons prefix">search</i></label>
						</div>
					</form>
				</ul>
				</div>
			</nav>
		</div>
	</body>
</html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
if(isset($_POST["ser"]))
{
	$s=$_POST['ser'];
	if(!$sql)
	{
	echo"Tablet Not found";
	}
	else
	{
		echo "<table>";
		echo "<tr bgcolor=green>";
		echo "<th>Drug Name</th>";
		echo "<th>Product Type</th>";
		echo "<th>Quantity</th>";
		echo "</tr>";
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			if($s==$row['Drug_Name'])
			{
			echo "<tr>";
			echo "<td>".$row['Drug_Name']."</td>";
			echo "<td>".$row['Product_Type']."</td>";
			echo "<td>".$row['Quantity']."</td>";
			}
		}
		echo "</table>";
		
	}
}
?>