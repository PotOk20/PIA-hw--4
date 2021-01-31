<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Fucker</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
<?php 
include_once "config.php";

$db = mysqli_connect('localhost', 'root', '', 'films');

if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['user_name']);
  $email = mysqli_real_escape_string($db, $_POST['user_mail']);
  $password_1 = mysqli_real_escape_string($db, $_POST['user_password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['user_password1']);


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
  }
}
?>
  <body>
    <img class="imdbpic" src="images/imdb.png">
    <div class="login-box">
      <h1>Create Account</h1>
        <form action = "registration.php" method="POST">
        Your name
        <div class="textholder">
          <input class="user-inf" type="text" name="user_name" required><br>
        </div>
        Email
        <div class="textholder">
          <input class="user-inf" type="email" name="user_mail" required><br>
        </div>
        Password
        <div class="textholder">
          <input class="user-inf" type="password" placeholder="at least 8 characters" name="user_password" required><br><br>
        </div>
         Re-enter password
        <div class="textholder">
          <input class="user-inf" type="password" name="user_password1" required><br><br>
        </div>
        <input type="submit" value="Create Your IMDb account"  name="reg_user" class="btn">
      </form>
      <div class="center"><hr>Already have an account?<a class="footer-links" href="singup.php"><b>Sign-In</b></div>
    </div> 
    <footer><hr>
      <a class="footer-links" href="https://help.imdb.com/article/imdb/general-information/why-should-i-register-on-imdb/GHB62T7USTMYMCDC?ref_=cons_ap_ftr_help#"> Help </a>
       <a class="footer-links" href="https://www.imdb.com/conditions"> Condition of use </a>
       <a class="footer-links" href="https://www.imdb.com/privacy"> Privacy Notice </a><br>
       <p>© 1996-2020, Amazon.com, Inc. or its affiliates</p>
  </body>
</html>