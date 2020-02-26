<!DOCTYPE html>
<html>
<title>Waste Exchange System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="/wastex/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
<div class="w3-card-4 w3-light-gray w3-display-topmiddle w3-half ">
<?php
session_start();
$_SESSION['message']='';


 include_once('../controller/collector.php');

if(isset($_POST['update'])){
if($_POST["newpass"]== $_POST["cpass"] && md5($_POST["pass"])== $_SESSION['pass']){	
	 $updatedata = array(
		'name' => $_POST["cname"],
		'name' => $_POST["name"],
		'email'=> $_POST["email"],
		'contact' => $_POST["contact"],
		'newpass' =>md5($_POST["newpass"]),
		'address' => $_POST["address"],
		'dob' => $_POST["dob"],
		'gender' => $_POST["gender"],
		'id' => $_SESSION['id']
		);
		$controller = new Controller;
		if($controller->updateData($updatedata))
		{
			$_SESSION['message']='Registered Successfully!';
			header("Location: login.php");
		}
		else
		{
			//header("Location: page3.php");
			//$_SESSION['message']='Sorry! something went wrong.';
            echo '<h4 style="color:Red;">Sorry! something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
		}
}
else
{
	echo '<h4 style="color:Red;">Password did not Match.</h4>' ;	
}

}

?>
<div class="col d-flex justify-content-center">
<div class="card" style="width: 50rem;" >
<nav class="navbar navbar-expand-lg navbar-light bg-success">

  <a class="navbar-brand" href="#"><h2>Waste Exchange System</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100 justify-content-end">
	  <li class="nav-item">
        <a class="nav-link" href="collectorhome.php"><b>Home</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><b>Log Out</b></a>
      </li>
      
	  </ul>	
  </div>
</nav>

<br><br><br>
<div class="container">
<h1 class="display-4">
Welcome <b><span class="user"> <?= $_SESSION['name'] ?>,</b> </span> </h1> </br>

<!--<img src = "<?//= $_SESSION['image']  ?>" height='300' width='300'>-->
<table style="text-align:left;width:40%">
<tr>
<td>
<b>Company Name: </b> </td><td><span class="user"> <?= $_SESSION['cname'] ?> </span> </br></td></tr><tr><td>
<b>Email address: </b></td><td><span class="user"> <?= $_SESSION['email'] ?> </span> </br></td></tr><tr><td>
<b>Contact No. : </b></td><td><span class="user"> <?= $_SESSION['contact'] ?> </span> </br></td></tr><tr><td>
<b>Gender: </b></td><td><span class="user"> <?= $_SESSION['gender'] ?> </span> </br></td></tr><tr><td>
<b>Address:</b> </td><td><span class="user"> <?= $_SESSION['address'] ?> </span> </br></td></tr><tr><td>
<b>Date Of Birth:</b> </td><td><span class="user"> <?= $_SESSION['dob'] ?> </span> 
</td></tr><tr><td>

<a class="btn btn-info btn-lg" href="collectorhome.php" role="button">Back</a></td><td>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit</button>
</td></tr></table>
<br><br><br>
</div>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Change Information</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table style="text-align:left;width:60%">
		<tr><td>
		  Company Name: </td><td><input type="text" name="cname" value=<?= $_SESSION['cname'] ?>> <br>
		  </td></tr><tr><td>
          Name: </td><td><input type="text" name="name" value=<?= $_SESSION['name'] ?>> <br>
		  </td></tr><tr><td>
		  Email Address: </td><td><input type="text" name="email" value=<?= $_SESSION['email'] ?>> <br>
		  </td></tr><tr><td>
		  Contact No.: </td><td><input type="text" name="contact" value=<?= $_SESSION['contact'] ?>> <br>
		  </td></tr><tr><td>
		  Address: </td><td><input type="text" name="address" value=<?= $_SESSION['address'] ?>> <br>
		  </td></tr><tr><td>
		  Date of Birth: </td><td><input type="date" min="1960-01-01" max="2005-12-12" name="dob" value=<?= $_SESSION['dob'] ?>> <br>
		  </td></tr><tr><td>
		  Gender: </td><td><input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female <br>
		  </td></tr><tr><td>
		  Current Password: </td><td><input type="password" name="pass" required> <br>
		  </td></tr><tr><td>
		  New Password : </td><td><input type="password" name="newpass" required> <br>
		  </td></tr><tr><td>
		  Confirm Password: </td><td><input type="password" name="cpass" required> <br>
		  </td></tr>
		  </table>
		  
        </div>
        <div class="modal-footer">
		  <button type="submit" class="btn btn-success" name="update"> Update </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
  
</div>


</div>
<script src="/wastex/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/wastex/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/wastex/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 