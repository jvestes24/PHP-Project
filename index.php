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
	
	<title>Project 2 Login</title>
</head> 

<body>
	<div class="container">
		<h1 class="login-welcome">Welcome to my Project 2 Site</h1>
		<form class="login-username" method="post" action="doLogin.php">
			<p class="login-text" style="font-size: 2rem; font-weight: 500;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Login"  maxlength="15" name="login" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password"  maxlength="60" name="password" required>
			</div>
			<div class="error">
			<?php echo $_SESSION["errorMessage"]; ?>
			</div>
			<div class="input-group">
				<button class="btn" name="submit">Login</button>
			</div>
			<p class="login-register-text">Dont have an account?<a href="register.php"> Register Here.</a></p>
		</form>
	</div>
</body>
	
<?php
$_SESSION["errorMessage"] = "";
?>

</html>