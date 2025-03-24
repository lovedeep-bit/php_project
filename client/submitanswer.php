<div class="container">
    <h5>Answers:</h5>
    <?php
    $query = "SELECT * FROM answers where question_id=$qid";
    $result=$conn->query($query);
    foreach($result as $row){
        $answer=$row['answer'];
        echo "<div class='row'>
        <p class='answer'>$answer</p>
        </div>";
    }
    ?>
</div>