<?php
		
	include("db.php");
		
	$sql= "select name, question , Date_format(time, '%h:%i %p') as time_only from iwa2016 order by id desc";
	
	$run = $conn ->prepare($sql);
	$run ->execute();
	
	
	while($row= $run->fetch(PDO::FETCH_ASSOC)){
		
		
		echo $row['name'] ." : ". $row['question'] ."<br>";
		echo "<span style='float:right'>". $row['time_only']. "</span><br>" ;
		
		
		
	}


?>