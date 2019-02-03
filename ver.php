<?php
session_start();
define("EMAIL",$_SESSION['ema']);
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
		<h6 style="text-align:left; font-size:20px; color:#00FF66">otp sent to <?php echo EMAIL?></h6> 
		<div  class="row">
			<div class="col  s8 offset-s2">
				<form action="bill.php" method="post">
					<div class="row">
						<div class="input-field col s5 offset-s3" class="center-align">
							<input  name="otp" id="otp" type="text" class="validate" required="" />				
							<label for="fname">Enter Your OTP</label>
						</div>
					</div>
						<div class="center-align">
							<a href="bill.php"><button class="waves-effect waves-light green btn type="submit" name="sub" >Submit</button></a>
							<a href="buy1.php" class="waves-effect waves-light red btn">Cancel</a>
						</div>
				</form>
			</div>
		</div>
</html>
