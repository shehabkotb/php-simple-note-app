<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once(__DIR__ . "/templates/headers.php") ?>
  <script type="text/javascript" src="js/signup-page.js"></script>
  <title>Login</title>
  <link rel="stylesheet" href="css/login-page.css">
</head>

<body>
  <div class="upper-container">
    <div class="imgcontainer">
      <img src="assets/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="input-name"><b>Name</b></label>
      <input id="input-name" type="text" placeholder="Enter Your Name">

      <label for="input-email"><b>Email</b></label>
      <input id="input-email" type="text" placeholder="Enter Email">

      <label for="input-password"><b>Password</b></label>
      <input id="input-password" type="password" placeholder="Enter Password">
      <div id="lbl-error"> </div>
      <button id="btn-signup">Sign Up</button>

      <div class="container" style="background-color:#f1f1f1; text-align: center;">
        <span>You already have an account ? <a href="login.php">Login</a></span>
      </div>
    </div>
  </div>
</body>

</html>