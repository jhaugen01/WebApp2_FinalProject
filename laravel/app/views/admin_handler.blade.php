<?php
if (isset($_POST['updateSize'])) {
	if ($_POST['submit'] == "size") {
		$update = $_POST['updateSize'];
		if ($update == "insert") {
			size_insert(); 
		}
		if (preg_match("/^U/", $update)) { 
			size_update($update);
		}
		if (preg_match("/^D/", $update)) { 
			size_delete($update);
		} 
	}
} 
if (isset($_POST['updateCrust'])) {

	if ($_POST['submit'] == "crust") {
		$update = $_POST['updateCrust']; 
		if ($update == "insert") {
			crust_insert(); 
		}
		if (preg_match("/^U/", $update)) { 
			crust_update($update);
		}
		if (preg_match("/^D/", $update)) { 
			crust_delete($update);
		} 
	}
}
if (isset($_POST['updateToppings'])) {
	if ($_POST['submit'] == "toppings") {
		$update = $_POST['updateToppings']; 
		if ($update == "insert") {
			toppings_insert(); 
		}
		if (preg_match("/^U/", $update)) { 
			toppings_update($update);
		}
		if (preg_match("/^D/", $update)) { 
			toppings_delete($update);
		} 
	}
}
if (isset($_POST['complete'])) {
	$complete = $_POST['complete'];
	complete($complete);
}
if (isset($_POST['in_progress'])) {
	$status = $_POST["in_progress"];
	in_progress($status);
}
if (isset($_POST['delivery'])) {
	$status = $_POST['delivery'];
	delivery($status);
}

function size_insert() {
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
	$size1 = $_POST['size1'];
	$size2 = $_POST['size2'];
	if ($size1 == "") {
		header("Location: admin-Please Input A Name");
		exit;
	}
	if (!is_numeric($size2)) {
		header("Location: admin-Cost Must Be A Number");
		exit;
	}

	if($size1 != "" && $size2 != "") {
		$sql = "INSERT INTO size (name, cost) VALUES ('$size1', '$size2')";
		$conn->query($sql);
		header("Location: admin"); /* Redirect browser */
	} else {
		header("Location: admin"); /* Redirect browser */
	}

	$conn->close();
	exit;
}
function size_update($update) {
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
	$id = substr($update, strpos($update, ":") + 1);

	$size3 = $_POST['size3'];
	$size4 = $_POST['size4'];
	if (!is_numeric($size4)) {
		header("Location: admin-Cost Must Be A Number");
		exit;
	}

	if ($size3 != "") {
		$sql = "UPDATE size SET name='$size3' WHERE id=$id";
		$conn->query($sql);
	}
	if ($size4 != "") {
		$sql = "UPDATE size SET cost='$size4' WHERE id=$id";
		$conn->query($sql);
	}
	header("Location: admin"); /* Redirect browser */
	$conn->close();
	exit;
}
function size_delete($update) {
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
	$id = substr($update, strpos($update, ":") + 1);

	$sql = "DELETE FROM size WHERE id=$id";
	$conn->query($sql);

	$conn->close();
	header("Location: admin"); /* Redirect browser */
	exit;
}
function crust_insert() {
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
	$crust1 = $_POST['crust1'];
	$crust2 = $_POST['crust2'];
	if ($crust1 == "") {
		header("Location: admin-Please Input A Name");
		exit;
	}
	if (!is_numeric($crust2)) {
		header("Location: admin-Cost Must Be A Number");
		exit;
	}

	if($crust1 != "" && $crust2 != "") {
		$sql = "INSERT INTO crust (name, cost) VALUES ('$crust1', '$crust2')";
		$conn->query($sql);
		header("Location: admin"); /* Redirect browser */
	} else {
		header("Location: admin"); /* Redirect browser */
	}

	$conn->close();
	exit;
}
function crust_update($update) {
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
	$id = substr($update, strpos($update, ":") + 1);

	$crust3 = $_POST['crust3'];
	$crust4 = $_POST['crust4'];
	if (!is_numeric($crust4)) {
		header("Location: admin-Cost Must Be A Number");
		exit;
	}

	if ($crust3 != "") {
		$sql = "UPDATE crust SET name='$crust3' WHERE id=$id";
		$conn->query($sql);
	}
	if ($crust4 != "") {
		$sql = "UPDATE crust SET cost='$crust4' WHERE id=$id";
		$conn->query($sql);
	}
	header("Location: admin"); /* Redirect browser */
	$conn->close();
	exit;
}
function crust_delete($update) {
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
	$id = substr($update, strpos($update, ":") + 1);

	$sql = "DELETE FROM crust WHERE id=$id";
	$conn->query($sql);

	header("Location: admin"); /* Redirect browser */
	$conn->close();
	exit;
}
function toppings_insert() {
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
	$toppings1 = $_POST['toppings1'];
	$toppings2 = $_POST['toppings2'];
	if ($toppings1 == "") {
		header("Location: admin-Please Input A Name");
		exit;
	}
	if (!is_numeric($toppings2)) {
		header("Location: admin-Cost Must Be A Number");
		exit;
	}

	if($toppings1 != "" && $toppings2 != "") {
		$sql = "INSERT INTO toppings (name, cost) VALUES ('$toppings1', '$toppings2')";
		$conn->query($sql);

		$sql = "SELECT id FROM toppings WHERE name='$toppings1'";
		$result = $conn->query($sql);

		$id;
		while($row = $result->fetch_assoc()) {
    	    $id = $row["id"];
    	}

		$sql = "INSERT INTO toppings_sold (topping_id, topping_name) VALUES ('$id','$toppings1')";
		$conn->query($sql);
		header("Location: admin"); /* Redirect browser */
	} else {
		header("Location: admin"); /* Redirect browser */
	}

	$conn->close();
	exit;
}
function toppings_update($update) {
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
	$id = substr($update, strpos($update, ":") + 1);

	$toppings3 = $_POST['toppings3'];
	$toppings4 = $_POST['toppings4'];
	if (!is_numeric($toppings4)) {
		header("Location: admin-Cost Must Be A Number");
		exit;
	}

	if ($toppings3 != "") {
		$sql = "UPDATE toppings SET name='$toppings3' WHERE id=$id";
		$conn->query($sql);

		$sql = "UPDATE toppings_sold SET topping_name='$toppings3' WHERE topping_id=$id";
		$conn->query($sql);
	}
	if ($toppings4 != "") {
		$sql = "UPDATE toppings SET cost='$toppings4' WHERE id=$id";
		$conn->query($sql);
	}

	header("Location: admin"); /* Redirect browser */
	$conn->close();
	exit;
}
function toppings_delete($update) {
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
	$id = substr($update, strpos($update, ":") + 1);

	$sql = "DELETE FROM toppings WHERE id=$id";
	$conn->query($sql);

	$sql = "DELETE FROM toppings_sold WHERE topping_id=$id";
	$conn->query($sql);

	header("Location: admin"); /* Redirect browser */
	$conn->close();
	exit;
}
function complete($id) {
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
	
	$sql = "UPDATE orders SET status='Complete' WHERE id=$id";
	$conn->query($sql);
	$sql = "UPDATE orders SET status_time=now() WHERE id=$id";
	$conn->query($sql);

	header("Location: admin_history"); /* Redirect browser */
	$conn->close();
	exit;
}
function in_progress($id) {
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
	
	$sql = "UPDATE orders SET status='In Progress' WHERE id=$id";
	$conn->query($sql);
	$sql = "UPDATE orders SET status_time=now() WHERE id=$id";
	$conn->query($sql);

	header("Location: admin_history"); /* Redirect browser */
	$conn->close();
	exit;
}
function delivery($id) {
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
	
	$sql = "UPDATE orders SET status='Out For Delivery' WHERE id=$id";
	$conn->query($sql);
	$sql = "UPDATE orders SET status_time=now() WHERE id=$id";
	$conn->query($sql);

	header("Location: admin_history"); /* Redirect browser */
	$conn->close();
	exit;
}
?>