<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Movie</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class="container-fluid header">
        <a href="home.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span> <?php echo "You are logged in as user ".$_SESSION['username']; ?></span>
        <a href="signup.php">
            <button class="btn">Logout</button>
        </a>
    </div>

    <?php 

    $title = mysqli_real_escape_string($conn, $_GET['title']);

    $sql = "SELECT * FROM movies WHERE title='$title'";
    $result = mysqli_query($conn, $sql);
    $query_res = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){

?>
</body>
</html>
