<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$page = $_GET['page'];


require_once $_SERVER['DOCUMENT_ROOT'] . '/public_html/Controller/Controller.php';
require_once "Controller/UploadPicture.php";
require_once "Controller/UploadVideo.php";

$controller = new Controller();
$upl = new uploadVideo();
$uplPic = new uploadPicture();


$routeControllerArray = array('user' => 'getAll', 'showmoviesform' => 'showInsertForm', 'showadminspage' => 'showAdminPage', 'insertmovie' => 'insertMovie',
    'insertgenre' => 'insertGenre', 'insertactor' => 'insertActors', 'showactorsform' => 'showActorsInsertForm', 'showActors' => 'showActorsInsertForm',
    'showActors' => "showActortable", 'showUsers' => 'showUserstable', 'showMovies' => 'showMovietable', 'showGenres' => 'showGenretable',
    'showgenres' => 'showGenres', 'showmovies' => 'showMovies', 'deletemovie' => 'deleteMovies', 'deleteactor' => 'deleteActor',
    'deletegenre' => 'deleteGenre', 'updatemovie' => 'updateMovie', 'updategenre' => 'updateGenres', 'editmovie' => 'editMovie',
    'editactor' => 'editActor', 'editgenre' => 'editGenre', 'updateactor' => 'updateActor', 'jsonMovies' => 'showMoviesJson',
    'jsonActors' => 'showActorsJson', 'jsonGenres' => 'showGenresJson', 'jsonUsers' => 'showUsersJson',
    'showgenresform' => 'showGenresForm', 'insertactorsinmovies' => 'insertActorsinMovies', 'insertgenresinmovies' => 'insertGenresinMovies', 'login' => 'login',
    'register' => 'register', 'logout' => 'logout', 'usershomepage' => 'showUsersHomePage',
    'showhomepage' => 'showHomePage', 'showmovie' => 'showMovie', 'showadminspage' => 'showAdminPage', 'showadminshomepage' => 'showAdminPage', 'searchmovie' => 'searchMovie');
$routePictureArray = array('uploadpicture' => 'uploadPicture');
$routeVideoArray = array('uplvideo' => 'uploadVideo');


if (!isset($page)) {
    header('Location: index.php?page=showhomepage');

}
if (array_key_exists($page, $routeControllerArray)) {
    $page = $_GET['page'];
    foreach ($routeControllerArray as $raName => $raValue) {
        if ($raName === $page) {
            $msg = $raValue;
            // print_r($msg);
            $controller->{$msg}();
        }
    }
} elseif (array_key_exists($page, $routePictureArray)) {
    foreach ($routePictureArray as $raName => $raValue) {
        if ($raName === $page) {
            $msg = $raValue;
            $uplPic->{$msg}();
        }
    }
} elseif (array_key_exists($page, $routeVideoArray)) {
    foreach ($routeVideoArray as $raName => $raValue) {
        $msg = $raValue;
        $upl->{$msg}();
    }

}




/*if (!isset($page)) {
    header('Location: index.php?page=showhomepage');
}


switch ($page) {
    case 'user':
        $controller->getAll();
        break;
    case 'showmoviesform':
        $controller->showInsertForm();
        break;
    case 'showadminspage':
        $controller->showAdminPage();
        break;
    case 'insertmovie':
        $controller->insertMovie();
        break;
    case 'insertgenre':
        $controller->insertGenre();
        break;
    case 'insertactor':
        $controller->insertActors();
        break;
    case 'showactorsform':
        $controller->showActorsInsertForm();
        break;
    case 'showActors':
        $controller->showActortable();
        break;
    case 'showUsers':
        $controller->showUserstable();
        break;
    case 'showMovies':
        $controller->showMovietable();
        break;
    case 'showGenres':
        $controller->showGenretable();
        break;
    case 'showgenres':
        $controller->showGenres();
        break;
    case 'showmovies':
        $controller->showMovies();
        break;
    case 'deletemovie':
        $controller->deleteMovies();
        break;
    case 'deleteactor':
        $controller->deleteActor();
        break;
    case 'deletegenre':
        $controller->deleteActor();
        break;
    case 'updatemovie':
        $controller->updateMovie();
        break;
    case 'updategenre':
        $controller->updateGenres();
        break;
    case 'editmovie':
        $controller->editMovie();
        break;
    case 'editactor':
        $controller->editActor();
        break;
    case 'editgenre':
        $controller->editGenre();
        break;
    case 'updateactor':
        $controller->updateActor();
        break;
    case 'jsonMovies':
        $controller->showMoviesJson();
        break;
    case 'jsonActors':
        $controller->showActorsJson();
        break;
    case 'jsonGenres':
        $controller->showGenresJson();
        break;
    case 'jsonUsers':
        $controller->showUsersJson();
        break;
    case 'updatepicture':
        $controller->showPictupt();
        break;
    case 'showgenresform':
        $controller->showGenresForm();
        break;
    case 'insertactorsinmovies':
        $controller->insertActorsinMovies();
        break;
    case 'insertgenresinmovies':
        $controller->insertGenresinMovies();
        break;
    case 'login':
        $controller->login();
        break;
    case 'register':
        $controller->register();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'uplvideo':
        $upl->uploadVideo();
        break;
    case 'uploadpicture':
        $uplPic->uploadPicture();
        break;
    case 'usershomepage':
        $controller->showUsersHomePage();
        break;
    case 'showhomepage':
        $controller->showHomePage();
        break;
    case 'showmovie':
        $controller->showMovie();
        break;
    case 'showadminspage':
        $controller->showAdminPage();
        break;
    case 'showadminshomepage':
        $controller->showAdminsHomePage();
        break;
    default:
        die('404');
        break;
}*/

