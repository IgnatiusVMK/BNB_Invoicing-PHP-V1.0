<?php

$servername="localhost";
$username="root";
$password="";

$dbname1="invoicing_system";

$conn1= mysqli_connect($servername,$username,$password,$dbname1);

if(!$conn1){
    echo "Connection Failed";
}
?>