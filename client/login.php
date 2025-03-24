<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./public/login.css">
</head>
<body>
<div class="container">
<h1 class="heading">Login</h1>

<form action="./server/request.php" method="post" class="form1">
  <div class="col-6 offset-sm-3 margin-bottom ">
    <label for="email" class="form-label"> User email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" >
  </div>
  <div class="col-6 offset-sm-3 margin-bottom">
    <label for="password" class="form-label"> User password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" >
  </div>
  
    <div class="col-6 offset-sm-3 margin-bottom">
      <button type="submit" name="login" class="btn btn-primary">Login</button>

    </div>

</form>
</div>
</body>
</html>