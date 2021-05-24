<?php
require_once 'config/operations.php';

$movie =infoMovie();
// require_once 'config/db.php';

// $id = $_GET["id"];
// $movie = mysqli_query($db, "SELECT * FROM `movies` WHERE `id` = $id");
 
// if (!$movie) {
// 	echo('movies not found');
// }
$movie =  mysqli_fetch_assoc($movie);
?>
<a href="/"> ГЛАВНАЯ</a>
<div class="jumbotron">
  <h1 class="display-4">movie title: <?=$movie["title"]?></h1>
  <p class="lead">Release Year: <?=$movie["release_year"]?></p>
  <hr class="my-4">
  <p>Format: <?=$movie["format"]?></p>
  <p class="lead">
    Stars: <?=$movie["stars"]?>
  </p>
 
</div>