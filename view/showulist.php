<?php
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=wastex', $username, $password );
//$cname = $_SESSION['name'];
function get_total_all_records()
{
	$username = 'root';
	$password = '';
	$connection = new PDO( 'mysql:host=localhost;dbname=wastex', $username, $password );
	$statement = $connection->prepare("SELECT * FROM user");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
$query = '';
$output = array();
$query .= "SELECT * FROM user ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE uname LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= "";
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["uname"];
	$sub_array[] = $row["email"];
	$sub_array[] = $row["ucontact"];
	$sub_array[] = $row["uaddress"];
	$sub_array[] = $row["ugender"];
	$sub_array[] = $row["dob"];
	//$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["uid"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>