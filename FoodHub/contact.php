<?php
$servername="localhost";
$username="root";
$password="ireshfrd26";
$conn=mysqli_connect($servername,$username,$password,"users_db");
if(!$conn)
{
  // echo "connection not estblished";

}
else
{
  // echo "connection estsblished successfully";
  $NAME=$_POST["name"];
  $EMAIL=$_POST["email"];
  $NUMBER=$_POST["number"];
  $SUBJECT=$_POST["subject"];
  $query="INSERT INTO contacts (PHONE_NUMBER,NAME,EMAIL,SUBJECT) VALUES ('$NUMBER','$NAME','$EMAIL','$SUBJECT')";
  $res=mysqli_query($conn,$query);
  if(!$res)
  {
      include "contact.html";
  }
  else
  {
      include "index.html";
  }

}
 ?>
