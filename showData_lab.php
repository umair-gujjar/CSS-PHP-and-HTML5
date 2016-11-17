<!DOCTYPE html>
<html>
	<head>
		<title>Register Please</title>
	</head>
	<body>
		<h1>What is in here?</h1>
		<?php
					
			try{
				$host = '127.0.0.1:6000';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass); // creating a new object/connection with the database
				$sql = "SELECT * FROM logindetails"; // creating a $sql variable, that is gonna run be the sql code.
				$result = $DBH->query($sql); // -> calling the method of dhb object (the sql query/code)
				foreach ($result as $row){  // act like a while loop... looping over the array and saving the result in a row variable (rows)...
					echo "ID: ".$row['Id']." Name: ".$row['username']." Password: ".$row['Password']."<br>"; // printing row by row.
				}
			}catch(PDOException $e) {echo 'Error';}
			
			
		//}
		?>
		
	</body>
</html>