<?php
require_once  'Controller/Messagetraints.php';
Message::controllerPath();
Message::modelPath();
Message::MoviePath();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="/public_html/Views/wpresscss.css" rel="stylesheet">
</head>
<body>
<!----------Navbar------------->
<nav class="navbar navbar-expand-md sticky-top">
    <div class="container-fluid">
        <a class="navbar-header" href="#"><img src="/public_html/Views/img/Vgr3.png"></p></a>
        <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " id="home" href="#">HD movies at the smallest file size.</a>
                </li>
            </ul>
            <ul class="navbar-nav" id="nav-left">
                <li class="nav-item active">
                    <a class="nav-link" id="home1" href="index.php?page=showhomepage">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--=====JUMBOTRON-------------->
<div class="container">
    <div class="row">
        <?php
        $movie = new Movie($_GET['id']);
        //  $actors = $movie->getActors();
        $genres = $movie->getGenres();
        $movie1 = new Controller();
        $actors = $movie1->selectActorsinMoviesbyId();
        $genres = $movie1->selectGenresinMoviesbyId();
        ?>
    </div>
    <div class="row">
        <h2><?php echo $movie->movies_name ?></h2>
    </div>
    <br>
    <div class="row">

        <h2>Actors:</h2>
        <h2><?php
            foreach ($actors as $actor) {


                echo $actor['actor'] . ",";
            }
            ?></h2>

    </div>
    <div class="row">
        <h2>Genres:</h2>
        <h2><?php
            foreach ($genres as $genre) {
                echo $genre['genre'];
            }
            ?></h2>
    </div>
    <div class="row">
        <?php
        $nov = new uploadVideo();
        $n = $nov->showVideo();
        foreach ($n as $item) {

            echo "<video  controls>
                        <source src='Views/img/" . $item['video'] . "'type='video/mp4'>
                    </video>";
        }
        ?>
    </div>
</div>


</div>

</body>
</html>