<div class="container">
    
    <div class="row">
        <div class="col-8">
        <h1 class="heading">QUESTIONS</h1>
            <?php
            include("./data/db.php");
            if(isset($_GET["c-id"])){
                $query = "SELECT * FROM questions where category_id=$cid";
            }
            elseif(isset($_GET["u-id"])){
                $query = "SELECT * FROM questions where user_id=$uid";
            }
            elseif(isset($_GET["latest"])){
                $query = "SELECT * FROM questions order by id desc";
            }
            elseif(isset($_GET["search"])){
                $query = "SELECT * FROM questions where `title` LIKE '%$search%'";
            }
            else{
                $query = "SELECT * FROM questions";
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['title'];
                    $id = $row['id'];
                    echo "<div class='question-style'>
            <h4 class='delete'><a href='?q-id=$id'>$name</a>";
            echo isset($uid) ? " <a href='./server/request.php?delete=$id'>Delete</a>" : "";
            echo "</h4></div>";
                }
            } else {
                echo "<div  class='question-style'>No questions found.</div>";
            }
            ?>
        </div>
        <div class="col-4">
            <?php
            include('./client/categorieslist.php');

            ?>
        </div>
    </div>
</div>