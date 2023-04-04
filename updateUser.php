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
	
	<title>Project 2 Register</title>
</head> 

<body>
<?php
	$sql = "SELECT Login, FirstName, LastName, Passwd, Email, NewsLetter FROM P2User WHERE Login='".$_SESSION["login"]."'";

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
		
?>
	<div class="container">
		<h1 class="login-welcome">Welcome to my Project 2 Site</h1>
		<form class="login-username" method="post" action="doUpdateUser.php">
			<p class="login-text" style="font-size: 2rem; font-weight: 500;">Update</p>
			
			<div class="input-group">
				<input type="text" placeholder="Login" maxlength="15" name="login" value="<?php if($num_results != 0){echo( trim($row["Login"]));} ?>" id="login" disabled="disabled">
				
				<input type="hidden" placeholder="Login" maxlength="15" name="login" value="<?php if($num_results != 0){echo( trim($row["Login"]));} ?>" id="login">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="First Name" maxlength="25" name="firstName" value="<?php if($num_results != 0){echo( trim($row["FirstName"]));} ?>" id="firstName">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Last Name" maxlength="60" name="lastName" value="<?php if($num_results != 0){echo( trim($row["LastName"]));} ?>" id="lastName">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Email" maxlength="40" name="email" value="<?php if($num_results != 0){echo( trim($row["Email"]));} ?>" id="email">
			</div>
			
			<div class="input-group">
				<input type="password" placeholder="Password" maxlength="60" name="password" value="<?php if($num_results != 0){echo( trim($row["Passwd"]));} ?>" id="password">
			</div>
			
			<div>
			<label title="Newsletter" for="newsletter">Would you like to subscribe to our newsletter?</label>
				<p style="padding: 15px;">
				<input type="radio" name="newsletter" id="newsletter" value="Yes" />Yes
				<input type="radio" name="newsletter" id="newsletter" value="No" />No
				</p>
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
	document.getElementById("firstName").focus();
</script>
	
	<?php
	include("includes/closeDbConn.php");
	?>
</body>
</html>