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
$_SESSION['rname']='';
$_SESSION['wtype']='';
$_SESSION['wquantity']='';

include_once('../controller/company.php');

if(isset($_POST['post'])){	
	 $rewarddata = array(
		'rname' => $_POST["rname"],
		'wtype'=> $_POST["wtype"],
		'wquantity' => $_POST["wquantity"],
		'imagepath'=> 'image/'.$_FILES['avatar']['name']
		);
		
		if(copy($_FILES['avatar']['tmp_name'],$rewarddata['imagepath']))
		{
			$controller = new Controller;
			if($controller->insertreward($rewarddata))
			{
			//header("Location: page2.php");
			//echo "Successful";
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
		}
		else
		{
			echo "file upload failed!";
		}
}

if(isset($_POST['update'])){	
	 $updatereward = array(
		'id'=>$_SESSION['oid'],
		'rname' => $_POST["rname"],
		'wtype'=> $_POST["wtype"],
		'wquantity' => $_POST["wquantity"]
		//'imagepath'=> 'image/'.$_FILES['avatar']['name']
		);
		
		//if(copy($_FILES['avatar']['tmp_name'],$updatereward['imagepath']))
		
			$controller = new Controller;
			if($controller->updatereward($updatereward))
			{
			//header("Location: page2.php");
			//echo "Successful";
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
		
		/*else
		{
			echo "file upload failed!";
		}*/
}

if(isset($_GET['delete'])){	
	 $id = $_GET['delete'];
			$controller = new Controller;
			if($controller->deletereward($id))
			{
			//header("Location: page2.php");
			//echo "Successful";
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
}

if(isset($_GET['edit'])){	
		$id = $_GET['edit'];
		
			$controller = new Controller;
			if($controller->getreward($id))
			{
			//header("Location: page2.php");
			//echo "Successful";
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
        <a class="nav-link" href="cprofile.php"><b>My profile</b></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="assigncollector.php"><b>Assign Collector</b></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="collectorlist.php"><b>Collector List</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><b>Log Out</b></a>
      </li>   
	  </ul>
	  
	</div>	
  </div>
</nav>
<br> 
<div class=" text-center">
<button type="button" id="add_button" data-toggle="modal" data-target="#insertreward" class="btn btn-primary btn-lg"> Post New Offer </button>
</div>
<br> <br>

<div class="container" id="offers">
<div class="row">
	<?php

		$cname =  $_SESSION['name'];
		$conn = new mysqli("localhost", "root", "","wastex");
		if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 	
		$sql = " SELECT * FROM `offers` where cname= '$cname'";	
		 $result = mysqli_query($conn, $sql);	
				while($row = mysqli_fetch_assoc($result)) : ?>
					<div class="col-lg-4 col-md-4 col-xs-4 thumb">
					<span class='user'><img src = " <?php echo $row['rimage']; ?>" alt= 'pens' height='200' width='200' ></span> <br>
					<span class='user'> <?php echo $row['reward'];?> </span> <br>
					Waste Type: <span class='user'> <?php echo $row['wtype']; ?></span> <br>
					Waste Quantity: <span class='user'> <?php echo $row['wquantity'];?></span> <br> 
					<a href= "companyhome.php?edit=<?php echo $row['oid']; ?>"
					class = "btn btn-info">Edit</a>					
					<a href= "companyhome.php?delete=<?php echo $row['oid']; ?>"
					class = "btn btn-danger">Delete</a> </div>					
				 <?php endwhile; ?>
				
</div>
</div>

<script src="/wastex/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/wastex/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/wastex/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 


<div id="insertreward" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="reward_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create Offer</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label>Enter Reward Name</label>
					<input type="text" name="rname" id="rname" class="form-control" />
					<br />
					<label>Enter Waste Type</label>
					<input type="text" name="wtype" id="wtype" class="form-control" />
					<br />
					<label>Enter Waste Quantity</label>
					<input type="text" name="wquantity" id="wquantity" class="form-control" />
					<br />
					<label>Select Reward Image</label>
					<input type="file" name="avatar" id="avatar" accept="image/png, image/jpg, image/jpeg" required />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="submit" name="post" id="post" class="btn btn-success" value="post" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<br>
<div class="col d-flex justify-content-center">
<form class="w3-container w3-card-4 w3-half w3-light-gray" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <h3 style="color:green">Edit Offer</h3>
	<br>
	<label>Enter Reward Name</label>
	<input type="text" name="rname" id="rname" class="form-control" value=<?= $_SESSION['rname'] ?> >
	<br />
	<label>Enter Waste Type</label>
	<input type="text" name="wtype" id="wtype" class="form-control" value=<?= $_SESSION['wtype'] ?> >
	<br />
	<label>Enter Waste Quantity</label>
	<input type="text" name="wquantity" id="wquantity" class="form-control" value=<?= $_SESSION['wquantity'] ?> >
<br>
	<button class="w3-button w3-section w3-light-green w3-ripple" type="submit" name="update"> Update </button>
</form>
</div>

