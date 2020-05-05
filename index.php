<?php 
require_once "readJson.php";
require_once "pdo.php";

//CREATE table BookingData(partId integer NOT NULL, employeeName varchar(128),employeeEmail varchar(128),eventId integer, eventName varchar(128),participationFee varchar(128),eventDate DATE,PRIMARY KEY(partId));

foreach ($jsonData as $key => $value)
 {
		$dataInsertion="INSERT INTO BookingData (partId,employeeName,employeeEmail,eventId,eventName,participationFee,eventDate) VALUES(:partId,:employeeName,:employeeEmail,:eventId,:eventName,:participationFee,:eventDate)";
		$stmt=$pdo->prepare($dataInsertion);
		$stmt->execute(array(':partId'=>$jsonData[$key]["participation_id"],':employeeName'=>$jsonData[$key]["employee_name"],
			':employeeEmail'=>$jsonData[$key]["employee_mail"],':eventId'=>$jsonData[$key]["event_id"],
			':eventName'=>$jsonData[$key]["event_name"],':participationFee'=>$jsonData[$key]["participation_fee"],
			':eventDate'=>$jsonData[$key]["event_date"]));
 	
 }
?>
