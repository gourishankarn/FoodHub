<?php
	$servername="localhost";
	$username="root";
	$password="ireshfrd26";
	$conn=mysqli_connect($servername,$username,$password,"users_db");
	if(!$conn)
	{
		echo "connection not established";
	}
	else
	{
		$item=$_POST["item"];
		$price=$_POST["price"];
    $loc=$_POST["location"];
    $area=$_POST["area"];
    $pincode=$_POST["pincode"];
    echo "conection established";
    $query="INSERT INTO adress (LOCATION,AREA,PINCODE) VALUES ('$loc','$area','$pincode')";
    mysqli_query($conn,$query);

    // mysqli_close($conn);
		$query="INSERT INTO items (ITEMS,PRICE) VALUES ('$item','$price')";
    mysqli_query($conn,$query);
    // mysqli_close($conn);
// put the below code in bill php//
		$conn=mysqli_connect($servername,$username,$password,"users_db");
    $query="SELECT * FROM adress ";
		$res=mysqli_query($conn,$query);
		$flag=0;
		while($row=mysqli_fetch_assoc($res))
		{
			if($row['LOCATION']==$loc)
			{
				$flag=1;
			}
		}
		if($flag==1)
		{
			 include "track_try.php";
    }
  }
?>
