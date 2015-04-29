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
$sql = "SELECT * FROM toppings_sold";
$result = $conn->query($sql);


// Print out rows
$prefix = '';
echo "[\n";
while($row = $result->fetch_assoc()) {
  echo $prefix . " {\n";
  echo '  "Name": "' . $row['topping_name'] . '",' . "\n";
  echo '  "Amount Sold": ' . $row['amount_sold'] . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";
$conn->close(); 
?>
