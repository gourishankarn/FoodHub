<?php
	$servername="localhost";
	$username="root";
	$password="ireshfrd26";
	$conn=mysqli_connect($servername,$username,$password);
	if(!$conn)
	{
		echo "connection not established";
	}
	else
	{
		echo "connection estsblished successfully";
		echo "<br>";
		$query="CREATE DATABASE users_db";
		mysqli_query($conn,$query);
		mysqli_close($conn);
		$conn=mysqli_connect($servername,$username,$password,"users_db");
		if(!$conn)
		{
			echo "connection not established";
		}
		else
		{
			echo "connection estsblished successfully";
			$query="CREATE TABLE users (ID INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,PHONE_NUMBER VARCHAR(10) NOT NULL,NAME VARCHAR(30) NOT NULL,PASSWORD VARCHAR(12) NOT NULL)";
			mysqli_query($conn,$query);
			mysqli_close($conn);
			$conn=mysqli_connect($servername,$username,$password,"users_db");
			if(!$conn)
			{
				echo "connection not established";
			}
			else
			{
			echo "connection estsblished successfully";
			$query="CREATE TABLE contacts (ID INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,PHONE_NUMBER VARCHAR(10) NOT NULL,NAME VARCHAR(30) NOT NULL,EMAIL VARCHAR(30) NOT NULL,SUBJECT VARCHAR(100) NOT NULL)";
			mysqli_query($conn,$query);
			mysqli_close($conn);
			$conn=mysqli_connect($servername,$username,$password,"users_db");
			if(!$conn)
			{
				echo "connection not established";
			}
			else
			{
			echo "connection estsblished successfully";
			$query="CREATE TABLE adress (ID INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,LOCATION VARCHAR(20) NOT NULL,AREA VARCHAR(20) NOT NULL,PINCODE VARCHAR(10) NOT NULL)";
			mysqli_query($conn,$query);
			mysqli_close($conn);
			$conn=mysqli_connect($servername,$username,$password,"users_db");
			if(!$conn)
			{
				echo "connection not established";
			}
			else
			{
			echo "connection estsblished successfully";
			$query="CREATE TABLE items (ID INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,ITEMS VARCHAR(20) NOT NULL,PRICE INT(3) NOT NULL)";
			mysqli_query($conn,$query);
		}
		}
	}
}
}
?>
