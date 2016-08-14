<?php

session_start();

/**
 * Class Errors
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Errors extends Controller
{

    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        $search = null;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/errors/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
