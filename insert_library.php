<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
        }
        .top,.bottom{
            width: 100%;
            height: 2vw;
            background-color: black;
        }
        .bottom{
            position: absolute;
            bottom: 0;
        }
        .title{
            margin-top: 2vw;
            font-size: 3.5vw;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
            color: white;
            -webkit-text-stroke: 0.25vw red;
        }
        p{
            text-align:center;
            font-size:2vw;
            color:orangered;
            margin-top:3vw;
        }
        button{
            width:15vw;
            height: 2vw;
            font-size: 1.5vw;
        }
        
    </style>
<body>
<div class="top"></div>
    <p class="title">LIBRARY MANAGEMENT SYSTEM</p>
    <?php
    $server="localhost:3306";
    $user="root";
    $password="";
    $database="Library";

    $conn= new mysqli($server,$user,$password,$database);
    if($conn->connect_error){
        die("Connection Failed : ".$conn_connect_error);
    }
 
    $isbn=$_POST['isbn'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $edition=$_POST['edition'];
    $publication=$_POST['publication'];

    $sql="insert into books values('$isbn','$title','$author','$edition','$publication');";
    if($conn->query($sql)===TRUE){
        echo "<p>DATA INSERTED SUCCESSFULLY</p>";
    }
    else{
        echo "<p>ERROR INSERTING DATA</p>";
    }
    $conn->close();
    ?>
    <br><br>
    <center><a href="library.html"><button>BACK TO FORM</button></a></center>
    <div class="bottom"></div>
</body>
</html>


 