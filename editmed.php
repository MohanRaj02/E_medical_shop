<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
session_start();
define("ID",$_SESSION['usrid']);
mysql_select_db("medishop",$con);
$d=ID;
$sql="select * from medicine where User_Id='$d'";
$res=mysql_query($sql);
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
				<th><b>Purpose</b></th>
				<th><b>Quantity</b></th>
				<th><b>Expiry Date</b></th>
				<th><b>Tablet Price</b></th>
				
				<th><b>Update</b></th>
				<th><b>Delete</b></th>
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
			echo'<input	type="text" value="'.$row['Purpose'].'" name="pur'.$i.'" readonly />';
			echo"</td>";
			
			echo"<td>";
			echo'<input	type="text" value="'.$row['Quantity'].'" name="qua'.$i.'"/>';
			echo"</td>";
			
			echo"<td>";
			echo'<input	type="text" value="'.$row['Expiry_Date'].'" name="exe'.$i.'"/>';
			echo"</td>";
			
			echo"<td>";
			echo'<input	type="text" value="'.$row['Tablet_Price'].'" name="tabl'.$i.'"/>';
			echo"</td>";
			
			echo"<td>";
			echo'<input type="submit" value="Update" name="address'.$i.'"/>';
				if(isset($_POST['address'.$i.'']))
				{
						$md=$_POST['med'.$i.''];
						$qn=$_POST['qua'.$i.''];
						$dt=$_POST['exe'.$i.''];
						$ta=$_POST['tabl'.$i.''];
						
						$update="update medicine set Quantity='$qn',Expiry_Date='$dt',Tablet_Price='$ta' where Drug_Name='$md'";
						$qry=mysql_query($update);
						if(!$qry)
						{
							echo"Sorry! Update Failed";
						}
						else
						{
							header("location:editmed.php");
							
						}
					
				}
				echo"</td>";
					
					echo"<td>";
					echo'<input type="submit" value="Delete" name="delete'.$i.'"/>';
					if(isset($_POST['delete'.$i.'']))
					{
							$md=$_POST['med'.$i.''];
							$delete="delete from medicine where Drug_Name='$md'";
							$qry=mysql_query($delete);
							if(!$qry)
							{
								echo"Sorry! Deletion Failed";
							}
							else
							{
								header("location:editmed.php");
							}	
					}
						echo"</td>";
						echo"</tr>";
						$i++;
		}
		echo"<tr>";
		echo"<td>";
		echo'<input type="text" name="medi"/>';
		echo"</td>";
		
		echo"<td>";
		echo'<input type="text" name="pu"/>';
		echo"</td>";
		
		echo"<td>";
		echo'<input type="number" name="qu"/>';
		echo"</td>";
		
		echo"<td>";
		echo'<input type="text" name="dat"/>';
		echo"</td>";
		
		echo"<td>";
		echo'<input type="number" name="pric"/>';
		echo"</td>";
		
		echo"<td>";
		echo'<input type="submit" value="Add" name="add"/>';
		if(isset($_POST['add']))
		{
			$med=$_POST['medi'];
			$purp=$_POST['pu'];
			$qna=$_POST['qu'];
			$ex=$_POST['dat'];
			$am=$_POST['pric'];
			if(!$med or !$purp or !$qna or !$qna or !$am)
			{
				echo"Fill all fields";
			}
			else{
				$update="insert into medicine(Drug_Name,Purpose,Quantity,Expiry_Date,Tablet_Price) values('$med','$purp','$qna','$ex','$am')";
				$qry=mysql_query($update);
				if(!$qry)
				{
					echo"Sorry! Adding Failed";
				}
				else
				{
					header("location:editmed.php");
				}
			}
		}
		echo"</td>";
		echo"</tr>"
?>
</font>
</form>
</table>
<div class="center-align">
<a class="waves-effect waves-light grey btn" href="viewmed.php">Previous</a>
</div>
</body>
</html>		
			