<html>
<head>
	<link href="material.txt" rel="stylesheet"/>
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
			body {
			background-image: url("de.jpg");
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
		<div  class="row">
			<div class="col  s8 offset-s2">
				<div class="center-align">
					<h3 class="purple-text">DELIVERY DETAILS</h3>
				</div>	
				
					<form action="<?php $_PHP_SELF ?>" method="post">					
						<div class="row">
							<div class="input-field col s8 offset-s2">
								<input  name="name" id="name" type="text" class="validate" required="" />
								<label for="name">Name</label>
							</div>
							<div class="input-field col s8 offset-s2">
								<input id="add" name="add" type="text" class="validate" required="" />
								<label for="add">Shipping Address</label>
							</div>
							<div class="input-field col s8 offset-s2">
								<input id="pho" name="pho" type="tel" class="validate" required="" />
								<label for="pho">Contact Number</label>
							</div>
							<div class="input-field col s8 offset-s2">
									<input id="ema" name="ema" type="email" class="validate" required="" /onchange="cpwd.pattern=this.value;">
									<label for="ema">E-mail</label>
							</div>
						</div>
						<center><button class="waves-effect waves-light purple btn "  type="submit" name="signup" >submit</button></center>
					</form>
				
			</div>
		</div>
</body>
</html>
<?php
if (isset($_POST["signup"]))
{
$n=$_POST['name'];
$ad=$_POST['add'];
$ph=$_POST['pho'];
$em=$_POST['ema'];
$to =$em;
$subject = 'One time password';
$str = '';
for($i=7;$i>0;$i--){
    $str = $str.chr(rand(97,122)); 
}
$body = "Your one time password is :".$str;
$from ='mohanraj0209@gmail.com';
$header="From:".$from;
$suc=mail($to, $subject, $body, $header);
if($suc==true)
{
session_start();
$_SESSION['secretpassword'] = $str;
$_SESSION['name'] = $n;
$_SESSION['addr'] = $ad;
$_SESSION['con'] = $ph;
$_SESSION['ema'] = $em;

header("location:ver.php");
}
}
?>
