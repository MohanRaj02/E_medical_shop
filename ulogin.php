<html>
	<head>
		<link href="material.txt" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
			body {
			background-image: url("ulog.png");
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
		<br><br>
		<div class="row">
			<div class="col  s8 offset-s2">
				<div class="panel">
				  <div class="row">
					    <h1 style="text-align:center; font-size: 50px; color:black">User Login</h1>
						<form  action="<?php $_PHP_SELF ?>" method="post"class="container">
							<div class="row">
								<div  class="input-field col s7 offset-s2" >
									<i class="material-icons prefix">account_circle</i>
									<input id="uname" name="uname"type="text" class="validate" required=""/>
									<label for="uname">User Name</label>
								</div>
								<div class="input-field col s7 offset-s2">
									<i class="material-icons prefix">fingerprint</i>
									<input id="pwd" name="pwd" type="password" class="validate" required=""/>
									<label for="pwd">Password</label>
								</div>
							</div>
							<div class="center-align">
							<button class="waves-effect waves-light waves-round black btn" type="submit" name="login">login</button>
							<a href="uaccount.php" class="waves-effect waves-light waves-round red btn">sign up</a>
							</div>
						</form>
						<br>
						
				 </div>
				</div> 
			</div>
		</div>	
	</body> 
</html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
if(isset($_POST["login"]))
{
$un=$_POST['uname'];
$pw=$_POST['pwd'];
$sql="SELECT * FROM user_account WHERE  User_Name=BINARY '$un' and Password=BINARY '$pw'";
$result=mysql_query($sql);
$row=mysql_num_rows($result);
if($row==0)
{
	echo '<script language="javascript">';
	echo 'alert("Please enter the correct details or create Account")';
	echo '</script>';
}
else
{
		session_start();
		$_SESSION['uusrname']= $un;
		header("location:user.php");
}
}
?>
