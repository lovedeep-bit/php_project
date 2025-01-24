<?php
$server="localhost:3306";
$user="root";
$password="";

$conn=new mysqli($server,$user,$password);
if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error); 
}
$sql="create database Library;";
if($conn->query($sql)===TRUE){
    echo "Database Successfully Created";
}
else{
    echo "Error Creating Database";
}
echo "<br>";
$sql1="use Library;";
if($conn->query($sql1)===TRUE){
    echo "Database Successfully Selected";
}
else{
    echo "Error Selecting Database";
}
echo "<br>";
$sql2="create table books(ISBN varchar(30) primary key,TITLE varchar(40),AUTHOR varchar(30),EDITION varchar(20),PUBLICATION varchar(30));";
if($conn->query($sql2)===TRUE){
    echo "Table Successfully Created";
}
else{
    echo "Error Creating Table";
}
$conn->close();
?>