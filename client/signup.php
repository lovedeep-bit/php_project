<div class="container">
<h1 class="heading">sign up</h1>

<form method="post" action="./server/request.php" >
  <div class="col-6 offset-sm-3 margin-bottom">
    <label for="username" class="form-label">username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" >
  </div>
  <div class="col-6 offset-sm-3 margin-bottom">
    <label for="email" class="form-label"> User email</label>
    <input type="email"  name="email" class="form-control" id="email" placeholder="Enter your email" >
  </div>
  <div class="col-6 offset-sm-3 margin-bottom">
    <label for="password" class="form-label"> User password</label>
    <input type="password"  name="password" class="form-control" id="password" placeholder="Enter your password" >
  </div>
  <div class="col-6 offset-sm-3 margin-bottom">
    <label for="address" class="form-label"> User address</label>
    <input type="text"  name="address" class="form-control" id="email" placeholder="Enter your address" >
  </div>
<div class="col-6 offset-sm-3 margin-bottom">
<button type="submit"  name="signup" class="btn btn-primary">Signup</button>

</div>

</form>
</div>