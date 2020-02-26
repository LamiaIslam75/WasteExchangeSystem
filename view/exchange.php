<!DOCTYPE html>
<html>
<title>Waste Exchange System</title>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wastex/w3.css">
 <link rel="stylesheet" href="/wastex/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>

<div class="w3-container w3-light-gray w3-card-4 w3-display-middle w3-half w3-margin-top">
<?php
session_start();
$_SESSION['msg']='';
include_once('../controller/user.php');

if(isset($_POST['save'])){	
	 $data = array(
		'uid'=> $_SESSION['id'],
		'rname'=> $_SESSION['rname'],
		'wtype'=> $_SESSION['wtype'],
		'wquantity'=> $_SESSION['wquantity'],
		'cname'=> $_SESSION['cname']
		
		);
		
		$controller = new Controller;
			if($controller->insertrecord($data))
			{
				echo '<script>alert("Your request has been submitted.")</script>';
				$_SESSION['msg']='Your request has been submitted.';
				//header("Location: userhome.php");
			
			}
			else
			{
            echo  $sql . "<br>" . $conn->error;			
			}
}
?>

<br> <br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="container text-center" >
	<span class='user'><img src = " <?php echo $_SESSION['image']; ?>" alt= 'pens' height='300' width='300' ></span> <br> <br> </div>
	Reward Name: 
	<?php echo $_SESSION['rname']; ?>
	<br />
	Waste Type:
	<?php echo $_SESSION['wtype'];?> 
	<br />
	Waste Quantity:
	<?php echo $_SESSION['wquantity'];?> 
	<br />
	Offered by:
	<?php echo $_SESSION['cname'];?> <br> <br>
	<div class="container text-center" >
	<a class="btn btn-info btn-lg" href="userhome.php" role="button">Back</a>
    <button class="btn btn-info btn-lg" type="submit" name="save"> Proceed </button> </div>
	<br> <br>
	
</div>	
</form>
<script src="/wastex/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/wastex/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/wastex/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 