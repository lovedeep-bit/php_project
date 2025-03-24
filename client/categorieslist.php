<div>
    <h1 class="heading">CATEGORIES</h1>
    <?php
    include("./data/db.php");
    $query = "SELECT * FROM category";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $id = $row['id'];
            echo "<div class='question-style'>
    <h4><a href='?c-id=$id'>$name</a></h4>
    </div>";
        }
    } else {
        echo "<div  class='question-style'>No categories found.</div>";
    }

    ?>
</div>