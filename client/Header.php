<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="./">
      <img class="logo" src="./public/logo.png" />
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>
        <?php

        if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="./server/request.php?logout=true">Logout (<?php echo ucfirst($_SESSION['user']['username'])?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?ques=true">Ask ur Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">My Questions</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">Signup</a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="?latest=true">Latest Questions</a>
        </li>
      </ul>
    </div>
    <form class="d-flex" action="">
      <input class="form-control me-2" name="search" type="search" placeholder="Search your Questions..">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>