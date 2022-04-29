<?php

// WORKING WITH DATABASE

// 1. Connect to the D.B.
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'movie_db');
$directors =array();
$query = "SELECT director_id, name, nationality, picture
FROM directors d
LEFT JOIN movies m ON d.id = m.director_id
WHERE director_id = $id";

// True if you connected, false if not
if ($conn) {

  $results = mysqli_query($conn, $query);

  $directors = mysqli_fetch_all($results, MYSQLI_ASSOC);}

mysqli_close($conn); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NightCrawler page</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/4515ebb137.js" crossorigin="anonymous"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/global-style.css" />
  <link rel="stylesheet" href="./assets/css/nav-style.css" />
  <link rel="stylesheet" href="./assets/css/single-item.css" />
  <link rel="stylesheet" href="./assets/css/footer-style.css" />
</head>

<body>
  <header>
    <h1>MovieSuggest</h1>

    <ul>
      <li>
        <a href="# ">Home</a>
      </li>
      <li>
        <a class="active" href="# ">Movies</a>
      </li>
      <li>
        <a href="# ">Contact</a>
      </li>
    </ul>
  </header>

  <main>
    <a class="btn btn-primary" href="">Go Back</a>
   
   
    <section id="detail-section">
      <?php foreach ($directors as $director) : ?>

        <div class="image-container">
        <img src="<?= $director['picture'] ?>" alt="" />
      </div>
      <div class="text-container">

        <h2>
          <strong>Name :</strong>
          <?= $director['name']; ?>
      </h2>

        <h3>
          <strong>Nationality :</strong>
          <?= $director['nationality']; ?>
      </h3>
      
        <hr>
      <?php endforeach; ?>
  

        <h4>Share</h4>
        <ul class="social-icons">
          <li class="share-links">
            <i class="fa-brands fa-facebook"></i> Facebook
          </li>
          <li class="share-links">
            <i class="fa-brands fa-twitter"></i> Twitter
          </li>
          <li class="share-links">
            <i class="fa-brands fa-dribbble"></i> Dribble
          </li>
        </ul>
      </div>
    </section>
  </main>

  <footer>
    <p>
      2022 &copy; All Rights Reserved.&nbsp;<a href="#">Privacy Policy</a>
    </p>
    <ul class="social-icons">
      <li class="social-links"><i class="fa-brands fa-facebook-f"></i></li>
      <li class="social-links"><i class="fa-brands fa-linkedin-in"></i></li>
      <li class="social-links"><i class="fa-brands fa-twitter"></i></li>
    </ul>
  </footer>

</body>

</html>