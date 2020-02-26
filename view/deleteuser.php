<?php

$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=wastex', $username, $password );

if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM user WHERE uid = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>