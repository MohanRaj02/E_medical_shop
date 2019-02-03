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
		<style>
h1{
	font-family:Freestyle Script
}
</style>
		<center><h1><span class="purple-text" >CREATE ACCOUNT</span></h1></center>
		<div class="row">
			<form action="<?php $_PHP_SELF ?>" method="post">
				<div class="row">
					<div class="input-field col s5">
						<i class="material-icons prefix">face</i>
						<input  name="fname" id="fname" type="text" class="validate" required="" />
						<label for="fname">First Name</label>
					</div>
					<div class="input-field col s5">
						<i class="material-icons prefix">person</i>
						<input id="lname" name="lname" type="text" class="validate"/>
						<label for="lname">Last Name</label>
					</div>
					<div class="input-field col s5">
						<i class="material-icons prefix">person_pin_circle</i>
						<input  name="usrid" id="usrid" type="number" class="validate" required="" />
						<label for="usrid">User id</label>
					</div>
					<div class="input-field col s2">
						<input id="sta" type="text" name="sta" class="validate" required="" />
						<label for="sta">State</label>
					</div>
					<div class="input-field col s3">
						<input id="dis" type="text" name="dis" class="validate" required=""/>
						<label for="dis">District</label>
					</div>
					<div class="input-field col s10">
						<i class="material-icons prefix">place</i>
						<input id="sho" type="text" name="sho" required=""/>
						<label for="sho">Shop Name</label>
					</div>
					<div class="input-field col s10">
						<i class="material-icons prefix">home</i>
						<input id="add" type="text" name="add" class="validate" required="" />
						<label for="add">Address</label>
						
					</div>
					<div class="input-field col s5">
						<i class="material-icons prefix">account_circle</i>
						<input id="uname" name="uname" type="text" class="validate" required="" />
						<label for="uname">User Name</label>
					</div>
					<div class="input-field col s5">
						<select  name="gen" required="">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="others">Others</option>
						</select>		
					</div>
					<div class="input-field col s5">
							<i class="material-icons prefix">lock_outline</i>
							<input id="pwd" name="pwd" type="password" class="validate" required="" /onchange="cpwd.pattern=this.value;">
							<label for="pwd">Password</label>
					</div>
					<div class="input-field col s5">
							<i class="material-icons prefix">lock</i>
							<input id="cpwd" type="password" class="validate" required="" / >
							<label for="cpwd">Confirm Password</label>
					</div>
					<div class="input-field col s5">
						<i class="material-icons prefix">local_post_office</i>
						<input id="ema" type="email" name="ema" class="validate" required="" />
						<label for="ema">e-mail</label>
					</div>
					<div class="input-field col s5">
						<i class="material-icons prefix">call</i>
						<input id="phe" name="phe" type="tel" class="validate" required="" />
						<label for="phe">Contact Number</label>
					</div>
				</div>
				<center><button class="waves-effect waves-light btn "  type="submit" name="signup" >Submit</button>
				<a href="log.php">Go to Login</a>
				</center>
			</form>
		</div>
	</body>
</html>
<?php
$con=mysql_connect("localhost","root","")
or die("cannot connected");
mysql_select_db("medishop",$con);
if (isset($_POST["signup"]))
{
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$ui=$_POST['usrid'];
$ad=$_POST['add'];
$st=$_POST['sta'];
$ds=$_POST['dis'];
$sh=$_POST['sho'];
$us=$_POST['uname'];
$pd=$_POST['pwd'];
$gd=$_POST['gen'];
$em=$_POST['ema'];
$ph=$_POST['phe'];
$s=mysql_query("select  User_Name from admin_account where User_Name='$us'");
$r=mysql_query("select  User_Id from admin_account where User_Id='$ui'");
$co=mysql_num_rows($r);
$res=mysql_num_rows($s);
if(($res==0)&&($co==0))
{
	$sql = mysql_query("INSERT INTO admin_account (User_Id,First_Name,Last_Name,State,District,Shop_Name,Address,User_Name,Password,Gender,Email,Phone_Number) VALUES ('$ui','$fn','$ln','$st','$ds','$sh','$ad','$us','$pd','$gd','$em','$ph')");
	if($sql==1)
	{
	header('location:back.html');
	}	
	else
	{
	echo '<script language="javascript">';
	echo 'alert("!!ERROR!!")';
	echo '</script>';
	exit;
	}
}
elseif($res==1)
{
echo '<script language="javascript">';
echo 'alert("USERNAME is already taken")';
echo '</script>';
}
elseif($co==1)
{
echo '<script language="javascript">';
echo 'alert("USERID is already taken")';
echo '</script>';
}
else{
echo '<script language="javascript">';
echo 'alert("USERID and USERNAME is already taken")';
echo '</script>';
}
}
mysql_close($con);
?>