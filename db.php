<?php
	try{
		$host = '127.0.0.1:6000';
		$dbname = 'test';
		$user = 'root';
		$pass = '';
		$DBH = new PDO ("mysql:host=$host; dbname=$dbname", $user, $pass);
		
	} catch (PDOException $e){echo "ERROR";}
?>