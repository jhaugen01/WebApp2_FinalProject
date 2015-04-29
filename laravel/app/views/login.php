<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">

</head>

<body>
  <div class="col-sm-3">
    <img src='http://www.barrospizza.com/wp-content/uploads/2013/10/menu-pizza.png' width="600px" height="300px" style="padding-top: 40px">
  </div>
  <div class="col-sm-9">
    <form class="form-signin" action="home" method='post'>
      <?php
      if(isset($message)) {
        echo "<h3 class='form-signin-heading' style='color:white'> $message </h3>";
      }
      ?>
      <h2 class="form-signin-heading" style="color:white">Please sign in</h2>
      <input type="text" id="username" name='username' class="form-control" placeholder="Username" required autofocus> <br />
      <input type="password" id="password" name='password' class="form-control" placeholder="Password" required>
      <br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br />
      <a href="create_account"><button class="btn btn-lg btn-primary btn-block" type="button">Create An Account</button></a>
    </form> 
  </div> <!-- /container -->
</body>
</html>
