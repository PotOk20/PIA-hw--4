<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <link href="homestyle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <div class="nav_bar">
      <a href = "home.php">
        <img class="logo"src="images/imdb.png">
      </a>
      <div class="genres">
        <form action="home.php" method="get">
          <label class="Gname">Genres: </label>
            <select class="genres_list">
              <option>Action</option>
              <option>Adventure</option>
              <option>Comedy</option>
              <option>Thriler</option>
              <option>Fantasy</option>
              <option>Romance</option>
            </select>
             <button type="submit" class="btn" name="get_genre">Search</button>
          </form>
        <form action>  
        <div class="search_box">
          <input type="text" placeholder="Search movie.." name="search-box"> </input>
        </div>   
          <button class="btn1" type="submit" name="search_submit"><i class="fa fa-search"></button>
        </form> 
    </div> 
        <?php
        if(isset($_GET['search-box'])){
            $search = mysqli_real_escape_string($conn, $_GET['search-box']);
            $movie_qry = "SELECT * FROM film WHERE title LIKE '%$search%'";
        } 
        $movie_res=mysqli_query($conn, $movie_qry);
        $queryRes = mysqli_num_rows($movie_res);

        ?>
    
  </body>
</html>