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
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.table-nonfluid {
 width: auto !important;
}
#chartdiv {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}
th, td {
  padding: 10px;
}
h2 {
  color:red;
}
</style>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
<title>Admin History</title>
</head><body><div align="center">

<form action="admin_handler" method="post"><h2> Order History </h2>
  <?php
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

   $search = $_POST['search'];

  $sql = "SELECT * FROM orders WHERE status='$search'";
  $result = $conn->query($sql);

  print '<table class="table table-striped table-nonfluid">';
  if ($result->num_rows > 0) {
    foreach ($ORDERS as $key => $value) {
      print "<th> $value </th>";
    }
    while($row = $result->fetch_assoc()) {
      if($row['status'] == 'Complete') {
        echo "<tr class='success'><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td></tr>";
      } else if ($row['status'] == 'Out For Delivery') {
        echo "<tr class='info'><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td><td><button class='btn btn-lg btn-success btn-block' type='submit' name='complete' value='".$row["id"]."'> Complete? </td></tr>";
      }
      else if ($row['status'] == 'In Progress') {
        echo "<tr class='warning'><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td><td><button class='btn btn-lg btn-info btn-block' type='submit' name='delivery' value='".$row["id"]."'> Out For Delivery? </td><td><button class='btn btn-lg btn-success btn-block' type='submit' name='complete' value='".$row["id"]."'> Complete? </td></tr>";
      } else {
        echo "<tr class='danger'><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td><td><button class='btn btn-lg btn-warning btn-block' type='submit' name='in_progress' value='".$row["id"]."'> In Progress? </td></tr>";
      }
    }
    echo "</table><br />";
  } 
  $conn->close();
  ?>
</form></div></body></html>