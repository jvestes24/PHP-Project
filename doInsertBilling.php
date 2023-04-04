<?php

session_start();



$Login          = addslashes($_POST["login"]);
$BillingID      = addslashes($_POST["billingID"]);
$BillName       = addslashes($_POST["billName"]);
$BillAddress    = addslashes($_POST["billAddress"]);
$BillCity       = addslashes($_POST["billCity"]);
$BillState      = addslashes($_POST["billState"]);
$BillZip        = addslashes($_POST["billZip"]);
$CardType       = ($_POST["cardType"]);
$CardNumber     = addslashes($_POST["cardNumber"]);
$ExpMonth       = ($_POST["month"]);
$ExpYear        = ($_POST["year"]);

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");

$Login          = str_replace($removeThese, "", $Login);
$BIllingID      = str_replace($removeThese, "", $BIllingID);
$BIllName       = str_replace($removeThese, "", $BIllName);
$BillAddress    = str_replace($removeThese, "", $BillAddress);
$BillCity       = str_replace($removeThese, "", $BillCity);
$BillState      = str_replace($removeThese, "", $BillState);
$BillZip        = str_replace($removeThese, "", $BillZip);
$CardNumber     = str_replace($removeThese, "", $CardNumber);






if(($Login=="") ||($BillingID=="") ||($BillName=="") ||($BillAddress=="") ||($BillCity=="") ||($BillState=="") ||($BillZip=="") ||($CardType=="- Card Type -") ||($CardNumber=="") ||($ExpMonth=="MM") ||($ExpYear=="YY"))
{
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertBilling.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$ExpDate = $ExpMonth."/".$ExpYear;


$sql = "INSERT INTO P2Billing(Login, BillingID, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate) VALUES('".$Login."', '".$BillingID."',  '".$BillName."', '".$BillAddress."', '".$BillCity."', '".$BillState."', '".$BillZip."', '".$CardType."', '".$CardNumber."', '".$ExpDate."')";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: user.php");
exit;
?>