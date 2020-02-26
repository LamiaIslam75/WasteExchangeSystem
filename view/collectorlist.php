<html>
	<head>
		<title>Waste Exchange System</title>
		<script src="/wastex/jquery.min.js"></script>
		<link rel="stylesheet" href="\wastex\table\bootstrap.min.css" />
		<script src="\wastex\table\jquery.dataTables.min.js"></script>
		<script src="\wastex\table\dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="\wastex\table\dataTables.bootstrap.min.css" />
		<script src="\wastex\table\bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
	<?php
	session_start();
	include_once('../controller/company.php');
	
	if(isset($_GET['delete'])){	
	 $id = $_GET['delete'];
			$controller = new Controller;
			if($controller->deletecol($id))
			{
				echo '<script>alert("Deleted Successfully.")</script>';
			}
			else
			{
            echo '<h4 style="color:Red;">Something went wrong.</h4>' ;/*. $sql . "<br>" . $conn->error;*/			
			}
	}?>
		<div class="container box">
		<a class="btn btn-outline-dark" href="companyhome.php" role="button">Back</a>
			<h1 align="center">List of Collectors</h1>
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
							<th width="8%">Dob</th>
							<th width="8%">gender</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				
				<?php
				
		$cname =  $_SESSION['name'];
		$conn = new mysqli("localhost", "root", "","wastex");
		if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
		$sql = " SELECT * FROM collector where cname= '$cname'";
	
		 $result = mysqli_query($conn, $sql);
		 //$count = mysqli_num_rows($result);
		
				while($row = mysqli_fetch_assoc($result)) : ?>
				
				
					<!--<div class="col-lg-4 col-md-4 col-xs-4 thumb">-->
					<tr>
					<td><span class='user'> <?php echo $row['name'];?> </span> <br></td>
					<td><span class='user'> <?php echo $row['email']; ?></span> <br></td>
					<td><span class='user'> <?php echo $row['contact'];?></span> <br></td> 
					<td><span class='user'> <?php echo $row['address'];?></span> <br> </td>
					<td><span class='user'> <?php echo $row['dob'];?></span> <br> </td>
					<td><span class='user'> <?php echo $row['gender'];?></span> <br> </td>
					<td>
					<a href= "collectorlist.php?delete=<?php echo $row['colid']; ?>"
					class = "btn btn-danger">Delete</a> </div>
					</td>
					</tr>
					
				 <?php endwhile; ?>

				</table>
				
			</div>
	</body>
</html>


<!--<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"showcollectorlist.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	/*$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var firstName = $('#first_name').val();
		var lastName = $('#last_name').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(firstName != '' && lastName != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});*/
	
	/*$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#first_name').val(data.first_name);
				$('#last_name').val(data.last_name);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});*/
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deletecollector.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
});
</script>-->