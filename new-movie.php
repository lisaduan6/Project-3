<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$title = '';
$views = '';
$director = '';
$poster = '';

if (isset($_POST["submitBtn"])) {

    if ((!empty($_POST['title'])) && (!empty($_POST['views'])) && (!empty($_POST['director'])) && (!empty($_POST['poster']))) {
        $title = $_POST['title'];
        $views = $_POST['views'];
        $director = $_POST['director'];
        $poster = $_POST['poster'];


       
        $conn = mysqli_connect('localhost', 'root', '', 'movie_db');


        if($conn) {
                
            $query = "INSERT INTO movies(title, views, director_id, poster)
            VALUES($title, $views, $director, $poster)";
            
        

        
            $result = mysqli_query($conn, $query);

  
            if($result)
                echo 'Successfully inserted in the DB!';
            else
                echo 'Problem inserting into the DB.';

        } else {
        echo 'Problem with connection !';
        }


         mysqli_close($conn);



        
    } else {
        echo 'Mandatory!';
    }

    
};


?>
<h1>Enter Movie Information</h1>
<form action="" method="POST">
    <input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>"><br>
    <input type="text" name="views" placeholder="Views" value="<?php echo $views; ?>"><br>
    <input type="text" name="poster" placeholder="Image" value="<?php echo $poster; ?>"><br>
    <input type="text" name="director" placeholder="Director's ID" value="<?php echo $director; ?>"><br>
    <input type="submit" name="submitBtn" value="Send"> 
</body>
</html>


    
    