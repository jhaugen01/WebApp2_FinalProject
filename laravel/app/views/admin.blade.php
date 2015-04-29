<?php
require_once('header.php');
?>
<a class="navbar-brand" href="admin">Home</a>
<a class="navbar-brand" href="admin_history">Admin History</a>
</div>
<form class="navbar-form navbar-left" action="admin_search" method="post">
    <select name='search' class='selectpicker' data-style='btn-primary' required>
      <OPTION></OPTION>
      <OPTION align="center" value="None"> None </OPTION>
      <OPTION align="center" value="In Progress"> In Progress </OPTION>
      <OPTION align="center" value="Out For Delivery"> Out For Delivery </OPTION>
      <OPTION align="center" value="Complete"> Complete </OPTION>
    </SELECT>
  <button type="submit" class="btn btn-default"> Search Order Status </button>
</form>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="admin/logout">Logout</a></li>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

</body>
</html>
<html>
<script src="js/admin.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
	th, td {
    	padding: 10px;
	}
	h2 {
		color:red;
	}
	.btn-block {
    	width: 200px;
    	background-color: red;
    	color: white;
	}
</style>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-5 column">
			<h2> Customer Info </h2>

<?php
	customers_table();
?>

	</div>
	<div class="col-md-7 column"> <?php if (isset($bad_input)) { echo "<h2> $bad_input</h2>";} ?>
		<h2> Size Table </h2> <form action="admin_handler" method="post">

<?php 
	size_table();
?>

	<td><input type='radio' name='updateSize' id='insertSize' value='insert'> Insert a new row</td></tr></table>
	<div id='sizeInsert'> <h3> Insert New Data Into The Table </h3>
		Name <input type='text' name='size1'> 
		Cost <input type='text' name='size2'> 
	</div> 
	<div id='sizeUpdate'> <h3> Update Data </h3>
		Name <input type='text' name='size3'> 
		Cost <input type='text' name='size4'> 
	</div> <br />
	<button class="btn btn-lg btn-block" type='submit' name="submit" value='size'> Submit Size Data </button> <br /><br /></form>
	<h2> Crust Table </h2> <form action="admin_handler" method="post">

<?php
	crust_table();
?>

	<td><input type='radio' name='updateCrust' id='insertCrust' value='insert'> Insert a new row</td></tr></table>
	<div id='crustInsert'> <h3> Insert New Data Into The Table </h3>
		Name <input type='text' name='crust1'> 
		Cost <input type='text' name='crust2'> 
	</div> 
	<div id='crustUpdate'> <h3> Update Data </h3>
		Name <input type='text' name='crust3'> 
		Cost <input type='text' name='crust4'> 
	</div> <br />
	<button class="btn btn-lg btn-block" type='submit' name="submit" value='crust'> Submit Crust Data </button> <br /><br /> </form>
	<h2> Toppings Table </h2> <form action="admin_handler" method="post">

<?php 
	toppings_table();
?>
	<td><input type='radio' name='updateToppings' id='insertToppings' value='insert'> Insert a new row</td></tr></table>
	<div id='toppingsInsert'> <h3> Insert New Data Into The Table </h3>
		Name <input type='text' name='toppings1'> 
		Cost <input type='text' name='toppings2'> 
	</div> 
	<div id='toppingsUpdate'> <h3> Update Data </h3>
		Name <input type='text' name='toppings3'> 
		Cost <input type='text' name='toppings4'> 
	</div> <br />
	<button class="btn btn-lg btn-block"type='submit' name="submit" value='toppings'> Submit Toppings Data </button> <br /><br /></form>
	</div></div></div>

<?php
function customers_table() {
	require('TABLES_CONFIG.php');
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
	$sql = "SELECT * FROM customers ORDER BY username";
	$result = $conn->query($sql);

	print '<table class="table table-striped">';
	if ($result->num_rows > 0) {
    	foreach ($CUSTOMERS as $key => $value) {
				print "<th> $value </th>";
		}
    	while($row = $result->fetch_assoc()) {
    	    echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
    	}
    	echo "</table><br />";
	} 
	$conn->close();
}

function crust_table() {
	require('TABLES_CONFIG.php');
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
	$sql = "SELECT * FROM crust ORDER BY cost";
	$result = $conn->query($sql);

	print '<table class="table table-striped">';
	if ($result->num_rows > 0) {
    	foreach ($CRUST as $key => $value) {
				print "<th> $value </th>";
		}
		while($row = $result->fetch_assoc()) {
        	echo "<tr><td>".$row["name"]."</td><td>$".$row["cost"]."</td><td><input type='radio' name='updateCrust' class='updateCrust' value='U:".$row["id"]."'> Update </td><td><input type='radio' name='updateCrust' class='deleteCrust' value='D:".$row["id"]."'> Delete </td></tr>";
    	}
	} 
	$conn->close();
}
function toppings_table() {
	require('TABLES_CONFIG.php');
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
	$sql = "SELECT * FROM toppings ORDER BY cost";
	$result = $conn->query($sql);

	print '<table class="table table-striped">';
	if ($result->num_rows > 0) {
    	foreach ($TOPPINGS as $key => $value) {
				print "<th> $value </th>";
		}
    	while($row = $result->fetch_assoc()) {
        	echo "<tr><td>".$row["name"]."</td><td>$".$row["cost"]."</td><td><input type='radio' name='updateToppings' class='updateToppings' value='U:".$row["id"]."'> Update </td><td><input type='radio' name='updateToppings' class='deleteToppings' value='D:".$row["id"]."'> Delete </td></tr>";
    	}
	} 
	$conn->close();
}
function size_table() {
	require('TABLES_CONFIG.php');
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
	$sql = "SELECT * FROM size ORDER BY cost";
	$result = $conn->query($sql);

	print '<table class="table table-striped">';
	if ($result->num_rows > 0) {
    	foreach ($SIZE as $key => $value) {
				print "<th> $value </th>";
		}
    	while($row = $result->fetch_assoc()) {
        	echo "<tr><td>".$row["name"]."</td><td>$".$row["cost"]."</td><td><input type='radio' name='updateSize' class='updateSize' value='U:".$row["id"]."'> Update </td><td><input type='radio' name='updateSize' class='deleteSize' value='D:".$row["id"]."'> Delete </td></tr>";
    	}
	} 
	$conn->close();
}
?>