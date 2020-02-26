<!DOCTYPE html>
<html>
<style>
</style>
<title>Waste Exchange System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wastex/w3.css">
<link rel="stylesheet" href="/wastex/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="container box">
<br>
		<a class="btn btn-outline-dark" href="companyhome.php" role="button">Back</a>
			<h1 align="center"></h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
				</div>
				<br /><br />
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
							<th width="20%">Assign Collector</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				

<?php
session_start();

include_once('../controller/company.php');

if(isset($_GET['assign'])){	
		$hid = $_GET['assign'];
		
			$controller = new Controller;
			if($controller->getrecord($hid))
			{
			//header("Location: page2.php");
			//echo "Successful";
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
}

if(isset($_POST['select'])){
	$hid = $_SESSION['hid'] ;
	 $updaterecord = array(
		'hid'=> $hid,
		'colname' => $_POST["collector"]
		);
		
		
			$controller = new Controller;
			if($controller->updatehistory($updaterecord))
			{
				echo '<script>alert("Collector assigned.")</script>';
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
}

		$cname =  $_SESSION['name'];
		$conn = new mysqli("localhost", "root", "","wastex");
		if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
		$sql = " SELECT hid,uname, email, ucontact, uaddress, rname, wtype, wquantity FROM user,`history` WHERE cname= '$cname' and user.uid = history.uid";
		$sql1 = " SELECT colid,name FROM collector where cname= '$cname'";
		 $result = mysqli_query($conn, $sql);
		 $result1 = mysqli_query($conn, $sql1);
		 //$count = mysqli_num_rows($result);
		
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

<select name="collector">
<?php while($row1 = mysqli_fetch_assoc($result1)) : ?>
<span class='user'><option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option></span>
<?php endwhile; ?>
</select>

					<a href= "assigncollector.php?assign=<?php echo $row['hid']; ?>"
					class = "btn btn-success">assign</a> </div>
					</td>
					<td>
					
					<button class="w3-button w3-section w3-light-green w3-ripple" type="submit" name="select"> Ok </button>
					</td>
				</tr>
				
				
					
				 <?php endwhile; ?>
				 </table>
	
</div>
</form>	
				 
<script src="/wastex/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/wastex/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/wastex/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 