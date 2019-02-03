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
		<script>
		$(document).ready(function() {
		$('select').material_select();
		});
		</script>
		<center><h1><span class="purple-text">CREATE ACCOUNT</span></h1></center>
	<div class="card-panel  light-blue accent-1">
		<div class="row">
			<form action="<?php $_PHP_SELF ?>" method="post">
				<div class="row">
					<div class="input-field col s6 offset-s3">
						<input  name="fname" id="fname" type="text" class="validate" required="" />
						<label for="fname">First Name</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="lname" name="lname" type="text" class="validate"/>
						<label for="lname">Last Name</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="uname" name="uname" type="text" class="validate" required="" />
						<label for="uname">User Name</label>
					</div>
					<div class="input-field col s6 offset-s3">	
						<select  name="gen">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="others">Others</option>
						</select>		
					</div>
					<div class="input-field col s6 offset-s3">
							<input id="pwd" name="pwd" type="password" class="validate" required="" /onchange="cpwd.pattern=this.value;">
							<label for="pwd">Password</label>
					</div>
					<div class="input-field col s6 offset-s3">
							<input id="cpwd" type="password" class="validate" required="" / >
							<label for="cpwd">Confirm Password</label>
					</div>
				</div>
				<center><button class="waves-effect waves-light purple btn "  type="submit" name="signup" >Submit</button>
				<a href="ulogin.php" class="black-text">Go to Login</a>
				</center>
			</form>
		</div>
	</div>
	</head>
</html>
<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
if (isset($_POST["signup"]))
{
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$us=$_POST['uname'];
$pd=$_POST['pwd'];
$gd=$_POST['gen'];
$s=mysql_query("select  User_Name from user_account where User_Name='$us'");
$res=mysql_num_rows($s);
if($res==0)
{
	$sql = mysql_query("INSERT INTO user_account(First_Name,Last_Name,User_Name,Gender,Password) VALUES ('$fn','$ln','$us','$gd','$pd')");
	if($sql==1)
	{
	header('location:back1.html');
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
echo '<script language="javascript">';
echo 'alert("USERNAME is already taken")';
echo '</script>';
}
}
mysql_close($con);
?>