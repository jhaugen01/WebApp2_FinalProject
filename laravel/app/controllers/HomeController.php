<?php
class HomeController extends BaseController {
	public function create_account() {
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
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO customers (username, password)
  VALUES ('$username', '$password')";

  if($conn->query($sql)) {
    return Redirect::to('login');
  } else {
    return View::make('create_account')->with("message", "Failed To Create Account");
  }

  $conn->close();
}

public function login() {
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
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM customers ORDER BY username";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      if ($username == 'admin' && $password == 'password') {
        $sql = "UPDATE customers SET login_token='1' WHERE username='admin'";
        $conn->query($sql);
        return View::make('admin');
        exit;
      } else if ($row['username'] == $username && $row['password'] == $password) {
        $username = $row['username'];
        $sql = "UPDATE customers SET login_token='1' WHERE username='$username'";
        $conn->query($sql);
        return View::make('customer')->with("user",$row['username']);
        exit;
      }
    }
    return View::make('login')->with("message", "Failed to login to account");
  } 
}
public function logout($user) {
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

  $sql = "UPDATE customers SET login_token='0' WHERE username='$user'";
  $conn->query($sql);

  return Redirect::to('login');

}
}
