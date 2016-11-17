<?php 
	// create the connection
	include('db.php');
	// select the correct table
	$q = $DBH -> prepare ("SELECT * FROM products");
	$q -> execute ();
	//get the answer and put it in a variable
	$check = $q -> fetchAll (PDO::FETCH_ASSOC);
	foreach ($check as $row){
		//echo $row['id'].",".$row['product_name'].",".$row['product_description'];
		echo "<a href = 'http://localhost/Week6_DynamicPages/viewProduct.php?id=".$row['id']."'> ".$row['product_name']." </a> <br>";
	}
?>