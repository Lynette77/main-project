<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>chatapp</title>
    
    <script src="jquery.js"></script>
	<style type="text/css">
				
		#box{
			width: 425px;
			margin: 0 auto;
			border: 2px dotted grey;
		}
		#chattext{
			height: 400px;
			overflow: auto;
			padding: 10px;
		}
		input[type=text]{
			width: 280px;
			padding: 10px;
			box-sizing: border-box;
			border-radius: 4px;
			margin: 10px;
			background-color: #f8f8f8;
			font-size: medium;		
		}
		#button1{
			padding: 10px;
			color:white;
			background-color: grey;
			font-size: medium;	
		}
		#button2{
			padding: 10px;
			color:white;
			background-color: green;
			width: 100px;
			font-size: medium;
		}
		#timezone{
			padding: 10px;
		}
	</style>
<script type="text/javascript">
	
	// send question into database
	
	$(document).ready(function(){
		$("#button2").click(function(){
			var varname = $("#name").val();
			var varchat = $("#chat").val();
			$.ajax({
				method: "post",
				url: "data.php",
				data: {name:varname, chat:varchat},
				success: function(){
					$("#chat").val('');
				}
			})
			
			 
		});
	});
	// set interval 
	setInterval(function(){
		$("#chattext").load("getchat.php");
	}, 2000)
	// function to get time zone api
	
	$(function(){
		$("#button1").click(function(){
			
		
		$.get("http://api.timezonedb.com/?zone=America/Toronto&format=json&key=WTU4LLBZ20OF")
		.done(function(data){
			console.log(data);
			var time = data.timestamp;
			var zone = data.zoneName;
			var newtime = new Date(time*1000).toUTCString();
			$("#timezone").html(newtime);
			$("#timezone").append("<br>" + "Zone Name : "  + zone);
		});
	});
	});
				 
</script>
</head>
<body>
	<div id="box">
	<input type="text" name="name" id="name" placeholder="Enter your Name">
	<button id="button1">GetTimeAPI</button>
	<div id= "timezone"></div>
		<div id="chattext"></div>
	
	<input type="text" name="chat" id="chat" placeholder="Enter your Message">
	<button id="button2">Send</button>
	
	
	</div>
	
	
 </body>
</html>