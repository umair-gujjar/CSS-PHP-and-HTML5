<?php
	$pid = $_GET['id'];
	include ('db.php'); // connecting to the database
	$q = $DBH -> prepare ("SELECT * FROM products WHERE id= :pid");
	$q -> bindValue (':pid', $pid);
	$q -> execute ();
	$row = $q -> fetch (PDO::FETCH_ASSOC);
	
	
	echo $row ['id']."," .$row['product_name']."," .$row['product_description'];
	echo ",".$row['cost']."<br>";
?>