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
.error {color: #FF0000;}
</style>
</head>
<body>

<div class="w3-container w3-display-topmiddle w3-half w3-margin-top">
<div class="w3-container w3-light-blue w3-leftbar w3-border-blue">
<?php

$cpasserr="";

 include_once('../controller/user.php');

if(isset($_POST['save'])){
if($_POST["userpass"]== $_POST["confirmpass"]){	
	 $userdata = array(
		'uname' => $_POST["uname"],
		'uemail'=> $_POST["uemail"],
		'ucontact' => $_POST["ucontact"],
		'userpass' =>md5($_POST["userpass"]),
		//'confirmpass' => ($_POST["confirmpass"]),
		'address' => $_POST["address"],
		'dob' => $_POST["dob"],
		'ugender' => $_POST["ugender"]
		);
		$controller = new Controller;
		if($controller->insertData($userdata))
		{
			//header("Location: page2.php");
			//echo "Successful";
			echo '<h4 style="color:Green; text-align:center;">Account Created Successfully!</h4>';
		    echo '<p style="color:blue; text-align:center;"> <a href= "login.php"> click here to Login </a> </p>';
		}
		else
		{
			//header("Location: page3.php");
			//echo "Not Successful";
            echo '<h4 style="color:Red;">Invalid email address.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
		}
}
else
{
	$cpasserr="Password doesn't match.";
}

}

?>

</div>
<div class="w3-container">
</div>

<div class="w3-container w3-light-green">
  <h2>Create Account</h2>
</div>

<form class="w3-container w3-card-4 w3-light-gray" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<p>
Name <b><font color="red">*</font></b>
<input class="w3-input" type="text" name="uname" required>
</p>

<p>
Email Address <b><font color="red">*</font></b>
<input class="w3-input" type="email" name="uemail" required>
</p>

<p>
Contact No. <b><font color="red">*</font></b>
<input class="w3-input" type="tel" name="ucontact" required>
</p>

<p>
Password <b><font color="red">*</font></b>
<input class="w3-input" type="password" name="userpass" required>
</p>

<p>
Confirm Password
<input class="w3-input" type="password" name="confirmpass" required>
<span class="error"><?php echo $cpasserr;?></span>
</p>

<p>
Address
<input class="w3-input" type="text"  name="address">
</p>

<p>
Date of Birth
<input class="w3-input" type="date" min="1960-01-01" max="2005-12-12" name="dob">
</p>

<p>
Gender 
<input class="w3-radio" type="radio" name="ugender" value="male" checked>
<label>Male</label>

<input class="w3-radio" type="radio" name="ugender" value="female">
<label>Female</label></p>

<p>
<button class="w3-button w3-section w3-light-green w3-ripple" type="submit" name="save"> Sign Up </button>
<button class="w3-button w3-section w3-light-green w3-ripple" type="reset" name="reset"> Reset </button>
<button class="w3-button w3-section w3-light-green w3-ripple" name="cancel"><a href= "home.php"> Cancel </a> </button>
</p>

</form>
</div>
</body>
</html> 




