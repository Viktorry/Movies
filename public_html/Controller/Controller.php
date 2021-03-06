<?php
/*require ("./Model/Model.php");*/
include 'Messagetraints.php';
Message::modelPath();
Message::MoviePath();

class Controller
{
    use Message;

    //Function for input validation!!!
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getAll()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/UsersPage.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showInsertForm()
    {
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AddMovie.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showActorTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $actors = new Model();
            $act = $actors->getAllactors();
            include("./Views/ShowActors.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showActorMoviegenreTable()
    {
        $all = new Model();
        $mga = $all->getActorsGenresMovies();
        return $mga;
    }

    public function showUsersTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $users = new Model();
            $user = $users->getAllUsers();
            include("./Views/ShowUsers.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showGenreTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $genres = new Model();
            $gen = $genres->getAllGenres();
            include("./Views/ShowGenres.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showMovieTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $movies = new Model();
            $mov = $movies->getAllmovies();
            include("./Views/ShowMovies.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showMovieHomePage()
    {
        $movies = new Model();
        $mov = $movies->getAllmovies();
        return $mov;
    }

    public function showHomePage()
    {

        if (!isset($_SESSION['Loged in'])) {
            include("./Views/HomePage.php");
        } else {
            header("Location:/Views/UsersHomePage.php");
        }
    }

    public function showMovie()
    {
        /*  session_start();
          if (!isset($_SESSION['Loged in'])) {*/
        include("./Views/movie.php");
        /*  } else {
              header("Location:/Views/UsersHomePage.php");
          }*/
    }

    public function showUsersHomePage()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/UsersHomePage.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showAdminsHomePage()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AdminsHomePage.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showAdminPage()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AdminsPage.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showActorsInsertForm()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AddActors.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function showGenresForm()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AddGenre.php");
        } else {
            Message::insrtheaderHomePage();
        }
    }

    public function deleteMovie()
    {
        $movie_id = $this->test_input($_GET['movies_id']);
        $movie = new Model();
        $movie->deleteAllmoviesandActors($movie_id);
        $msg = 'Movie deleted';
        echo $msg;
    }

    public function deleteActor()
    {
        $actor_id = $this->test_input($_GET['id']);
        $actor = new Model();
        $actor->deleteActor($actor_id);
        $msg = 'Movie deleted';
        echo $msg;
    }

    public function deleteGenre()
    {
        $genre_id = $this->test_input($_GET['id']);
        $genre = new Model();
        $genre->deleteGenres($genre_id);
        $msg = 'Movie deleted';
        echo $msg;
    }

    public function insertMovie()
    {
        $movie = $this->test_input($_GET['movie']);
        $date = $this->test_input($_GET['date']);
        $duration = $this->test_input($_GET['duration']);
        $ratings = $this->test_input($_GET['ratings']);
        $youtube = $this->test_input($_GET['youtube']);
        $imdb = $this->test_input($_GET['imdb']);
        $url = $this->test_input($_GET['url']);
        $moviee = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($movie != "" && $date != "" && $duration != "" && $ratings != "" && $youtube != "" && $imdb != "" && $url != "") {
                if (is_numeric($ratings)) {
                    $moviee->insertMovie($movie, $date, $duration, $ratings, $youtube, $imdb, $url);
                    Message::insrtsuccsses();
                } else {
                    $msg = "Ratings is not numeric!!!";
                    echo $msg;
                }
            } else {
                Message::insrtallmsg();
            }
        } else {
            Message::insrtmethodwrong();
        }
    }

    public function insertActors()
    {
        $actor = $this->test_input($_GET['actor']);
        $actors = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($actor != "") {
                if ($actor)
                    $actors->insertActors($actor);
                Message::insrtsuccsses();
            } else {
                Message::insrtallmsg();
            }
        } else {
            Message::insrtmethodwrong();
        }
    }

    public function insertGenre()
    {
        $genre = $this->test_input($_GET['genre']);
        $genres = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($genre != "") {
                if ($genre)
                    $genres->insertGenres($genre);
                Message::insrtsuccsses();
            } else {
                Message::insrtallmsg();
            }
        } else {
            Message::insrtmethodwrong();
        }
    }

    public function showMoviesJson()
    {
        $movie = new Model();
        $mov = $movie->getAllmovies();
        echo json_encode($mov);
    }

    public function showUsersJson()
    {
        $user = new Model();
        $use = $user->getAllUsers();
        echo json_encode($use);
    }

    public function showActorsJson()
    {
        $actor = new Model();
        $act = $actor->getAllactors();
        echo json_encode($act);
    }

    public function showGenresJson()
    {
        $genre = new Model();
        $gen = $genre->getAllGenres();
        echo json_encode($gen);
    }

    public function deleteMovies()
    {
        $id = $this->test_input($_GET['id']);
        $movie = new Model();
        $movie->deleteMovie($id);
        include './Views/ShowMovies.php';
    }

    public function updateMovie()
    {
        $movie_id = $this->test_input($_GET['id']);
        $movie = $this->test_input($_GET['movie']);
        $date = $this->test_input($_GET['date']);
        $duration = $this->test_input($_GET['duration']);
        $ratings = $this->test_input($_GET['ratings']);
        $youtube = $this->test_input($_GET['youtube']);
        $imdb = $this->test_input($_GET['imdb']);
        $url = $this->test_input($_GET['url']);
        $moviee = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($movie != "" && $date != "" && $duration != "" && $ratings != "" && $youtube != "" && $imdb != "" && $url != "" && $movie_id != "") {
                if (preg_match("/^[a-zA-Z ]*$/", $movie)) {
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $imdb) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $youtube) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
                        if (is_numeric($ratings)) {
                            $moviee->updateMovies($movie_id, $movie, $date, $duration, $ratings, $youtube, $imdb, $url);
                            Message::insrtsuccsses();
                        } else {
                            $msg = "Ratings is not numeric!!!";
                            echo $msg;
                        }
                    } else {
                        $msg = "You must insert valid url adress!!!";
                        echo $msg;
                    }
                } else {
                    Message::insrtltrsandnumbrs();
                }
            } else {
                Message::insrtallmsg();
            }
        } else {
            Message::insrtmethodwrong();
        }
    }

    public function updateActor()
    {
        $actor_id = $this->test_input($_GET['id']);
        $actor = $this->test_input($_GET['actor']);
        $actors = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($actor != "" && $actor_id != "") {
                if (preg_match("/^[a-zA-Z ]*$/", $actor)) {
                    $actors->updateActors($actor, $actor_id);
                    Message::insrtsuccsses();
                } else {
                    Message::insrtltrsandnumbrs();
                }
            } else {
                Message::insrtallmsg();
            }
        } else {
            Message::insrtmethodwrong();
        }
    }

    public function updateGenres()
    {
        $genre_id = $this->test_input($_GET['id']);
        $genre = $this->test_input($_GET['genres']);
        $genres = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($genre != "" && $genre_id != "") {
                if (preg_match("/^[a-zA-Z ]*$/", $genre)) {
                    $genres->updateGenres($genre, $genre_id);
                    Message::insrtsuccsses();
                } else {
                    Message::insrtltrsandnumbrs();
                }
            } else {
                Message::insrtallmsg();
            }
        } else {
            Message::insrtmethodwrong();
        }
    }

    public function editMovie()
    {
        $id = $this->test_input($_GET['id']);
        $movie = new Model();
        $mov = $movie->getMeoviesbyId($id);
        include("./Views/EditMovie.php");
    }

   public function searchMovie()
    {
        //$output='';
        if (isset($_POST['search'])) {
            $searchQuery = $_POST['search'];
            $searchQuery1 = preg_replace("#[^0-9a-z]#i", "", "%{$searchQuery }%");
            $movie = new Model();
            $mov = $movie->searchMovie($searchQuery);
            foreach ($mov as $m) {
                ?><a
                href="index.php?page=showmovie&id=<?php echo $m['movies_id'] ?>"><br><?php echo $m['movies_name'] ?></a>
                <?php
            }
            include("./Views/SearchMovie.php");


        }
    }

    public function editGenre()
    {
        $id = $this->test_input($_GET['id']);
        $genre = new Model();
        $gen = $genre->getGenresbyId($id);
        include("./Views/EditGenres.php");
    }


    public function editActor()
    {
        $id = $this->test_input($_GET['id']);
        $actor = new Model();
        $act = $actor->getActorsbyId($id);
        include("./Views/EditActor.php");
    }

    public function showPictupt()
    {
        include("./Views/UpdatePicture.php");
    }


    public function insertActorsinMovies()
    {
        $movie = $this->test_input($_GET['movies']);

        if ($movie != "") {
            $actors = $_GET['actors'];
            if (count($actors) > 0) {
                foreach ($actors as $act) {
                    $object = new Model();
                    $object->insertActorsinMovies($act, $movie);
                    Message::insrtsuccsses();
                }
            }
        } else {
            $msg = 'There is no movie selected!!!';
            echo $msg;
        }
    }

    public function insertGenresinMovies()
    {
        $movie = $this->test_input($_GET['movies']);

        if ($movie != "") {
            $genres = $_GET['genres'];
            if (count($genres) > 0) {
                foreach ($genres as $gen) {
                    $object = new Model();
                    $object->insertGenresinMovies($gen, $movie);
                    Message::insrtsuccsses();
                }
            }
        } else {
            $msg = 'There is no movie selected!!!';
            echo $msg;
        }
    }

    public function selectActorsinMoviesbyId()
    {

        $id = $this->test_input($_GET['id']);
        $actor = new Model();
        $act = $actor->getActorsinMoviesbyId($id);
        return $act;
    }

    public function selectGenresinmoviesbyId()
    {

        $id = $this->test_input($_GET['id']);
        $genre = new Model();
        $gen = $genre->getGenresinMoviesbyId($id);
        return $gen;
    }


    public function login()
    {
        $username = $this->test_input($_GET['username']);
        $password = $this->test_input($_GET['password']);
        // $admin= $_GET['Admin'];
        if (!empty($username) && !empty($password)) {
            if (preg_match("/^[a-zA-Z ]*$/", $username)) {
                $useri = new Model();
                $users = $useri->getUserByUsernameAndPassword($username, $password);
                //var_dump($users);
                if ($users) {
                    session_start();
                    $_SESSION['Loged in'] = serialize($users);
                    // var_dump($s);
                    if ($users['Admin'] == 1) {
                        $msg = "Admin";
                        echo $msg;
                    } else {
                        $msg = "User";
                        echo $msg;
                    }
                } else {
                    // LogIN ERROR
                    $msg = 'Wrong parameters!!!';
                    echo $msg;
                }
            } else {
                Message::insrtltrsandnumbrs();
            }
        } else {
            Message::insrtallmsg();
        }
    }

    public function register()
    {
        $username = $this->test_input($_GET['username1']);
        $email = $this->test_input($_GET['email']);
        $password1 = $this->test_input($_GET['password_1']);
        $password2 = $this->test_input($_GET['password_2']);
        $model1 = new Model();
        $m = $model1->getUserByUsername($username);
        $model2 = new Model();
        $m1 = $model2->getUserByEmail($email);
        if (!empty($username) && !empty($email) && !empty($password1) && !empty($password2)) {
            if (preg_match("/^[a-zA-Z ]*$/", $username)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($m['username'] == $username || $m1['email'] == $email) {
                        $msg = 'Selected username or email already exist!!!';
                        echo $msg;
                    } else {
                        if ($password1 === $password2) {
                            $user = new Model();
                            $users = $user->getUserByUsernameAndPassword($username, $password1);
                            session_start();
                            $_SESSION['Loged in'] = serialize($users);
                            $user = new Model();
                            $users = $user->insertUsers($username, $email, $password1);
                            $msg = 'Register';
                            echo $msg;
                        } else {
                            $msg = "Passwords are not matching!!!";
                            echo $msg;
                        }
                    }
                } else {
                    $msg = 'Invalid email format!!!';
                    echo $msg;
                }
            } else {
                Message::insrtltrsandnumbrs();
            }
        } else {
            Message::insrtallmsg();
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?page=showhomepage");
    }

    // private $fileFornats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

}