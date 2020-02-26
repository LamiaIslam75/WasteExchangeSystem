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
		<div class="container box">
		<a class="btn btn-outline-dark" href="adminhome.php" role="button">Back</a>
			<h1 align="center">List of Companies</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Name</th>
							<th width="35%">Email</th>
							<th width="35%">Contact No.</th>
							<th width="40%">Address</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"showcompanylist.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"deletecompany.php",
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
</script>