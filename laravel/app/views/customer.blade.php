<?php 
require_once('header.php');
?>
<a class="navbar-brand" href= <?php echo "$user"; ?> >Home</a>
<a class="navbar-brand" href= <?php echo "$user/history"; ?> >History</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">
    <li><a href=<?php echo "$user/logout"; ?>>Logout</a></li>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

</body>
</html>
<html>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/signin.css" rel="stylesheet">
<style>
body {background-color:red}
h1, h3   {color:white}
b {color:white}
</style>
<head> 
  <title> Pizza Company </title></head>
  <body>
    <h1 align="center">Welcome, <?php echo $user; ?>, to the Online Pizza Ordering</h1>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-5 column">
          <img src='http://www.barrospizza.com/wp-content/uploads/2013/10/menu-pizza.png' width="450px" height="300px" style="padding-top: 40px">
        </div>
        <div class="col-md-7 column">
          <br /> <br />
          <form method="post" action= <?php echo "$user/handler"; ?> >

            <b>Size of Pizza</b>
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
            <br /><br />
            <b>Type of Crust</b>

            <?php 

            $sql = "SELECT * FROM crust";
            $result = $conn->query($sql);
            echo "<select name='crust' class='selectpicker' data-style='btn-primary' required><OPTION></OPTION>";

            while($row = $result->fetch_assoc()) {
              echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
            }
            echo "</SELECT><br />";
            ?>


            <div align="left">
              <br /><b>Choose Your Toppings: </b><br><br />
              <b>Topping 1</b>
              <?php 
              $sql = "SELECT * FROM toppings ORDER BY name";
              $result = $conn->query($sql);
              echo "<select name='topping1' class='selectpicker' data-style='btn-primary' required><OPTION></OPTION>";

              while($row = $result->fetch_assoc()) {
                echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
              }
              echo "</SELECT><br/>";
              ?>
              <br />
              <b>Topping 2</b>

              <?php
              $sql = "SELECT * FROM toppings ORDER BY name";
              $result = $conn->query($sql);
              echo "<select name='topping2' class='selectpicker' data-style='btn-primary'><OPTION></OPTION>";

              while($row = $result->fetch_assoc()) {
                echo "<OPTION value=".$row['name'].":".$row['cost'].">". $row['name']." </OPTION>";
              }
              echo "</SELECT><br />";
              ?>
              <br />
              <b>Topping 3</b>

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
            </div>
            <br />
            <button class="btn btn-lg btn-primary btn-block" type='submit' name="submit" value='submit'> Submit Order! </button>
          </form>
        </div>
      </body>
      </html>
