<?php
 Class umodel{
public $conn;
 
   public function submit_data($userdata)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "INSERT INTO `user`(`uname`, `email`, `ucontact`, `upass`, `ugender`, `uaddress`, `dob`) VALUES 
			('".$userdata['uname']."','".$userdata['uemail']."','".$userdata['ucontact']."','".$userdata['userpass']."',
			'".$userdata['ugender']."','".$userdata['address']."','".$userdata['dob']."')";
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
	
	$sql = "UPDATE `user` SET 
	`uname`='".$updatedata['name']."',`email`='".$updatedata['email']."',`ucontact`='".$updatedata['contact']."',
	`upass`='".$updatedata['newpass']."',`ugender`='".$updatedata['gender']."',`uaddress`='".$updatedata['address']."',`dob`='".$updatedata['dob']."' 
	 WHERE uid = ".$updatedata['id']." ";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
  
  public function check_data($logindata)
  {
	  $role = $logindata['loginrole']; 
	  $conn = new mysqli("localhost", "root", "","wastex");
	  if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());}
		
		$password = mysqli_real_escape_string($conn, $logindata['loginpass']);
		$password= md5($password);
		
	  $sql= "select * from ".$role." where email='".$logindata['loginemail']."'";
	  	 
	 $result = mysqli_query($conn, $sql);
	 $count = mysqli_num_rows($result);
	 if($count == 1 && $role== "user")
	 {
			while($row = mysqli_fetch_assoc($result)) {
				$name =$row["uname"];
				$email = $row["email"];
				$contact = $row["ucontact"];
				$gender = $row["ugender"];
				$address = $row["uaddress"];
				$dob= $row["dob"];
				$pass = $row["upass"];
				$id= $row["uid"];
			}

		 if($logindata['loginemail']==$email && $password ==$pass)
		 {
			$_SESSION['role'] = "user"; 
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $name;
			$_SESSION['contact'] = $contact;
			$_SESSION['gender'] = $gender;
			$_SESSION['address'] = $address;
			$_SESSION['dob'] = $dob;
			$_SESSION['pass'] = $pass;
			return true;
		 }
	 }
	 if($count == 1 && $role== "company")
	 {
			while($row = mysqli_fetch_assoc($result)) {
				$name =$row["cname"];
				$email = $row["email"];
				$contact = $row["contact"];
				$address = $row["address"];
				$pass = $row["pass"];
				$id= $row["cid"];
			}

		 if($logindata['loginemail']==$email && $password == $pass)
		 {
			$_SESSION['role'] = "company"; 
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
			$_SESSION['name'] = $name;
			$_SESSION['contact'] = $contact;
			$_SESSION['address'] = $address;
			return true;
		 }
	 }
	 if($count == 1 && $role== "collector")
	 {
			while($row = mysqli_fetch_assoc($result)) {
				$cname =$row["cname"];
				$name =$row["name"];
				$email = $row["email"];
				$contact = $row["contact"];
				$pass = $row["pass"];
				$address = $row["address"];
				$dob = $row["dob"];
				$gender = $row["gender"];
				$id= $row["colid"];
				$image= $row["image"];
			}

		 if($logindata['loginemail']==$email && $password ==$pass)
		 {
			$_SESSION['role'] = "collector";
			$_SESSION['id'] = $id;
			$_SESSION['pass'] = $pass;			
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $name;
			$_SESSION['contact'] = $contact;
			$_SESSION['cname'] = $cname;
			$_SESSION['gender'] = $gender;
			$_SESSION['address'] = $address;
			$_SESSION['dob'] = $dob;
			$_SESSION['image'] = $image;
			return true;
		 }
	 }
	 if($count == 1 && $role== "admin")
	 {
			while($row = mysqli_fetch_assoc($result)) {
				$name =$row["name"];
				$email = $row["email"];
				$contact = $row["contact"];
				$pass = $row["pass"];
				$id= $row["id"];
			}

		 if($logindata['loginemail']==$email &&  $logindata['loginpass'] == $pass)
		 {
			$_SESSION['role'] = "admin"; 
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $name;
			$_SESSION['contact'] = $contact;
			$_SESSION['pass'] = $pass;
			return true;
		 }
	 }
	 
	 else
		 return false;
	$conn->close();
}
 public function insertrecord($data)
  {
	$conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "INSERT INTO `history`(`rname`, `wtype`, `wquantity`, `cname`, `uid`) VALUES
			('".$data['rname']."','".$data['wtype']."','".$data['wquantity']."','".$data['cname']."',
			".$data['uid'].")";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);

  }
	 
	
 }
  
?>