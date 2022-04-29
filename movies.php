<?php


// <!-- WROKING with DATABASE -->

$conn = mysqli_connect('localhost', 'root', '', 'movie_db');

// true if connected, false if not

if($conn) {
    // echo 'Connected';
    // prepare the query
    $query = 'SELECT * FROM movies';

    // execute the query
    $results = mysqli_query($conn, $query);

    // retreive results but i need to fetch before using them
    // fetch the results as an associative array
    $movies = mysqli_fetch_all($results,MYSQLI_ASSOC);



    // echo '<pre>';
    // var_dump($books);
    // echo '</pre>';

} else {
    echo 'Problem with connection';
}
// closing the connection
mysqli_close($conn); ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<header>
      <h1>MovieSuggest</h1>

      <ul>
        <li>
          <a class="active" href="# ">Home</a>
        </li>
        <li>
          <a href="# ">Movies</a>
        </li>
        <li>
          <a href="# ">Contact</a>
        </li>
      </ul>
    </header>

<?php foreach ($movies as $value) :?>
<div class="main-container">  
    <div class="element">
        <div>
            <img src="<?= $value['poster']  ?>" alt="">
        </div>

        <p>
        <a href="movie.php?id= <?= $value['id'] ?> "><strong> Title:</strong>
                <?= $value['title']; ?> </a>
        </p>

        <p>
                <strong>Views:</strong>
                <?= $value['views']; ?>
        </p>
            
    </div>
</div>
 
    <?php endforeach; ?>


<footer>
      <p>
        2022 &copy; All Rights Reserved.&nbsp;<a href="#">Privacy Policy</a>
      </p>
      <ul>
        <li>FB</li>
        <li>In</li>
        <li>Twitter</li>
      </ul>
    </footer>
</body>
</html>