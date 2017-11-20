<html>
<body>

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
		include "index.html";
		?>
		<script>
		alert("Successfully Logged Out");
		</script>
		<?php

  }
?>
</body>
</html>
