<?php
session_start();
define("ID",$_SESSION['usrid']);
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
$d=ID;
$sql="select * from medicine where User_Id='$d'and Quantity<=5";
$res=mysql_Query("$sql");
$i=0
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
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table style="font-family:arial; font-size:15" width="600" border="1" cellpadding="1" cellspacing="1" align="center">
			<font face=arial size=5 color=blue>
			<tr bgcolor=red>
				<th><b>Medicine</b></th>
				<th><b>Type</b></th>
				<th><b>Quantity</b></th>
				<th><b>Update</b></th>
			</tr>
		<?php
		while($row=mysql_fetch_array($res))
		{
			echo"<tr>";
			
			echo"<td>";
			echo'<input	type="text" value="'.$row['Drug_Name'].'" name="med'.$i.'" readonly />';
			echo"</td>";
			
			echo"<td>";
			echo'<input	type="text" value="'.$row['Product_Type'].'" name="pro'.$i.'" readonly />';
			echo"</td>";
			
			
			echo"<td>";
			echo'<input	type="text" value="'.$row['Quantity'].'" name="qua'.$i.'"/>';
			echo"</td>";
			
			
			echo"<td>";
			echo'<input type="submit" value="Update" name="address'.$i.'"/>';
				if(isset($_POST['address'.$i.'']))
				{
						$md=$_POST['med'.$i.''];
						$qn=$_POST['qua'.$i.''];
						$update="update medicine set Quantity='$qn' where Drug_Name='$md'";
						$qry=mysql_query($update);
						if(!$qry)
						{
							echo"Sorry! Update Failed";
						}
						else
						{
							header("location:editmed1.php");
							
						}
					
				}
				echo"</td>";
		echo"</tr>";
		}
?>
</font>
</table>
</form>
<div class="center-align">
<a class="waves-effect waves-light grey btn" href="admin.php">Home</a>
</div>
</body>
</html>			