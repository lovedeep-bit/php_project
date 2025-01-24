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
            position:absolute;
            bottom:0;
        }
        
        .title{
            margin-top: 2vw;
            font-size: 3.5vw;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
            color: white;
            -webkit-text-stroke: 0.25vw red;
        }
        table,td,th{
            margin-top: 2vw;
            
            padding: 1vw 1.5vw;
            font-size: 2vw;
        }
        th{
            background-color: orangered;
            color: white;
            font-size: 2.4vw;
        }
        button{
            width: 10vw;
            font-size: 1.5vw;
            margin-left: 1vw;
        }
    </style>
</head>
<body>
    <div class="top"></div>
    <p class="title">LIBRARY MANAGEMENT SYSTEM</p>
    
    <?php

    
    $server="localhost:3306";
    $user="root";
    $password="";
    $database="Library";
    
    $conn=new mysqli($server,$user,$password,$database);
    if($conn->connect_error){
        die("Connection Failed : ".$conn->connect_error);
    }
    $bname=$_POST['book'];

    $sql="select * from books where TITLE like '%$bname%';";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        echo "<center><table><tr><th>ISBN</th><th>TITLE</th><th>AUTHOR</th><th>EDITION</th><th> PUBLICATION</th></tr>";
        while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["ISBN"]."</td><td>".$row["TITLE"]."</td><td>".$row["AUTHOR"]."</td><td>".$row["EDITION"]."</td><td>".$row["PUBLICATION"]."</td></tr>";
        }
        echo "</table></center>";
    }
    else{
        echo "0 results"; 
    }
    $conn->close();
    ?>
    
    <center><a href="searchbook.html"><button>BACK</button></a></center> <br><br>
    <div class="bottom"></div>     
</body>
</html>