<?php 
require_once('header.php');
?>
        <a class="navbar-brand" href= <?php echo "../$user"; ?> >Home</a>
        <a class="navbar-brand" href= "history">History</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

</body>
</html>
<html>
<script src="../js/customer.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.table-nonfluid {
 width: auto !important;
}
.btn {
  width: 300px;
}
th, td {
  padding: 10px;
}
</style>
<body><form action="order_history_handler" method="post">
  <div align="center" id='orderUpdate'> <h3> Update Order Data </h3>

    <b> Size of Pizza </b>
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
    $sql = "SELECT * FROM size";
    $result = $conn->query($sql);
    echo "<select name='size' class='selectpicker' data-style='btn-primary' required><OPTION></OPTION>";

    while($row = $result->fetch_assoc()) {
      echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
    }
    echo "</SELECT>";
    ?>

    <b> Crust </b>

    <?php 

    $sql = "SELECT * FROM crust";
    $result = $conn->query($sql);
    echo "<select name='crust' class='selectpicker' data-style='btn-primary' required><OPTION></OPTION>";

    while($row = $result->fetch_assoc()) {
      echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
    }
    echo "</SELECT>";
    ?>

    <b> Topping 1 </b> 
    <?php 
    $sql = "SELECT * FROM toppings ORDER BY name";
    $result = $conn->query($sql);
    echo "<select name='topping1' class='selectpicker' data-style='btn-primary' required><OPTION></OPTION>";

    while($row = $result->fetch_assoc()) {
      echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
    }
    echo "</SELECT>";
    ?>

    <b> Topping 2 </b>

    <?php
    $sql = "SELECT * FROM toppings ORDER BY name";
    $result = $conn->query($sql);
    echo "<select name='topping2' class='selectpicker' data-style='btn-primary'><OPTION></OPTION>";

    while($row = $result->fetch_assoc()) {
      echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
    }
    echo "</SELECT>";
    ?>

    <b> Topping 3 </b>

    <?php 
    $sql = "SELECT * FROM toppings ORDER BY name";
    $result = $conn->query($sql);
    echo "<select name='topping3' class='selectpicker' data-style='btn-primary'><OPTION></OPTION>";

    while($row = $result->fetch_assoc()) {
      echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
    }
    echo "</SELECT>";
    $conn->close(); 
    ?> 
    <br /><br />
    <button class="btn btn-lg btn-block btn-success" type='submit' name="submit" value='submit'> Submit Crust Data </button></div> <br />
    <div align="center"> <h2 style="color:red"> Order History </h2>

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
      $sql = "SELECT * FROM orders WHERE username='$user'";
      $result = $conn->query($sql);

      print '<table class="table table-bordered table-hover table-condensed table-nonfluid">';
      if ($result->num_rows > 0) {
        foreach ($ORDERS as $key => $value) {
          print "<th> $value </th>";
        }
        while($row = $result->fetch_assoc()) {
          if($row['status'] == 'None') {
            echo "<tr class='danger'><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td><td><input type='radio' name='updateOrder' class='update' value='update:".$row["id"]."'> Update Order </td>";
          } else if($row['status'] == 'In Progress'){
            echo "<tr class='warning'><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td>";
         } else if($row['status'] == 'Out For Delivery'){
           echo "<tr class='info'><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td>";
         } else {
           echo "<tr class='success'><td>".$row["username"]."</td><td>".$row["size"]."</td><td>".$row["crust"]."</td><td>".$row["topping_1"]."</td><td>".$row["topping_2"]."</td><td>".$row["topping_3"]."</td><td>$".$row["cost"]."</td><td>".$row["status_time"]."</td><td>".$row["status"]."</td>";
         } 
       }
     }
     $conn->close();
     ?>
   </tr></table></form></body></html>