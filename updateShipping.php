<?php
session_start();

if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

include("includes/openDbConn.php");

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<title>Project 2 Update Shipping</title>
</head> 

<body>
	<?php
	$sql = "SELECT Login, ShippingID, Name, Address, City, State, Zip FROM P2Shipping WHERE Login='".$_SESSION["login"]."'";

$result = mysqli_query($db, $sql);

if(empty($result))
{
	$num_results = 0;
}
else
{
	$num_results = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
}
	if($num_results == 0)
	$_SESSION["errorMessage"] = "You must go back and insert shipping!";	
	
?>
	<div class="container">
		<h1 class="login-welcome">Update Shipping</h1>
		<form class="login-username" method="post" action="doUpdateShipping.php">
			<div class="input-group">
				<input type="text" placeholder="Login" maxlength="15" name="login" value="<?php if($num_results != 0){echo( trim($row["Login"]));} ?>" id="login" disabled="disabled">
				
				<input type="hidden" placeholder="Login" maxlength="15" name="login" value="<?php if($num_results != 0){echo( trim($row["Login"]));} ?>" id="login">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Shipping ID" maxlength="30" name="shippingID" value="<?php if($num_results != 0){echo( trim($row["ShippingID"]));} ?>" id="shippingID">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Name" maxlength="50" name="name" value="<?php if($num_results != 0){echo( trim($row["Name"]));} ?>" id="name">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Address" maxlength="30" name="address" value="<?php if($num_results != 0){echo( trim($row["Address"]));} ?>" id="address">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="City" maxlength="30" name="city" value="<?php if($num_results != 0){echo( trim($row["City"]));} ?>" id="city">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="State" maxlength="20" name="state" value="<?php if($num_results != 0){echo( trim($row["State"]));} ?>" id="state">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Zip" maxlength="5" name="zip" value="<?php if($num_results != 0){echo( trim($row["Zip"]));} ?>" id="zip">
			</div>
			
			<div class="error">
			<?php echo $_SESSION["errorMessage"]; ?>
			</div>
			<div class="input-group">
				<button class="btn">Update</button>
			</div>
					<p class="login-register-text">Go Back<a href="user.php"> Home</a></p>

		</form>
	</div>
	
<?php
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
	document.getElementById("login").focus();
</script>
<?php
	include("includes/closeDbConn.php");
?>
</body>
</html>