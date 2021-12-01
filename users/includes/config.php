<?php
define('DB_SERVER','remotemysql.com');  //Defining constatnts
define('DB_USER','eQc0Qn9CdB');
define('DB_PASS' ,'3PAHTpU9TN');
define('DB_NAME', 'eQc0Qn9CdB');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME); //function to open a new connection to the MySQL server.
// Check connection
if (mysqli_connect_errno()) //Return the last error code for the most recent function call
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
