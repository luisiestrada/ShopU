<?php

/**
 * Class Form
 */
class Search extends Controller
{
    public function form()
    { 
      if (isset($_POST["submit_search"])) {
        
        $input = $_POST['searchbar'];
        
        if (stripos($input, 'book') !== FALSE) {
            header('location: ' . URL . 'books/index');
        } elseif (stripos($input, 'song') !== FALSE) {
            header('location: ' . URL . 'songs/index');
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/notfound.php';
            require APP . 'view/_templates/footer.php';
        }
      }
    }
}
