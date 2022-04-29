<?php



$conn = mysqli_connect('localhost', 'root', '', 'movie_db');
$id = $_GET['id'];



if($conn) {
    
    
    $query = "SELECT poster, title, views, directors.name FROM movies INNER JOIN directors ON directors.id = movies.director_id WHERE movies.id=$id";

   
    $results = mysqli_query($conn, $query);

  
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
<div class="box1">
<header class="header">
        <div class="title">
          <h1>MovieSuggest</h1>
        </div>
        <div class="navbar">
          <ul>
            <li class="active">Home</li>
            <li>Movies</li>
            <li>Contact</li>
          </ul>
        </div>

      </header>
</div>


<?php foreach ($movies as $value) :?>
<div class="main-container">  
    <div class="element">
        <div>
            <img src="<?= $value['poster']  ?>" alt="">
        </div>

        <p>
                <strong>Title :</strong>
                <?= $value['title']; ?>
        </p>

        <p>
                <strong>Views :</strong>
                <?= $value['views']; ?>
        </p>
        <p>
                <strong>Director :</strong>
                <?= $value['name']; ?>
        </p>
            
    </div>
</div>
 
    <?php endforeach; ?>

    <div class="box3">
<footer>

        <p class="firstp">
          2022 © All Rights Reserved
        </p>


        <p class="secondp">
          Privacy Policy</p>

        <img class="fb" src="assets/images/fb.png" alt="">
        <img class="tw" src="assets/images/tw.png" alt="">
        <img class="ln" src="assets/images/ln.png" alt="">

      </footer>
</div>
</body>
</html>