<!DOCTYPE html>
<html>
	<head>
		<title>Register Please</title>
	</head>
	<body>
		<h1>What is in here?</h1>
		<?php
					
			try{
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
				$sql = "SELECT * FROM logindetails";
				$result = $DBH->query($sql);
				foreach ($result as $row){
					echo "ID: ".$row['id']." Name: ".$row['username']." Password: ".$row['password']."<br>";
				}
			}catch(PDOException $e) {echo 'Error';}
			
			
		//}
		?>
		
	</body>
</html>