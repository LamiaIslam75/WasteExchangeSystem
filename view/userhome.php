<!DOCTYPE html>
<html>
<style>
</style>
<title>Waste Exchange System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wastex/w3.css">
<link rel="stylesheet" href="/wastex/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>
<?php

session_start();
//include_once('../controller/user.php');
include_once('../controller/company.php');

if(isset($_GET['select'])){	
$id = $_GET['select'];
			$controller = new Controller;
			if($controller->getreward($id))
			{
				header("Location: exchange.php");
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
		
}
?>		

<nav class="navbar navbar-expand-lg navbar-light w3-light-green">
<div class="container">
  <a class="navbar-brand" href="#"><h2>Waste Exchange System</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100 justify-content-end">
	  <li class="nav-item">
        <a class="nav-link" href="home.php"><b>Home</b></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="uprofile.php"><b>My profile</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><b>Log Out</b></a>
      </li>
      
	  </ul>
	</div>	
  </div>
</nav>

<br>
<div class="container" style="text-center">
<form class="form-inline my-2 my-lg-0" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="searchbtn" type="submit">Search</button>
    </form>
</div>
<br>

<div class="container" id="offers">
<h3 style="color:green">Searched Results</h3>
<div class="row">

<?php
if(isset($_POST['searchbtn'])){	
$type= $_POST['search'];
		$conn = new mysqli("localhost", "root", "","wastex");
		if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
		$sql = "SELECT * FROM `offers` where wtype LIKE '$type%'";
	
		 $result = mysqli_query($conn, $sql);
		 $count = mysqli_num_rows($result);
		if($count>0){
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<div class='col-lg-4 col-md-4 col-xs-4 thumb'>
					<span class='user'><img src = '".$row['rimage']."' alt= 'pens' height='200' width='200' ></span> <br>
					<span class='user'> ".$row['reward']." </span> <br>
                    Waste Type: <span class='user'> ".$row['wtype']."</span> <br>
					Waste Quantity: <span class='user'> ".$row['wquantity']."</span> <br>  
					Offered by: <span class='user'> ".$row['cname']."</span> <br>
					
					<a href= 'userhome.php?select=".$row['oid']." '
					class = 'btn btn-info'>View</a> </div>";
					
				} 
		}
}
?>
</div>
</div>
<hr class="style3">
<br>
<div class="container" id="offers">
<h2 style="color:green">All offers</h2>
<div class="row">

<?php
		$conn = new mysqli("localhost", "root", "","wastex");
		if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
		$sql = " SELECT * FROM `offers`";
	
		 $result = mysqli_query($conn, $sql);
		 //$count = mysqli_num_rows($result);
		
				while($row = mysqli_fetch_assoc($result)) : ?>
					<div class="col-lg-4 col-md-4 col-xs-4 thumb">
					<span class='user'><img src = " <?php echo $row['rimage']; ?>" alt= 'pens' height='200' width='200' ></span> <br>
					<span class='user'> <?php echo $row['reward'];?> </span> <br>
                    <!--Waste Type: <span class='user'> <?php //echo $row['wtype']; ?></span> <br>
					Waste Quantity: <span class='user'> <?php //echo $row['wquantity'];?></span> <br>  -->
					Offered by: <span class='user'> <?php echo $row['cname'];?></span> <br>
					
					
					<a href= "userhome.php?select=<?php echo $row['oid']; ?>"
					class = "btn btn-info">View</a> </div>
					
					
				 <?php endwhile; ?>
				
</div>
</div>

<script src="/wastex/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/wastex/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/wastex/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 