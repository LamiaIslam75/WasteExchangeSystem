<!DOCTYPE html>
<html>
<title>Waste Exchange System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wastex/w3.css">
<head>
<style>
body {
  background-image: url('image/home_in.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
</head>
<body>

<div class="w3-container w3-display-topmiddle w3-half w3-margin-top">
<div class="w3-container w3-light-blue w3-leftbar w3-border-blue">
<?php

include_once('../controller/user.php');
session_start();
$_SESSION['message']="";

if(isset($_POST['login'])){

	
	 $logindata = array(
	 'loginrole'=> $_POST["role"],
	 'loginemail'=> $_POST["loginemail"],
	 'loginpass'=>($_POST["loginpass"])
	 );

	 $controller = new Controller;
	 if($controller->checklogin($logindata))
	{
		if($_SESSION['role'] == "user")
			{header("Location: userhome.php");}
		if($_SESSION['role'] == "admin")
			{header("Location: adminhome.php");}
		if($_SESSION['role'] == "company")
			{header("Location: companyhome.php");} 
		if($_SESSION['role'] == "collector")
			{header("Location: collectorhome.php");}
	}
	else
	{
		echo '<h4 style="color:Red;">Incorrect email address or password!</h4>' ;
	}
}
?>
</div>
<div class="w3-container">
</div>

<div class="w3-container w3-light-green">
  <h2>Log In</h2>
</div>

<form class="w3-container w3-card-4 w3-light-gray" action="login.php" method="post">
<div class="alert alert-error"><?= $_SESSION['message'] ?> </div>
<p>
User Role
<select class="w3-select" name="role" required>
  <option value="" disabled selected>Choose your role</option>
  <option value="user">Waste Provider</option>
  <option value="company">Company Representative</option>
  <option value="collector">Collector</option>
  <option value="admin">Admin</option>
</select>
</p>
<p>
Email Address
<input class="w3-input" type="email" name="loginemail" required>
</p>
<p>
Password
<input class="w3-input" type="password" name="loginpass" required>
</p>

<p>
<button class="w3-button w3-section w3-light-green w3-ripple" name="login"> Login </button>
<button class="w3-button w3-section w3-light-green w3-ripple" name="cancel"><a href= "home.php"> Cancel </a> </button>
</p>

</form>
</div>
</body>
</html> 