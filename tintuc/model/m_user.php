<?php
include('database.php');

class M_user extends database
{
	
	function dangki($name,$email,$password)			
	{
		$sql="INSERT INTO users(name,email,password) VALUES(?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($name,$email,md5($password)));
		if ($result) 
			{
				return $this->getLastId();
			}
		else
			{
				return false;
			}
	}
	function dangnhap($email,$md5_password)
	{
		$sql="SELECT * FROM users WHERE email = '$email' and password = '$md5_password'";
		$this->setQuery($sql);
		return $this->loadrow(array($email,$md5_password));
	}
}

?>