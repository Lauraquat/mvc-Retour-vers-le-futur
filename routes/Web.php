<?php

namespace routes;

use controllers\AccountController;
use controllers\ActorsController;
use controllers\GalleryController;
use controllers\MoviesController;
use routes\base\Route;
// use utils\SessionHelpers;

class Web
{
    function __construct()
    {

        $movies = new MoviesController(); 

        // Appel des méthodes dans le contrôleur $movies.
        Route::Add('/', [$movies, 'home']);
        Route::Add('/movies', [$movies, 'getAllMovies']);
        Route::Add('/add', [$movies, 'add']);
        Route::Add('/update/{id}', [$movies, 'update']);
        Route::Add('/movie/{id}', [$movies, 'getOneMovie']);
        Route::Add('/addCom/{id}', [$movies, 'addCom']);


        $gallery = new GalleryController();
        
        // Appel des méthodes dans le contrôleur $gallery.
        Route::Add('/gallery', [$gallery, 'getAllImages']);
        
        
        $actors = new ActorsController();
        
        // Appel des méthodes dans le contrôleur $actors.
        Route::Add('/actors', [$actors, 'getAllMoviesByActor']);
        Route::Add("/addActor", [$actors, "addActor"]);



        $account = new AccountController();
        Route::Add('/login', [$account, 'login']);
        Route::Add('/login/run', [$account, 'login_run']);
        Route::Add('/logout', [$account, 'logout']);
        Route::Add('/register', [$account, 'register']);
        Route::Add('/register/run', [$account, 'register_run']);



        // //Exemple de limitation d'accès à une page en fonction de la SESSION.
        // if (SessionHelpers::isLogin()) {
        //     Route::Add('/logout', [$account, 'home']);
        // }
    }
}

