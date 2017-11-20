<html>
<head>
  <title>order</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/cmn3.css">
<style>
  #div5
  {
  
    color:black;
    margin-left:220px;
  }
#table
{
  background-color: lightgrey;
  border:2px solid yellow;
  color:black;
}
</style>
</head>
<body style="background-color:grey;">
<ul>
    <div>
    <li><a href ="food_menu.html">Food Menu</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="about.html">About</a></li>
    <li style="float:right;"><a href="logout.php">Logout</a></li>
    <li><a href="faq.html">Faq's</a></li>
    <li><a href="track.html">Track</a></li>
    <a href="index1.html"><li style="padding-left:30px;padding-right:50px;font-size:50px;"><strong><span style="color:cyan;">Food</span><span style="color:#ff6600;">Hub</span></strong></li></a>
    </div>

    <div style="padding-left:100px;">
    <li><a href="https://www.facebook.com/Askbook-699887716878821/"><img src="images/facebook.png" title="facebook" /></a></li>
    <li><a href="https://www.twitter.com"><img src="images/twitter.png" title="twitter" /></a></li>
    <li ><a href="https://plus.google.com/100118310135288745298"><img src="images/google.png" title="google pluse" /></a></li>
    </div>
  </ul>

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
    $dist=$_POST["distance"];
    $del=$dist * 2;
  }
?>
<div id="div5">
  <h1 style="color:black">Your order is placed<h1>
  <table id="table" border="2">
    <tr>

  <th><h2>Name of the Item</h2></th>
  <th><h2>Base price of the Item</h2></th>
  <th><h2>Delivary Charge</h2></th>
  <th><h2>Total Bill</h2></th>
</tr>
<tr>
  <?php
  $query="SELECT * FROM items ORDER BY ID DESC";
  $res=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($res);
  ?>
  <td><h2><?php echo $row['ITEMS']; ?></h2></td>
  <td><h2><?php echo $row['PRICE'];?>  $</h2></td>
  <td><h2><?php echo $del;?>  $</h2></td>
  <td><h2><?php echo ($row['PRICE'] + $del)?>  $</h2></td>
</tr>
</table>
</div>
</body>
</html>
