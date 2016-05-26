<?php
	$name = $_POST['name'];
	$chat = $_POST['chat'];

	include("db.php");
		
	if ($name && $chat){
		
	
	
	
	$sql= "insert into iwa2016 (name, question) values 
	(:name , :msg)";
	
	$run = $conn ->prepare($sql);
	$run -> bindValue(':name' , $name);
	$run -> bindValue(':msg' , $chat);
	$run ->execute();
}
	
	
	
	
	
?>