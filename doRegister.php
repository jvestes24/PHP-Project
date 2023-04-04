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
	header("Location: register.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$sql = "SELECT Login FROM P2User WHERE Login='".$Login."'";

$result = mysqli_query($db, $sql);

if(empty($result))
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);

if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The login you entered already exists!";
	header("Location: register.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}



$sql = "INSERT INTO P2User(Login, FirstName, LastName, Passwd, Email, NewsLetter) VALUES('".$Login."', '".$FirstName."',  '".$LastName."', '".$Passwd."', '".$Email."', '".$Newsletter."')";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: index.php");
exit;
?>