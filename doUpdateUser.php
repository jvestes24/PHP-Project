<?php

session_start();



$Login      = addslashes($_POST["login"]);
$FirstName  = addslashes($_POST["firstName"]);
$LastName   = addslashes($_POST["lastName"]);
$Passwd     = addslashes($_POST["password"]);
$Email      = addslashes($_POST["email"]);
$Newsletter = ($_POST["newsletter"]);



$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Login     = str_replace($removeThese, "", $Login);
$FirstName = str_replace($removeThese, "", $FirstName);
$LastName  = str_replace($removeThese, "", $LastName);
$Passwd    = str_replace($removeThese, "", $Passwd);
$Email     = str_replace($removeThese, "", $Email);


if(($Login=="") || ($FirstName=="") ||($LastName=="") ||($Passwd=="") ||($Email=="") ||($Newsletter==""))
{
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateUser.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$sql = "UPDATE P2User SET FirstName='".$FirstName."', LastName='".$LastName."', Passwd='".$Passwd."', Email='".$Email."', NewsLetter='".$Newsletter."' WHERE Login='$Login'";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: user.php");
exit;
?>