<?php
	
	$name = $_POST['name'];
	$score = $_POST['final_score1'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "game_data";

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