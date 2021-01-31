<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Movie</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
<?php   
  $message = '';
  include('config.php');
  session_start();

  
      
  if(isset($_POST['sign_user'])){
      $login = $_POST['user'];
      $pass = $_POST['password'];
      $qry = "SELECT username, email, password, role FROM users";
      $res = mysqli_query($conn, $qry);

      while($row=mysqli_fetch_array($res)){
          $username = $row['username'];
          $email = $row['email'];
          $password = $row['password'];
          $role = $row['role'];
          if($login == $row['username'] or $login == $row['email']){
              if($pass == $row['password']){
                header("location:home.php");
                $_SESSION['username'] = $row['username'];
              }
          }else{
              $message = "<br>Wrong user informations or password";
          }
      }
  }


?>
  <body>
    <img class="imdbpic" src="images/imdb.png">
    <div class="login-box">
      <h1>Sign-In</h1>
          <form action = "signup.php" method="POST">
          Email
          <div class="textholder">
            <input class="user-inf" type="email" name="user_mail" required><br>
          </div>
          Password
          <div class="textholder">
            <input class="user-inf" type="password" name="user_password" required><br><br>
          </div>
          <input type="submit" value="Sign-In" name ="sign_user"class="btn">
        </form><br><br>
      <div class="strike"><span>New to IMDb?</span></div><br>
      <button onclick="window.location.href='registration.php'" class="btn1"> Create your IMDb account </button>
    </div>
    <hr>
    <footer>
      <a class="footer-links" href="https://help.imdb.com/article/imdb/general-information/why-should-i-register-on-imdb/GHB62T7USTMYMCDC?ref_=cons_ap_ftr_help#"> Help </a>
       <a class="footer-links" href="https://www.imdb.com/conditions"> Condition of use </a>
       <a class="footer-links" href="https://www.imdb.com/privacy"> Privacy Notice </a><br>
       <p>© 1996-2020, Amazon.com, Inc. or its affiliates</p>
  </body>
</html>
