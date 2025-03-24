<div class="container">
  <h1 class="heading">Ask ur Questions</h1>

  <form action="./server/request.php" method="post">
    <div class="col-6 offset-sm-3 margin-bottom">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter your Question">
    </div>
    <div class="col-6 offset-sm-3 margin-bottom">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control" id="description" placeholder="Enter your Question"></textarea>
    </div>
    <div class="col-6 offset-sm-3 margin-bottom">
      <label for="category" class="form-label">Category</label>
      <?php include("category.php"); ?>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom">
      <button type="submit" name="ques" class="btn btn-primary" id="submitBtn" disabled>Submit</button>
    </div>
  </form>
</div>

<script>
  // Get the category select element and the submit button
  const categorySelect = document.querySelector('[name="category"]');
  const submitBtn = document.getElementById('submitBtn');

  // Add an event listener to enable the submit button when a category is selected
  categorySelect.addEventListener('change', function() {
    if (categorySelect.value) {
      submitBtn.disabled = false;  // Enable the submit button if a category is selected
    } else {
      submitBtn.disabled = true;   // Keep the submit button disabled if no category is selected
    }
  });
</script>
