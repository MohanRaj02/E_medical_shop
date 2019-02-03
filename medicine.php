<?php
session_start(); 
define("NAME",$_SESSION['usrname']);
define("ID",$_SESSION['usrid']);
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
		 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
		</script>
		<center><h1><span class="black-text">Medicine details</span></h1></center>
		<div class="row">
			<form action="<?php $_PHP_SELF ?>" method="post">
				<div class="row">
					<div class="input-field col s6 offset-s3">
						<input id="un" name="un" type="text" class="validate" required=""/>
						<label for="un">User id</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="tabl" name="tabl" type="text"class="validate" required=""/>
						<label for="tabl">Name of Medicine</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="ty" name="ty" type="text" class="validate" required=""/>
						<label for="ty">Product Type</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="pur" name="pur" type="text"class="validate" required=""/>
						<label for="pur">Purpose</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="qua" name="qua" type="number" class="validate" required=""/>
						<label for="qua">Quantity</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="dat" name="dat" type="text" class="validate" required=""/>
						<label for="dat">Expiry Date</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="pr" name="pr" type="number" step=0.01 class="validate" required=""/>
						<label for="pr">price(for one)</label>
					</div>
					<div class="input-field col s6 offset-s3">
						<input id="co" name="co" type="text" class="validate" required=""/>
						<label for="co">Manufacture</label>
					</div>
				</div>
				<div class="center-align">
				<button class="btn waves-effect waves-light" type="submit" name="sub">Submit
						<i class="material-icons right">send</i>
						</button>
				</div>
			</form>
	</body>
</html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("medishop",$con);
if (isset($_POST["sub"]))
{
	$us=$_POST['un'];
	$tn=$_POST['tabl'];
	$t=$_POST['ty'];
	$pr=$_POST['pur'];
	$qn=$_POST['qua'];
	$dt=$_POST['dat'];
	$tp=$_POST['pr'];
	$c=$_POST['co'];
	$i=ID;
	$sq="select Drug_Name from medicine where Drug_Name='$tn' and User_Id='$us'";
	$r=mysql_query($sq);
	$sql=mysql_query("insert into medicine(User_Id,Drug_Name,Product_Type,Purpose,Quantity,Expiry_Date,Tablet_Price,Manufacture) values('$us','$tn','$t','$pr','$qn','$dt','$tp','$c')");
	if(($us==ID)&&($sql==1)&&($r==0))
	{
		header("Location:admin.php?msg=successfully added");
		}
	elseif($r>1)
	{
		echo '<script language="javascript">';
		echo 'alert("Tablet alredy found")';
		echo '</script>';
	}
	elseif(!$sql)
	{
		echo '<script language="javascript">';
		echo 'alert("Error in adding medicine")';
		echo '</script>';
		}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Invalid userid")';
		echo '</script>';
	}
}
mysql_close($con);
?>