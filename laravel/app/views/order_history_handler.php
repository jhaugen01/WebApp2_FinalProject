<?php 
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "webapp2";

  // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$cost; //total cost of pizza


	$size = $_POST['size']; 
	$size_name = substr($size, 0, strpos($size, ':'));
	$size_cost = substr($size, strpos($size, ":") + 1);

	$crust = $_POST['crust'];
	$crust_name = substr($crust, 0, strpos($crust, ':'));
	$crust_cost = substr($crust, strpos($crust, ":") + 1);

	$topping1 = $_POST['topping1'];
	$topping1_name = substr($topping1, 0, strpos($topping1, ':'));
	$topping1_cost = substr($topping1, strpos($topping1, ":") + 1); 

	if (isset($_POST['topping2'])) {
		$topping2 = $_POST['topping2'];
		$topping2_name = substr($topping2, 0, strpos($topping2, ':'));
		$topping2_cost = substr($topping2, strpos($topping2, ":") + 1); 

	} else {
		$topping2_name = '';
		$topping2_cost = '';
	}
	if (isset($_POST['topping3'])) {
		$topping3 = $_POST['topping3'];
		$topping3_name = substr($topping3, 0, strpos($topping3, ':'));
		$topping3_cost = substr($topping3, strpos($topping3, ":") + 1); 

	} else {
		$topping3_name = '';
		$topping3_cost = '';
	}

	$cost = $size_cost + $crust_cost + $topping1_cost + $topping2_cost+ $topping3_cost;

	$update = $_POST['updateOrder']; 
	$id = substr($update, strpos($update, ":") + 1);

	$sql = "UPDATE orders SET size='$size_name' WHERE id='$id'";
	$conn->query($sql);

	$sql = "UPDATE orders SET crust='$crust_name' WHERE id='$id'";
	$conn->query($sql);

	$sql = "UPDATE orders SET topping_1='$topping1_name' WHERE id='$id'";
	$conn->query($sql);

	$sql = "UPDATE orders SET topping_2='$topping2_name' WHERE id='$id'";
	$conn->query($sql);

	$sql = "UPDATE orders SET topping_3='$topping3_name' WHERE id='$id'";
	$conn->query($sql);

	$sql = "UPDATE orders SET cost='$cost' WHERE id='$id'";
	$conn->query($sql);

	$sql = "UPDATE orders SET status_time=now() WHERE id='$id'";
	$conn->query($sql);

	$sql = "SELECT * FROM toppings_sold ORDER BY amount_sold DESC";
	$result = $conn->query($sql);

    	while($row = $result->fetch_assoc()) {
    	    if ($topping1_name == $row["topping_name"]) {
    	    	$sql = "UPDATE toppings_sold SET amount_sold = amount_sold + 1 WHERE topping_name='$topping1_name'";
				$conn->query($sql);
    	    }
    	    if ($topping2_name == $row["topping_name"]) {
    	    	$sql = "UPDATE toppings_sold SET amount_sold = amount_sold + 1 WHERE topping_name='$topping2_name'";
				$conn->query($sql);    	    	
    	    }
    	    if ($topping3_name == $row["topping_name"]) {
    	    	$sql = "UPDATE toppings_sold SET amount_sold = amount_sold + 1 WHERE topping_name='$topping3_name'";
				$conn->query($sql);    	    	
    	    }
    	}

	header("Location: history"); /* Redirect browser */
	
	$conn->close();
	exit;
	?>