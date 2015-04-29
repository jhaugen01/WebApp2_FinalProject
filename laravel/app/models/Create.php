<?php
class Create {

	public $username;
	public $password;
	public function __construct( $username='', $password='' ) {
		$this->username = $username;
		$this->password = $password; 
	}

	public function create() {
		$servername = "127.0.0.1";
		$user = "root";
		$pass = "";
		$dbname = "webapp2";

  // Create connection
		$conn = new mysqli($servername, $user, $pass, $dbname);
  // Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO customers (username, password)
		VALUES ('$this->username', '$this->password')";

		if($conn->query($sql)) {
			return true;
		} else {
			return false;
		}

		$conn->close();
	}
}
