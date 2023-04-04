<?php
//opens the database collection

@ $db = mysqli_connect("goss.tech.purdue.edu", "cgt356web1h", "Saxophone1h3775");
mysqli_select_db($db, "cgt356web1h") or die(mysql_error());

if(!$db)
{
	echo "Error: Could not connect to the database. Pease try again later.";
	exit;
}

?>