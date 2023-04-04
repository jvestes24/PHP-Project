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
	
	<title>Project 2 Update Billing</title>
</head> 

<body>
	<?php
	
	$sql = "SELECT Login, BillingID, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate  FROM P2Billing WHERE Login='".$_SESSION["login"]."'";

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
	$_SESSION["errorMessage"] = "You must go back and insert billing!";			
?>
	<div class="container">
		<h1 class="login-welcome">Update Billing</h1>
		<form class="login-username" method="post" action="doUpdateBilling.php">
			<div class="input-group">
				<input type="text" placeholder="Login" maxlength="15" name="login" value="<?php if($num_results != 0){echo( trim($row["Login"]));} ?>" id="login" disabled="disabled">
				
				<input type="hidden" placeholder="Login" maxlength="15" name="login" value="<?php if($num_results != 0){echo( trim($row["Login"]));} ?>" id="login">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Billing ID" maxlength="30" name="billingID" value="<?php if($num_results != 0){echo( trim($row["BillingID"]));} ?>" id="billingID">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Bill Name" maxlength="50" name="billName" value="<?php if($num_results != 0){echo( trim($row["BillName"]));} ?>" id="billName">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Bill Address" maxlength="30" name="billAddress" value="<?php if($num_results != 0){echo( trim($row["BillAddress"]));} ?>" id="billAddress">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Bill City" maxlength="30" name="billCity" value="<?php if($num_results != 0){echo( trim($row["BillCity"]));} ?>" id="billCity">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Bill State" maxlength="20" name="billState" value="<?php if($num_results != 0){echo( trim($row["BillState"]));} ?>" id="billState">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Bill Zip" maxlength="5" name="billZip" value="<?php if($num_results != 0){echo( trim($row["BillZip"]));} ?>" id="billZip">
			</div>
			
			<div class="input-group">
				<input type="text" placeholder="Card Number" maxlength="16" name="cardNumber" value="<?php if($num_results != 0){echo( trim($row["CardNumber"]));} ?>" id="cardNumber">
			</div>
			
			<div class="input-group">
			<label title="cardType" for="cardType">Card Type</label>
				
			<select name="cardType" id="cardType">
								
				<option value="- Card Type -">- Card Type -</option>
				<option value="Visa"<?php if( ($num_results != 0) && (trim($row["CardType"])=="Visa" ) ){echo("selected='selected'");} ?>>Visa</option>
				<option value="Mastercard"<?php if( ($num_results != 0) && (trim($row["CardType"])=="Mastercard" ) ){echo("selected='selected'");} ?>>Mastercard</option>
				<option value="Discover"<?php if( ($num_results != 0) && (trim($row["CardType"])=="Discover" ) ){echo("selected='selected'");} ?>>Discover</option>
				<option value="American Express"<?php if( ($num_results != 0) && (trim($row["CardType"])=="American Express" ) ){echo("selected='selected'");} ?>>American Express</option>
			</select>
			</div>
	
			
			
			<div class="input-group">
			<label title="month" for="month">Expiration Month</label>
				
			<select name="month" id="month">
				<option value="MM">MM</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>  
			</select>
			</div>
				
			<div class="input-group">
			<label title="year" for="year">Expiration Year</label>
                
				<select name="year" id="year">
                <option value="- Year -">YY</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
			</select>
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