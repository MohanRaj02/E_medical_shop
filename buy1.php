<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
$sql="select Shop_Name from admin_account";
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
		</style>
		<style>
			body {
			background-image: url("bu.jpg");
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
		$(document).ready(function() {
		$('select').material_select();
		});
	</script>
	<div class="navbar-fixed">
		<nav class="green">
		  <div class="nav-wrapper">
			<ul class="left hide-on-med-and-down">
				<form action="<?php $_PHP_SELF ?>" method="post">
					<div class="input-field">
					  <input id="search" name="ser" type="text" placeholder="search medicine.."/>
					  <label for="ser"><i class="material-icons prefix">search</i></label>
					</div>
				</form>
			</ul>
			<ul class="right hide-on-med-and-down">
			  <li><a href="user.php">Home</a></li>
			  
			</ul>
		  </div>
		</nav>
	</div>

	<br><br>
		<div class="row" >
			<div class="col  s8 offset-s2">
				<div class="card-panel">
					<form action="<?php $_PHP_SELF ?>" method="post">
						<div class="row">
							<div class="center-align">
								<h4><span class="red-text">Medicines Details</span></h4>
							</div>
							<div class="input-field col s8 offset-s2">
								<input  name="mname" id="mname" type="text" class="validate" required="" />
								<label for="mname">Name of medicines</label>
							</div>
							<div class="input-field col s8 offset-s2">
								<select  name="sho" required="">
									<option value=""disabled selected>Shop Name</option>
									<?php
									while($row = mysql_fetch_assoc($res))
									{
										?>
											<option value = "<?php echo $row['Shop_Name']; ?>" ><?php echo $row['Shop_Name']; ?></option>
										<?php
									}               
									?>
								</select>	
							</div>
							<div class="input-field col s8 offset-s2">
								<input id="qua" name="qua" type="number" class="validate" required="" />
								<label for="qua">Quantity</label>
							</div>
							
						</div>
						<div class="center-align">
						<button class="waves-effect waves-light purple btn "  type="submit" name="sub" >submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
if(isset($_POST["ser"]))
{
	$s=$_POST['ser'];
	$sql="select * from medicine where Drug_Name='$s'";
	$res=mysql_query($sql);
	if(!$sql)
	{
	echo"Tablet Not found";
	}
	else
	{
		echo "<table>";
		echo "<tr bgcolor=green>";
		echo "<th>Drug Name</th>";
		echo "<th>Quantity</th>";
		echo "<th>Shop Name</th>";
		echo "<th>Price</th>";
		echo "<th>Expiry Date</th>";
		echo "</tr>";
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			echo "<tr>";
			echo "<td>".$row['Drug_Name']."</td>";
			echo "<td>".$row['Quantity']."</td>";
			$i=$row['User_Id'];
			$r=mysql_query("select Shop_Name from admin_account where User_Id='$i'");
			$ro=mysql_fetch_assoc($r);
			echo "<td>".$ro['Shop_Name']."</td>";
			echo "<td>".$row['Tablet_Price']."</td>";
			echo "<td>".$row['Expiry_Date']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}
}
?>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
if(isset($_POST["sub"]))
{
	$mn=$_POST['mname'];
	$sh=$_POST['sho'];
	$qu=$_POST['qua'];
	$quer=mysql_query("select User_Id from admin_account where Shop_Name='$sh'");
	$r=mysql_fetch_assoc($quer);
	$sid=$r['User_Id'];
	$quer1="select Drug_Name,Quantity,Tablet_Price from medicine where User_Id= '$sid' and Drug_Name='$mn'";
	$ans=mysql_query($quer1);
	$res1=mysql_fetch_assoc($ans);
	$r1=$res1['Drug_Name'];
	$qn=$res1['Quantity'];
	$pr=$res1['Tablet_Price'];
	if(($r1==$mn)&&($qu<=$qn))
	{
		$rem=$qn-$qu;
		session_start();
		$_SESSION['medname']= $mn;
		$_SESSION['quan']=$qu;
		$_SESSION['shname'] = $sh;
		$_SESSION['rema']=$rem;
		$_SESSION['price']=$pr;
		$_SESSION['vid']=$sid;
		header("location:buy.php");
		}
		elseif(($r1==$mn)&&($qu>=$qn))
		{
			echo '<script language="javascript">';
			echo 'alert("only '.$qn.' left ")';
			echo '</script>';
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Tablet not found in this shop!!!go to search for view shop")';
			echo '</script>';
		}
	}
?>