<div class="container">
    <h1 class="heading">QUESTIONS</h1>
    <div class="row">
        <div class="col-8">
            <?php
            include("./data/db.php");
            $query = "SELECT * FROM questions where id=$qid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cid = $row['category_id'];

            echo "<h4 class='margin-bottom question-title'> Question : " . $row['title'] . "</h4>
            <p class='margin-bottom'>" . $row['description'] . "</p>";
            include("submitanswer.php");
            ?>
            <form action="/Discuss/server/request.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                <textarea name="answer" class="form-control margin-bottom" id="answerfield" placeholder="Type your answer..."></textarea>
                <button id="submitBtn" class="btn btn-primary" type="submit" disabled>Submit</button>
            </form>
        </div>
        <div class="col-4">
            <?php
            $categoryQuery = "SELECT name FROM category where id=$cid";
            $categoryResult = $conn->query($categoryQuery);
            $categoryRow = $categoryResult->fetch_assoc();
            echo "<h1>" . ucfirst($categoryRow['name']) . "</h1>";
            $query = "SELECT * FROM questions where category_id=$cid and id!=$qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row['id'];
                $title = $row['title'];
                echo "<div class='question-style'>
                 <h4><a href=?q-id=$id>$title</a></h4>
                 </div>";
            }
            ?>
        </div>
    </div>
</div>

<script>
  // Get the textarea element and the submit button
  const answerField = document.getElementById('answerfield');
  const submitBtn = document.getElementById('submitBtn');

  // Add an event listener to enable the submit button when the textarea has content
  answerField.addEventListener('input', function() {
    if (answerField.value.trim() !== "") {
      submitBtn.disabled = false;  // Enable the submit button if there is content in the answer
    } else {
      submitBtn.disabled = true;   // Keep the submit button disabled if the answer is empty
    }
  });
</script>
