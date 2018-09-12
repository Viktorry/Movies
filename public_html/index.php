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


$routeArray = array('user'=> 'getAll()' ,'showmoviesform' => 'showInsertForm()','showadminspage'=> $controller->showAdminPage(),'insertmovie'=>$controller->insertMovie(),
    'insertgenre'=>$controller->insertGenre(),'insertactor'=>  $controller->insertActors(),'showactorsform'=> $controller->showActorsInsertForm(),'showActors'=>$controller->showActorsInsertForm(),
    'showActors'=> $controller->showActortable(),'showUsers' =>  $controller->showUserstable(), 'showMovies'=>  $controller->showMovietable(),'showGenres'=> $controller->showGenretable(),
    'showgenres'=> $controller->showGenres(),'showmovies'=> $controller->showMovies(),'deletemovie'=>$controller->deleteMovies(),'deleteactor'=> $controller->deleteActor(),
    'deletegenre'=>$controller->deleteGenre(),'updatemovie'=> $controller->updateMovie(),'updategenre'=> $controller->updateGenres(),'editmovie'=> $controller->editMovie(),
    'editactor'=> $controller->editActor(),'editgenre'=>$controller->editGenre(),'updateactor'=> $controller->updateActor(),'jsonMovies'=> $controller->showMoviesJson(),
    'jsonActors'=>  $controller->showActorsJson(),'jsonGenres'=> $controller->showGenresJson(),'jsonUsers'=>  $controller->showUsersJson(),'updatepicture'=> $controller->showPictupt(),
    'showgenresform'=> $controller->showGenresForm(),'insertactorsinmovies'=>$controller->insertActorsinMovies(),'insertgenresinmovies'=>  $controller->insertGenresinMovies(),'login'=>$controller->login(),
    'register'=> $controller->register(),'logout'=> $controller->logout(),'uplvideo'=> $upl->uploadVideo(),'uploadpicture'=> $uplPic->uploadPicture(),'usershomepage'=> $controller->showUsersHomePage(),
    'showhomepage'=>$controller->showHomePage(),'showmovie'=> $controller->showMovie(), 'showadminspage'=>$controller->showAdminPage(),'showadminshomepage'=>$controller->showAdminPage(),
    'showadminshomepage'=>$controller->showAdminsHomePage());
foreach ($routeArray as $ra) {
    if (in_array($page) && array_key_exists($page,$routeArray) ){
        echo "valja!";
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
}

*/?>