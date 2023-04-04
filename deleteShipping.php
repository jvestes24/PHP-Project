<?php

session_start();

include("includes/openDbConn.php");

$sql = "DELETE FROM P2Shipping WHERE Login='".$_SESSION["login"]."'";
$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: user.php");
?>