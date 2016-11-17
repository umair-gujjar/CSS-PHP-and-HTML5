<!DOCTYPE html>
<html>
	<head>
		<title>Register Please</title>
	</head>
	<body>
		<h1>Register Here</h1>
		<?php
		if($_POST){
			$username = $_POST['username'];
			$password = $_POST['password'];
			echo "Username ".$username." Password: ".$password."<br>";
						
			try{
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
				$sql = "INSERT INTO logindetails (username, password) VALUES (?,?)";
				
				$sth = $DBH->prepare($sql);
			
				$sth->bindParam(1, $username, PDO::PARAM_STR);
				$sth->bindParam(2, $password, PDO::PARAM_STR);
			
				$sth->execute();
				echo "You are now registered";
			}catch(PDOException $e) {echo 'Error';}
		}
		?>
		<form action="register.php" method="POST">
			Username: <input type="text" name="username" /><br>
			Password: <input type="password" name="password" /><br>
			<input type="submit" value="Submit"/>
		</form>
	</body>
</html>