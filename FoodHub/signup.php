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
		$number=$_POST["number"];
		$NAME=$_POST["name"];
		$password=$_POST["cpwd"];
	  if($_POST["pwd"]!=$_POST["cpwd"])
		{
			//  echo "password not matching enter properly";
			 include "signup.html";
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
			$query="SELECT * FROM users ";
			$res=mysqli_query($conn,$query);
			$flag=0;
			while($row=mysqli_fetch_assoc($res))
			{
				if($row['PHONE_NUMBER']==$number)
				{
					$flag=1;
				}
			}
			if($flag==1)
			{
				include "signup.html";
				?>
				<html>
				<body>
					<script>
					alert("Already exist");
					</script>
				</body>
			</html>
			<?php
			}
			else
			{
					$query="INSERT INTO users (PHONE_NUMBER,NAME,PASSWORD) VALUES ('$number','$NAME','$password')";
					$res=mysqli_query($conn,$query);
					if(!$res)
					{
						 include "signup.html";
					}
					else
					{
						 include "index1.html";
					}
			 }
		 }
	 }
?>
