<!DOCTYPE html>
<html>
<style>
</style>
<title>Waste Exchange System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wastex/w3.css">
<link rel="stylesheet" href="/wastex/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>
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
        <a class="nav-link" href="colprofile.php"><b>My profile</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><b>Log Out</b></a>
      </li>
      
	  </ul>
	</div>	
  </div>
</nav>
<br>
<h3 style="color:green ;text-align:center;">Waste to be Collected</h3>
<br>
<div class="container" id="offers">

<table class="table table-bordered table-striped">
<thead>
						<tr>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="10%">Contact No.</th>
							<th width="10%">Address</th>
							<th width="8%">Reward</th>
							<th width="8%">Waste Type</th>
							<th width="8%">Waste Quantity</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
<?php
session_start();
include_once('../controller/collector.php');

if(isset($_GET['collected'])){	
		$hid = $_GET['collected'];
		
			$controller = new Controller;
			if($controller->deleterecord($hid))
			{
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
}

		$colname =  $_SESSION['name'];
		$conn = new mysqli("localhost", "root", "","wastex");
		if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 	
		$sql = " SELECT hid,uname, email, ucontact, uaddress, rname, wtype, wquantity FROM user,`history` WHERE name= '$colname' and user.uid = history.uid";	
		
		 $result = mysqli_query($conn, $sql);	
				while($row = mysqli_fetch_assoc($result)) : ?>
				
				
				
				
				<tr>
					<td><span class='user'> <?php echo $row['uname'];?> </span> <br></td>
					<td><span class='user'> <?php echo $row['email']; ?></span> <br></td>
					<td><span class='user'> <?php echo $row['ucontact'];?> </span> <br></td>
					<td><span class='user'> <?php echo $row['uaddress'];?> </span> <br></td>
					<td><span class='user'> <?php echo $row['rname']; ?></span> <br></td>
					<td><span class='user'> <?php echo $row['wtype']; ?></span> <br></td>
					<td><span class='user'> <?php echo $row['wquantity']; ?></span> <br></td>
<td>
<a href= "collectorhome.php?collected=<?php echo $row['hid']; ?>" class = "btn btn-info">Collected</a> 
</td></tr>
</table>
 <?php endwhile; ?>
				
</div>
<script src="/wastex/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/wastex/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/wastex/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 