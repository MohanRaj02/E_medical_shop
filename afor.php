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
		<div  class="col">
			<div class="row  s7">
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<div class="row">
						<div class="input-field col s5 offset-s3" class="center-align">
							<input  name="ema" id="ema" type="email" class="validate" required="" />				
							<label for="ema">Enter Your mailid</label>
						</div>
					</div>
					<div class="center-align">
						<button class="waves-effect waves-light black btn" type="submit" name="forg">Submit</button>
					</div>
				</form>
			</div>
		</div>
		
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
if (isset($_POST["forg"]))
{
$em=$_POST['ema'];
$sql="select Email from admin_account where Email='$em'";
$re=mysql_query($sql);
$res=mysql_num_rows($re);
if(!$res)
{
	echo"check email";
}
if($res)
{
$to =$em;
$subject = 'your password';
$str = mysql_query("select Password from admin_account where Email='$to'");
$row=mysql_fetch_assoc($str);
$ps=$row['Password'];
$body = "Your account password is : $ps
click here to login...http://localhost/log.php";
$from ='mohanraj0209@gmail.com';
$header="From:".$from;
$suc=mail($to, $subject, $body, $header);
if($suc==true)
{
header("location:go.html");
}
else
{
	echo"mail not sent!!!check connection";
}
}
}
?>
