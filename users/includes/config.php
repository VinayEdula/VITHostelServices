<?php
define('DB_SERVER','localhost:3399');  //Defining constatnts
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'vhs');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME); //function to open a new connection to the MySQL server.
// Check connection
if (mysqli_connect_errno()) //Return the last error code for the most recent function call
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>