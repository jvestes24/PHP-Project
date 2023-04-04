<?php

session_start();



$Login      = addslashes($_POST["login"]);
$ShippingID = addslashes($_POST["shippingID"]);
$Name       = addslashes($_POST["name"]);
$Address    = addslashes($_POST["address"]);
$City       = addslashes($_POST["city"]);
$State      = addslashes($_POST["state"]);
$Zip        = addslashes($_POST["zip"]);



$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");

$Login      = str_replace($removeThese, "", $Login);
$ShippingID = str_replace($removeThese, "", $ShippingID);
$Name       = str_replace($removeThese, "", $Name);
$Address    = str_replace($removeThese, "", $Address);
$City       = str_replace($removeThese, "", $City);
$State      = str_replace($removeThese, "", $State);
$Zip        = str_replace($removeThese, "", $Zip);




if(($Login=="") ||($ShippingID=="") ||($Name=="") ||($Address=="") ||($City=="") ||($State=="") ||($Zip==""))
{
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateShipping.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$sql = "UPDATE P2Shipping SET Login='".$Login."', ShippingID='".$ShippingID."', Name='".$Name."', Address='".$Address."', City='".$City."', State='".$State."', Zip='".$Zip."' WHERE Login='".$_SESSION["login"]."'";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: user.php");
exit;
?>