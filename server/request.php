<?php
session_start();
include("../data/db.php");
if (isset($_GET['q-id'])) {
    if (!isset($_SESSION['user_id'])) {
        // If the user is not logged in, redirect to the login page
        header("Location: login.php");
        exit();  // Ensure that no further code is executed after the redirect
    }

    // If the user is logged in, fetch and display the question
    $question_id = $_GET['q-id'];
    $query = "SELECT * FROM questions WHERE id = $question_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Question found, display it
        $question = $result->fetch_assoc();
        echo "<h1>" . $question['title'] . "</h1>";
        echo "<p>" . $question['description'] . "</p>";
    } else {
        echo "Question not found.";
    }
}else if (isset($_POST['signup'])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $address=$_POST["address"];
    
    $data=$conn->prepare("insert into `users`
    (`id`,`username`,`email`,`password`,`address`)
    values(NULL,'$username','$email','$password','$address');
    ");

     $result= $data->execute();
     $data->insert_id;

         if($result){
             $_SESSION["user"]=["username"=>$username,"email"=>"$email","user_id"=> $data->insert_id];
             header("location: /Discuss");
        }
        else{
              echo"New user not added";

        }

}
elseif (isset($_POST['login'])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $username="";
    $user_id="0";
    $query="select * from users where email='$email' and password='$password'";
    $result= $conn->query($query);
    if($result->num_rows==1){

        foreach($result as $row){

            $username=$row['username'];
            $user_id=$row['id'];
        }
             $_SESSION["user"]=["username"=>$username,"email"=>"$email","user_id"=>$user_id];
             header("location: /Discuss");
        }
        else{
              echo"New user not added";

        }
    }
    elseif (isset($_GET['logout'])){
        session_unset();
        header("location: /Discuss");
    }
    elseif(isset($_POST["ques"])){
        

        $title=$_POST["title"];
        $description=$_POST["description"];
        $category_id=$_POST["category"];
        $user_id=$_SESSION['user']["user_id"];
        
        $question=$conn->prepare("insert into `questions`
        (`id`,`title`,`description`,`category_id`,`user_id`)
        values(NULL,'$title','$description','$category_id','$user_id');
        ");
    
         $result= $question->execute();
         $question->insert_id;
    
             if($result){
                 
                 header("location: /Discuss");
            }
            else{
                  echo"Your qustion is not submitted";
    
            }
        
    }elseif (isset($_POST["answer"])){
        $answer=$_POST["answer"];
        $question_id=$_POST["question_id"];

        if (isset($_SESSION['user']) && isset($_SESSION['user']["user_id"])) {
            $user_id = $_SESSION['user']["user_id"];
        } else {
            echo "Error: User is not logged in or user_id is missing.";
            exit();  
        }
        // $user_id=$_SESSION['user']["user_id"];
        
        $query=$conn->prepare("insert into `answers`
        (`id`,`answer`,`question_id`,`user_id`)
        values(NULL,'$answer','$question_id','$user_id');
        ");
    
         $result= $query->execute();
    
             if($result){
                 
                 header("location: /Discuss?q-id=$question_id");
                 exit();
            }
            else{
                  echo"Your answer is not submitted";
    
            }

    }else if(isset($_GET["delete"])){
      echo $qid=$_GET["delete"];
       $query=$conn->prepare("delete from questions where id=$qid");
       $result= $query->execute();
       if($result){
        header("location: /Discuss");
       }
       else{
        echo"Question is not deleted";
       }
    }
    elseif (isset($_GET['q-id'])) {
        $question_id = $_GET['q-id'];
    
        // Your code to fetch the question details from the database
        // Example: Fetch question based on $question_id
        $query = "SELECT * FROM questions WHERE id = $question_id";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {
            // Display the question details
            $question = $result->fetch_assoc();
            echo "<h1>" . $question['title'] . "</h1>";
            echo "<p>" . $question['description'] . "</p>";
        } else {
            echo "Question not found.";
        }
    }
    

?>