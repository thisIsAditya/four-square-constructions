<?php
$db_host= "localhost";
$db_user= "root";
$db_password= "";
$db_name= "constructionsolution";

//connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

//check connetion

if ($conn->connect_error) {
  die("Connection failed");
}
// else
// {
//   echo "connected";
// }
?>