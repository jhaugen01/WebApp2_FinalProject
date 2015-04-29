<html lang="en">
<head>
  <title>Create An Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
    <form class="form-signin" action="create_account_handler" method='post'>
      <?php
      if(isset($message)) {
        echo "<h3 class='form-signin-heading' style='color:white'> $message </h3>";
      }
      ?>
      @foreach( $errors->all( "<h2 style='color:white' class='error'> :message </h2>") as $error )
         {{$error}}
      @endforeach 
      <h2 class="form-signin-heading" style="color:white">Create An Account</h2>
      <input type="text" id="username" name='username' class="form-control" placeholder="Username" required autofocus> <br />
      <input type="password" id="password" name='password' class="form-control" placeholder="Password" required>
      <br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account!</button>
    </form> <br />
    <a href="login"><button style="width: 330px; margin-left: 332px" class="btn btn-lg btn-primary btn-block" type="button">Back</button><a />
  </div> <!-- /container -->
</body>
</html>