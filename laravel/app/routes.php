<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|

Route::get('/customer', function()
{
	return View::make('customer');
});
Route::get('/customer_history', function()
{
	return View::make('customer_history');
});
Route::post('/customer_handler', function()
{
	return View::make('customer_handler');
});

Route::post('/order_history_handler', function()
{
	return View::make('order_history_handler');
});

*/
Route::get('/', function()
{
	return View::make('login');
});
Route::get('/login', function()
{
	return View::make('login');
});
Route::any('{user}/logout', ['uses' => 'HomeController@logout']);

Route::get('/create_account', function()
{
	return View::make('create_account');
});
Route::post('/create_account_handler', function()
{
	$Input = Input::all();

	$rules = array(
		'username' => 'required|min:4',
		'password' => 'required|min:8'
		);
	$validator = Validator::make( $Input, $rules );
	if ( $validator->fails()) {
		return Redirect::to('create_account')->withInput()->withErrors($validator->messages());
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$create_account = new Create($username, $password);
	if ($create_account->create()) {
		return Redirect::to('login');
	} else {
		return View::make('create_account')->with("message", "Username already exists");
	}
});
//Route::post('/create_account_handler', 'HomeController@create_account');

Route::post('/home', 'HomeController@login');

Route::get('/admin', function($bad = null)
{
	$auth = new Authenticate();
	if ($auth->check()) {
		return View::make('admin') -> with("bad_input", $bad);
	} else {
		return Redirect::to('login');
	}
});
Route::get('/admin-{bad}', function($bad = null)
{
	$auth = new Authenticate();
	if ($auth->check()) {
		return View::make('admin') -> with("bad_input", $bad);
	} else {
		return Redirect::to('login');
	}
});

Route::get('/admin_history', function()
{
	$auth = new Authenticate();
	if ($auth->check()) {
		return View::make('admin_history');
	} else {
		return Redirect::to('login');
	}
});

Route::post('/admin_handler', function()
{
	$auth = new Authenticate();
	if ($auth->check()) {
		return View::make('admin_handler');
	} else {
		return Redirect::to('login');
	}

});


Route::get('/get_admin_history', function()
{
	$auth = new Authenticate();
	if ($auth->check()) {
		return View::make('get_admin_history');
	} else {
		return Redirect::to('login');
	}

});

Route::post('/admin_search', function()
{
	$auth = new Authenticate();
	if ($auth->check()) {
		return View::make('admin_search');
	} else {
		return Redirect::to('login');
	}

});
Route::get('{user}', function($user)
{	
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

	$sql = "SELECT login_token FROM customers WHERE username='$user'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if ($row['login_token'] == 0) {
			return Redirect::to('login');
			exit;
		} else {
			return View::make('customer')->with("user",$user);
		}
	}

});
Route::get('{user}/history', function($user)
{	
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

	$sql = "SELECT login_token FROM customers WHERE username='$user'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if ($row['login_token'] == 0) {
			return Redirect::to('login');
			exit;
		} else {
			return View::make('customer_history')->with("user",$user);
		}
	}

});
Route::post('{user}/handler', function($user)
{
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

	$sql = "SELECT login_token FROM customers WHERE username='$user'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if ($row['login_token'] == 0) {
			return Redirect::to('login');
			exit;
		} else {
			return View::make('customer_handler')->with("user", $user);
		}
	}

});
Route::post('{user}/order_history_handler', function($user)
{
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

	$sql = "SELECT login_token FROM customers WHERE username='$user'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if ($row['login_token'] == 0) {
			return Redirect::to('login');
			exit;
		} else {
			return View::make('order_history_handler')->with("user", $user);
		}
	}

});



