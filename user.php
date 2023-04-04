<?php
session_start();
include("includes/openDbConn.php");
$_SESSION["errorMessage"] = "";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project 2 -  User</title>
</head>

<body>
	<h1 style="text-align: center;">Project 2 - User</h1>

	<?php
	
	include("includes/userMenu.php");
	
	//Prepare my sql statement	
	$sql = "SELECT Login, FirstName, LastName, Passwd, Email, NewsLetter FROM P2User WHERE Login='".$_SESSION["login"]."'";
	
	//execute the sql query and store the result of the execution into $result	
	$result =  mysqli_query($db, $sql);
	
	//make sure there is a result
	//puts results into table with number of rows
	if( empty($result) )
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	
	?>
	<table style="border: 0px; width: 950px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="User Information">
		<thead>
			<tr>
				<th colspan="8" style="font-weight: bold; background-color: #008816; text-align: center; text-decoration: underline;">User</th>
			</tr>
			<tr>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Login</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">First Name</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Last Name</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Password</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Email</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Newsletter</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			//loop through the results
			for( $i=0; $i<$num_results; $i++ )
			{
				//store a single record out of $result into $row
				$row = mysqli_fetch_array($result);
			
			?>
		<tr>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Login"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["FirstName"] ) ); ?></td>	
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["LastName"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Passwd"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Email"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["NewsLetter"] ) ); ?></td>
		</tr>
		<?php
		} //end of for loop
		?>
		</tbody>
	</table>
	
	<p>&nbsp;</p>
	
	<?php
	
	
	//Prepare my sql statement	
	$sql = "SELECT ShippingID, Login, Name, Address, City, State, Zip FROM P2Shipping WHERE Login='".$_SESSION["login"]."'";
	
	//execute the sql query and store the result of the execution into $result	
	$result =  mysqli_query($db, $sql);
	
	//make sure there is a result
	//puts results into table with number of rows
	if( empty($result) )
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	
	?>
	<table style="border: 0px; width: 950px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Shipping Information">
		<thead>
			<tr>
				<th colspan="7" style="font-weight: bold; background-color: #008816; text-align: center; text-decoration: underline;">Shipping</th>
			</tr>
			<tr>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Login</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Shipping ID</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Name</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Address</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">City</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">State</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Zip</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			//loop through the results
			for( $i=0; $i<$num_results; $i++ )
			{
				//store a single record out of $result into $row
				$row = mysqli_fetch_array($result);
			
			?>
		<tr>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Login"] ) ); ?></td>	
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["ShippingID"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Name"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Address"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["City"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["State"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Zip"] ) ); ?></td>
		</tr>
		<?php
		} //end of for loop
		?>
		</tbody>
	</table>

	<p>&nbsp;</p>

	<?php
		
	//Prepare my sql statement	
	$sql = "SELECT BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM P2Billing WHERE Login='".$_SESSION["login"]."'";
	
	//execute the sql query and store the result of the execution into $result	
	$result =  mysqli_query($db, $sql);
	
	//make sure there is a result
	//puts results into table with number of rows
	if( empty($result) )
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	
	?>
	<table style="border: 0px; width: 950px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Billing Information">
		<thead>
			<tr>
				<th colspan="10" style="font-weight: bold; background-color: #008816; text-align: center; text-decoration: underline;">Billing</th>
			</tr>
			<tr>			
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Login</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Billing ID</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Bill Name</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Bill Address</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Bill City</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Bill State</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Bill Zip</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Card Type</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Card Number</th>
				<th style="background-color: #008816; font-weight: bold; border: 1px solid #000000;">Expiration date</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			//loop through the results
			for( $i=0; $i<$num_results; $i++ )
			{
				//store a single record out of $result into $row
				$row = mysqli_fetch_array($result);
			
			?>
		<tr>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["Login"] ) ); ?></td>	
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["BillingID"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["BillName"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["BillAddress"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["BillCity"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["BillState"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["BillZip"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["CardType"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["CardNumber"] ) ); ?></td>
			<td style="border: 1px solid #000000;"><?php echo( trim( $row["ExpDate"] ) ); ?></td>
		</tr>
		<?php
		} //end of for loop
		?>
		</tbody>
	</table>
	
	<?php
	include("includes/closeDbConn.php");
	?>
	
</body>
</html>