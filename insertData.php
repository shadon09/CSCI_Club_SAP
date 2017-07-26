<?php
	
// saves connect to the database
$mysqlilink = connectToDB();
// mysqli_real_escape_string ignore special characters so that it can be used in a SQL command
$eventName   = mysqli_real_escape_string($mysqlilink,$_POST['event_name']);
$eventType   = mysqli_real_escape_string($mysqlilink,$_POST['event_type']);
$holderName  = mysqli_real_escape_string($mysqlilink,$_POST['holder_name']);
$email       = mysqli_real_escape_string($mysqlilink,$_POST['email']);
$phoneNumber = mysqli_real_escape_string($mysqlilink,$_POST['phone_number']);
$guestName   = mysqli_real_escape_string($mysqlilink,$_POST['guest_name']);
$location    = mysqli_real_escape_string($mysqlilink,$_POST['local']);
$date        = mysqli_real_escape_string($mysqlilink,$_POST['date']);
$time        = mysqli_real_escape_string($mysqlilink,$_POST['time']);
$descript    = mysqli_real_escape_string($mysqlilink,$_POST['descrip']);


getPageData($eventName,$eventType,$holderName,$email,$phoneNumber,$guestName,$location,$date,$time,$descript);

// connects to the database
function connectToDB()
{
	$mysqlilink = new mysqli('localhost','root','root','sap_db');
	
	if(mysqli_connect_error()){
		exit();
	}
	
	return $mysqlilink;
}

function getPageData($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)
{
	$mysqlilink = connectToDB();
	
	// if the SQL command is executed successfully then echo the message back to the script.js file which will then send the data back to the form.html file
	if($mysqlilink->query("INSERT INTO event_info VALUES('','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')"))
	{
		echo '<p> Data saved successfully </p>';
	}
	else
	{
		echo '<p> There was a problem saving the information. </p>';
	}
	

	
}	


?>