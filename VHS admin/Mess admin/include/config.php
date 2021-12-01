<?php

// $con = mysqli_connect("localhost:3399","root","","cms");
$con = mysqli_connect("remotemysql.com","eQc0Qn9CdB","3PAHTpU9TN","eQc0Qn9CdB");  //Remote database connection
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
