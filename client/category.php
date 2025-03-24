<select  class="form-control" name="category" id="category">
        <option value="">Select your Category</option>
       <?php
       include("./data/db.php");
       $query="select * from category";
      
       $result=$conn->query($query);

       foreach($result as $row){
           $name= ucfirst($row['name']);
           $id=$row['id'];
           echo "<option value=$id>$name</option>";
       }
       ?>
    </select>