<?php
session_start();

if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
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
	<div class="container">
		<h1 class="login-welcome">Welcome to my Project 2 Site</h1>
		<form class="login-username" method="post" action="doRegister.php">
			<p class="login-text" style="font-size: 2rem; font-weight: 500;">Register</p>
			
			<div class="input-group">
				<input type="text" placeholder="First Name" maxlength="25" name="firstName" id="firstName">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Last Name" maxlength="60" name="lastName" id="lastName">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Email" maxlength="40" name="email" id="email">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Login" maxlength="15" name="login" id="login">
			</div>
			
			<div class="input-group">
				<input type="password" placeholder="Password" maxlength="60" name="password" id="password">
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
				<button class="btn">Register</button>
			</div>
			
			<p class="login-register-text">Have an account?<a href="index.php"> Login Here.</a></p>
		</form>
	</div>
	
<?php
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
	document.getElementById("login").focus();
</script>

</body>
</html>