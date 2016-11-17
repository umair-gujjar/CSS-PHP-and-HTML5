<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<h2>Login</h2><br>
		<?php	
			if($_POST) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				try{
					$host = '127.0.0.1';
					$dbname='test';
					$user='root';
					$pass='';
					$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
					$q = $DBH->prepare("SELECT * FROM logindetails WHERE username = :username and password = :password LIMIT 1");
					$q->bindValue(':username', $username);
					$q->bindValue(':password', $password);
					$q->execute();
					$check=$q->fetch(PDO::FETCH_ASSOC);
					$message = "";
					if(!empty($check)){
							$username = $check['username'];
							$message='Logging in';
					}else {
						$message="Sorry your details are incorrect";
					}
				}catch(PDOException $e){echo "error";}
			}
		?>
		
		<form action="login.php" method="POST">
			Username <input type="text" name="username" /><br>
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
			