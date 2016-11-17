<!DOCTYPE html>
<html>
	<head>
		<title>Register Please</title>
	</head>
	<body>
		<h1>Register Here</h1>
		<?php
		if($_POST){
			$email = $_POST['email'];
			$password = $_POST['password'];
			echo "email ".$email." Password: ".$password."<br>";
						
			try{
				$host = '127.0.0.1:6000';
				$dbname = 'shop';
				$user = 'root';
				$pass = '';
				$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
				$sql = "INSERT INTO employees (first_name, surname, department_name, salary, email, password) VALUES (?,?)";
				
				$sth = $DBH->prepare($sql);
			
				$sth->bindParam(1, $email, PDO::PARAM_STR);
				$sth->bindParam(2, $password, PDO::PARAM_STR);
			
				$sth->execute();
				echo "You are now registered";
			}catch(PDOException $e) {echo 'Error';}
		}
		?>
		<form action="register_lab.php" method="POST">
			Email: <input type="text" name="email" /><br>
			Password: <input type="password" name="password" /><br>
			<input type="submit" value="Submit"/>
		</form>
	</body>
</html>