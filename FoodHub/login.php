<?php
	$servername="localhost";
	$username="root";
	$password="ireshfrd26";
	$conn=mysqli_connect($servername,$username,$password,"users_db");
	if(!$conn)
	{
		// echo "connection not established";
	}
	else
	{
		// echo "connection estsblished successfully";
		$NUMBER=$_POST["number"];
		$PASSWORD=$_POST["pwd"];

		$query="SELECT * FROM users ";
		$res=mysqli_query($conn,$query);
		$flag=0;
		while($row=mysqli_fetch_assoc($res))
		{
			if($row['PHONE_NUMBER']==$NUMBER and $row['PASSWORD']==$PASSWORD)
			{
				$flag=1;
			}
		}
		if($flag==1)
		{
			//echo "<br>";

			//echo "successfully loged in";
			include "index1.html";
			?>
			<html>
			<body>
				<script>
				alert("successfully Logged In");
				</script>
			</body>
		</html>
		<?php
		}
		else
		{
			//echo "Enter valid credentials";
			?>
			<html>
			<body>
				<script>
				alert("Enter valid credentials");
				</script>
			</body>
		</html>
		<?php
			include "login.html";
		}
	}
?>
