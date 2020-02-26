<?php

 Class cmodel{
public $conn;
 
   public function submit_data($comdata)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "INSERT INTO `company`(`cname`, `email`, `contact`, `address`, `pass`) VALUES
			('".$comdata['name']."','".$comdata['email']."','".$comdata['contact']."','".$comdata['address']."',
			'".$comdata['pass']."')";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
  
  public function getreward($id)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "SELECT * FROM `offers` WHERE oid = $id ";
	
	 $result = mysqli_query($conn, $sql);
	 $count = mysqli_num_rows($result);
	 if($count == 1)
	 {
			while($row = mysqli_fetch_assoc($result)) {
				$_SESSION['rname'] = $row["reward"];
				$_SESSION['image'] = $row["rimage"];
				$_SESSION['wtype'] = $row["wtype"];
				$_SESSION['wquantity'] = $row["wquantity"];
				$_SESSION['cname'] = $row["cname"];
				$_SESSION['oid'] = $row["oid"];				
			}
	 }
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
   public function deletereward($id)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "DELETE FROM `offers` WHERE oid = $id";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
  public function deletecol($id)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "DELETE FROM `collector` WHERE colid = $id";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
  public function update_data($updatedata)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "UPDATE `company` SET 
	`cname`='".$updatedata['name']."',`email`='".$updatedata['email']."',`contact`='".$updatedata['contact']."', `address`='".$updatedata['address']."',
	`pass`='".$updatedata['newpass']."'  WHERE cid = ".$updatedata['id']." ";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
 
  public function insertreward($rewarddata)
  {
	$cname =  $_SESSION['name'];
	$cid =  $_SESSION['id'];
	$conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "INSERT INTO `offers`(`reward`, `rimage`, `wtype`, `wquantity`, `cname`,cid) VALUES
			('".$rewarddata['rname']."','".$rewarddata['imagepath']."','".$rewarddata['wtype']."','".$rewarddata['wquantity']."',
			'$cname', $cid )";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);

  }
  
  public function updatereward($updatereward)
  {
	$conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "UPDATE `offers` SET 
	`reward`='".$updatereward['rname']."',`wtype`='".$updatereward['wtype']."',
	`wquantity`='".$updatereward['wquantity']."' WHERE oid = ".$updatereward['id']." ";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);

  }
   public function showreward()
  {
	$cname =  $_SESSION['name'];
	$conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = " SELECT * FROM `offers` where cname= '$cname'";
	
	 $result = mysqli_query($conn, $sql);
	 //$count = mysqli_num_rows($result);
	
			while($row = mysqli_fetch_assoc($result)) {
				$_SESSION['rname'] =$row["reward"];
				$_SESSION['path']= $row["rimage"];
				$_SESSION['wtype'] = $row["wtype"];
				$_SESSION['wquantity'] = $row["wquantity"];
				$_SESSION['company'] = $row["cname"];
				$_SESSION['oid'] = $row["oid"];
				
			}
	
	
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
   public function updatehistory($updaterecord)
  {
	$conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "UPDATE `history` SET `name`= '".$updaterecord['colname']."'  WHERE hid = ".$updaterecord['hid']." ";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);

  }
  
   public function getrecord($hid)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "SELECT * FROM `history` WHERE hid = $hid ";
	
	 $result = mysqli_query($conn, $sql);
	 $count = mysqli_num_rows($result);
	 if($count == 1)
	 {
			while($row = mysqli_fetch_assoc($result)) {
				$_SESSION['hid'] = $row["hid"];
				$_SESSION['rname'] = $row["rname"];
				$_SESSION['wtype'] = $row["wtype"];
				$_SESSION['wquantity'] = $row["wquantity"];
				$_SESSION['cname'] = $row["cname"];
				$_SESSION['uid'] = $row["uid"];				
			}
	 }
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
 }
 
 
 ?>