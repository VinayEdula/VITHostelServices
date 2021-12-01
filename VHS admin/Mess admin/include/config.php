<?php

$con = mysqli_connect("localhost:3399","root","","cms");
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>