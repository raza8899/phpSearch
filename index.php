<?php 
require_once "readJson.php";
require_once "pdo.php";
$stmt = $pdo->query("DELETE FROM BookingData");
//Query for creation of Table
//CREATE table BookingData(partId integer NOT NULL, employeeName varchar(128),employeeEmail varchar(128),eventId integer, eventName varchar(128),participationFee varchar(128),eventDate DATE,PRIMARY KEY(partId));

//Loading data into Database 
foreach ($jsonData as $key => $value)
 {
	$dataInsertion="INSERT INTO BookingData (partId,employeeName,employeeEmail,eventId,eventName,participationFee,eventDate) 
					VALUES(:partId,:employeeName,:employeeEmail,:eventId,:eventName,:participationFee,:eventDate)";
	$stmt=$pdo->prepare($dataInsertion);
	$stmt->execute(array(':partId'=>$jsonData[$key]["participation_id"],':employeeName'=>$jsonData[$key]["employee_name"],
			':employeeEmail'=>$jsonData[$key]["employee_mail"],':eventId'=>$jsonData[$key]["event_id"],
			':eventName'=>$jsonData[$key]["event_name"],':participationFee'=>$jsonData[$key]["participation_fee"],
			':eventDate'=>$jsonData[$key]["event_date"]));
 	
 }
?>

<?php
//Code for Loading Filtered Data

		if(isset($_POST['search']))
		{
		$searchQuery = "SELECT * FROM BookingData ";
		$conditions=array();
		if(isset($_POST["employeeName"]))
		{		
			$employeeName=$_POST['employeeName'];
			$conditions[]= " employeeName LIKE '%$employeeName%'";
		}
		if(isset($_POST["eventName"]))
		{		
			$eventName=$_POST['eventName'];
			$conditions[]= " eventName LIKE '%$eventName%'";
		}
		if(isset($_POST["eventDate"]))
		{		
			$eventDate=$_POST['eventDate'];
			$conditions[]= " eventDate LIKE '%$eventDate%'";
		}
		
		

		if(count($conditions) > 0) 
		{
    		$searchQuery .= " WHERE " . implode (' AND ', $conditions); 
		}

		$stmt = $pdo->query($searchQuery);
		}		
?>

<!DOCTYPE html>
<html>
<head>
<title>Code Challenge</title>
<?php require_once "bootstrap.php"; ?>
<style>
body
{
padding:20px;
margin:20px;
}
</style>
</head>
<body>
<div class="container">
	<div class="row">
		<h2>Data Filtering Through PHP </h2>
		<div class="col-12">
		<form method="post">
		<label>Employee Name: </label>
		<p><input type="text" name="employeeName"></p>
		<label>Event Name </label>
		<p><input type="text" name="eventName"></p>
		<label>Event Date: </label>
		<p><input type="date" name="eventDate"></p>
		<input type="submit" value="search" name="search">
		</form>
		</div>
		<br /><br />
		<?php

		//Code for Displaying Data

		echo('<div class="col-12 m-10" >');
		echo('<table class="table table-borderless m-4"  >');	
		echo('<thead class="thead-light">');
		echo('<tr><th>Part. Id</th>');
		echo('<th>Employee Name</th>');
		echo('<th>Employee Email</th>');
		echo('<th>Event Id</th>');
		echo('<th>Event Name</th>');
		echo('<th>Participation Fee</th>');
		echo('<th>Event Date</th></tr>');
		echo('</thead>');
		$total_Fees=0;					
		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

		    echo "<tr><td>";
		    echo(htmlentities($row['partId']));
		    echo("</td><td>");
		    echo(htmlentities($row['employeeName']));
		    echo("</td><td>");
		    echo(htmlentities($row['employeeEmail']));
		    echo("</td><td>");
		    echo(htmlentities($row['eventId']));
		    echo("</td><td>");
		    echo(htmlentities($row['eventName']));
		    echo("</td><td>");
		    echo(htmlentities($row['participationFee']));
		    echo("</td><td>");
		    echo(htmlentities($row['eventDate']));
		    echo("</td>");
		    echo("</tr>");
    		$total_Fees+=$row['participationFee'];

		}
		echo("<tr><td colspan='4'> <b>Total Participation Fees </b></td>");
		echo("<td colspan='3'>".$total_Fees."</td></tr>");
		echo("</table>");
		echo('</div>');
		?>
	</div>
</div>
</body>