<?php
	
	$name = $_POST['name'];
	$score = $_POST['final_score1'];
	
	$servername = "ec2-50-19-208-138.compute-1.amazonaws.com";
	$username = "kielmkokdoafzy";
	$password = "V6uMryDIWFyyPucIvivncsZHx1";
	$dbname = "dae5dditjr5ivu";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		$sql = "INSERT INTO game_score (full_name,score) VALUES ('$name','$score')";
		$conn->query($sql);
		
		$sql1 = "SELECT * FROM game_score";
		$top_scorer = $conn->query($sql1);

	}
?>
