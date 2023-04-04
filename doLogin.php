<?php 
session_start();
include("includes/openDbConn.php");

	$userID  = $_POST["login"];
	$passwd  = $_POST["password"];

$_SESSION["login"] = $userID;
$_SESSION["password"] = $passwd;
	

$sql = "SELECT Login FROM P2User WHERE Login='".$userID."' AND Passwd='".$passwd."'";

$result = mysqli_query($db, $sql);


if(empty($result))
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);

if($num_results == 0) {
	$_SESSION["errorMessage"] = "The Login you entered is invalid!";
	header("Location: index.php");
	exit;
}
else {
	$_SESSION["errorMessage"] = "";
	header("Location: user.php");
	exit;
}

include("includes/closeDbConn.php");
?>
