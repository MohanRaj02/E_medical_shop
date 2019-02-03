<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
session_start(); 
define("MED",$_SESSION['medname']);
define("QUA",$_SESSION['quan']);
define("NAME",$_SESSION['name']);
define("SHOP",$_SESSION['shname']);
define("ADD",$_SESSION['addr']);
define("PHO",$_SESSION['con']);
define("UNAME",$_SESSION['uusrname']);
define("EMAIL",$_SESSION['ema']);
define("REM",$_SESSION['rema']);
define("AMO",$_SESSION['price']);
define("ID",$_SESSION['vid']);
if(isset($_POST['sub']))
{
	if($_POST['otp']==$_SESSION['secretpassword'])
	{      
		$usn=UNAME;
		$mn=MED;
		$qn=QUA;
		$n=NAME;
		$sh=SHOP;
		$ad=ADD;
		$ph=PHO;
		$r=REM;
		$am=AMO;
		$i=ID;
		$amo=$qn * $am;
			$sq = mysql_query("INSERT INTO order_detail(User_Name,Medicine_Name,Quantity,Name,Shop,Ship_Address,Contact_Number,Amount) VALUES ('$usn','$mn','$qn','$n','$sh','$ad','$ph','$amo')");
			if($sq==1)
			{
				$up=mysql_query("update medicine set Quantity='$r' where Drug_Name='$mn'and User_Id='$i'");
			}	
			else
			{
			echo '<script language="javascript">';
			echo 'alert("!!ERROR!!")';
			echo '</script>';
			exit;
			}
	}
	else{
			header("Location:ver.php?Check otp");
	}
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
		<h1 style="text-align:center; font-size: 50px; color:#00FF66">BILL DETAILS</h1>
		<br><br>
		<div class="row">
			<div class="col  s8 offset-s2">
				<div class="card-panel">
					<div class="row">
						<div class="input-field col s8 offset-s2">
								Medicine Name:<input type="text" value="<?php echo MED?>"readonly/>
						</div>
						<div class="input-field col s8 offset-s2">
								Quantity:<input type="number" value="<?php echo QUA?>"readonly/>
						</div>
						<div class="input-field col s8 offset-s2">
								Price:<input type="number" value="<?php echo $amo;?>"readonly/>
						</div>
						<div class="input-field col s8 offset-s2">
								Delivery Address:<input type="text" value="<?php echo ADD?>"readonly/>
						</div>
						<div class="input-field col s8 offset-s2">
								Phone Number:<input   type="text" value="<?php echo PHO?>"readonly/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		header("refresh:20 url=user.php");
		?>
	</body>
</html>