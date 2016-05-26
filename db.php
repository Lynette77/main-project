<?php
try {
	

$host =	'localhost';
	$dbname = 'test';
	$user = 'root';
	$pass = 'doa24710';
	
	$conn = new PDO("mysql:host =$host; dbname=$dbname",
	$user, $pass);
} 
catch(PDOException $error){
	echo $error;
}


?>