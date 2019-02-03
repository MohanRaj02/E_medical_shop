<?php
session_start(); 
define("UNAME",$_SESSION['uusrname']);	
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
		<script>
		 $(document).ready(function(){
      $('.parallax').parallax();
    });
        
		</script>
		<ul id="dropdown1" class="dropdown-content">
		  <li><a href="uprofile.php">profile</a></li>
		  <li><a href="uout.php">logout</a></li>
		</ul>
		<div class="navbar-fixed">
			<nav class="blue-grey" >
				<div class="nav-wrapper">
					<ul class="right hide-on-med-and-down">
						<li><a href="uorder.php">order details</a></li>
						<li><a href="buy1.php">Buy Medicines</a></li>
					</ul>
					<ul class="left hide-on-med-and-down">	
						<li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo UNAME?><i class="material-icons right">arrow_drop_down</i></a></li>
					</ul>
				</div>
			</nav>
		</div>
	<div id="parallax">
	<div class="parallax-container">
		<br><br><br><br><br><br><br>
		<h1 class="blue-text" align="center">Save your Time</h1>
		<div class="parallax">
			<img style="width:100%" src="pa.jpeg">
		</div>
	</div>
</div>
	<h4 style="text-align:left; font-size: 40px; color:#00FF66">Medicines Available for:</h4>
		<?php
		$con=mysql_connect("localhost","root","")
		or die("cannot connected");
		mysql_select_db("medishop",$con);
		$sql=mysql_query("select distinct Purpose from medicine");
		$i=1;
		$r='.';
		while($row=mysql_fetch_assoc($sql))
		{
			echo"<font size='6pt'>".$i,$r."</font>";
			echo"<font color=red size='6pt'>".$row['Purpose']."</font>";
			echo"<br/>";
			$i=$i+1;
		}
		echo"</table>";
		mysql_close($con);
		?>		
	</body>
</html>