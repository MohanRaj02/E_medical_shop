<html>
	<head>
		<link href="material.txt" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			body {
			background-image: url("1.jpg");
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
		<br><br><br>
		<div class="row">
			<div class="col  s8 offset-s2">
				<div class="card-panel N/A transparent">
					<div class="row">
						<h2 align="center"> <span class="purple-text ">ADMIN LOGIN </span></h2>
						<form  action="<?php $_PHP_SELF ?>" method="post"class="container">
							<div class="row">
								<div  class="input-field col s7 offset-s2" >
									<i class="material-icons prefix">account_circle</i>
									<input id="uname" name="uname"type="text" class="validate" required=""/>
									<label for="uname">User Name</label>
								</div>
								<div class="input-field col s7 offset-s2">
									<i class="material-icons prefix">lock</i>
									<input id="pwd" name="pwd" type="password" class="validate" required=""/>
									<label for="pwd">Password</label>
								</div>
							</div>
							<div class="center-align">
								<button class="waves-effect waves-light green btn" type="submit" name="login"  >login</button>
								<a href="account.php" class="waves-effect waves-light red btn">sign up</a>
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
$sql="SELECT * FROM admin_account WHERE  User_Name=BINARY '$un' and Password=BINARY '$pw'";
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
		$s="select User_Id,Shop_Name from admin_account where User_Name=BINARY '$un'";
		$que=mysql_query($s);
		while($r=mysql_fetch_assoc($que))
		{
			$i=$r['User_Id'];
			$sname=$r['Shop_Name'];
		}
		session_start();
		$_SESSION['usrname']= $un;
		$_SESSION['usrid']=$i;
		$_SESSION['shopname']=$sname;
		header("location:admin.php");
}
}
?>
