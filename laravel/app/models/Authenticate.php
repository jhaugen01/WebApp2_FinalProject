<?php
class Authenticate {

	public function __construct() {
	}

	public function check() {
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

	$sql = "SELECT login_token FROM customers WHERE username='admin'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if ($row['login_token'] == 1) {
			return true;
		} else {
			return false;
		}
	}

		$conn->close();
	}
}
