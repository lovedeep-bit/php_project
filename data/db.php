<?php
$server="localhost";
$username="root";
$password="";
$database="dicsuss";

$conn=new mysqli($server,$username,$password,$database);

if($conn->connect_error){
    die("not connected with db".$conn->connect_error);
}

?>