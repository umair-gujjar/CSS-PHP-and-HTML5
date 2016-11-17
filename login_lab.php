<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<h2>Login</h2><br>
		<?php	
			if($_POST) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				try{
					$host = '127.0.0.1:6000';
					$dbname='shop';
					$user='root';
					$pass='';
					$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
					$q = $DBH->prepare("SELECT * FROM employees WHERE email = :email and password = :password LIMIT 1");
					$q->bindValue(':email', $email);
					$q->bindValue(':password', $password);
					$q->execute();
					$check=$q->fetch(PDO::FETCH_ASSOC);
					$message = "";
					if(!empty($check)){
							$email = $check['email'];
							$message='Logging in';
					}else {
						$message="Sorry your details are incorrect";
					}
				}catch(PDOException $e){echo "error";}
			}
		?>
		
		<form action="showData_lab.php" method="POST">
			Email <input type="text" name="email" /><br>
			Password <input type="password" name="password" /><br>
			<input type="submit" value="Submit" />
			
		<?php 
			if(!empty($message)){
				echo'<br>';
				echo $message;
			}
		?>
		</form>
	</body>
</html>
			