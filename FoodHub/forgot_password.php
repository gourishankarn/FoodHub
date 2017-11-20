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
		$CPASSWORD=$_POST["cpwd"];
		if($PASSWORD!=$CPASSWORD)
		{
				// echo "entered passwords not matching";
				include "forgot_password.html";
				?>
				<html>
				<body>
					<script>
					alert("entered passwords not matching");
					</script>
				</body>
			</html>
			<?php

		}
		else
		{
		$query="UPDATE users SET PASSWORD='$PASSWORD' WHERE PHONE_NUMBER='$NUMBER'";
		$res=mysqli_query($conn,$query);

		if(!$res)
		{
			// echo "TRY NEXT TIME";
		}
		else
		{
				// echo "password successfully updated";
				include "login.html";
				?>
				<html>
				<body>
					<script>
					alert("password successfully updated");
					</script>
				</body>
			</html>
			<?php

		}

	}
}
?>
