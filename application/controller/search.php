<?php

/**
 * Class Search - deals with all search data
 */
class Search extends Controller
{
    /**
     * This method deals with form input and delegates decisions to
     * other methods based on what category the user searches from
     */
    public function form()
    { 
        if (isset($_POST["submit_search"])) {

            $category = $_POST['category'];
            $input = $_POST['searchbar'];
            
            switch($category) {
                case 'book': Search::book($input); break;
                case 'song': Search::song($input); break;
                default:
                    require APP . 'view/_templates/header.php';
                    require APP . 'view/errors/notfound.php';
                    require APP . 'view/_templates/footer.php';
            }
        } else {
            // go to homepage if user visits search/form manually
            header('location: ' . URL . 'home/index');
        }
    }
    
    /**
     * This method deals with searches within the book category
     * @param type $input - user input
     */
    public function book($input) {
        $books = $this->book_model->getAllBooksContaining($input);
        $amount_of_books = $this->book_model->getAmountOfBooksContaining($input);

        if ($books == null) { // if no results, load notfound page
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/notfound.php';
            require APP . 'view/_templates/footer.php';
        } else { // if results, load books found
            require APP . 'view/_templates/header.php';
            require APP . 'view/books/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    /**
     * This method deals with searches within the song category
     * @param type $input - user input
     */
    public function song($input) {
        $songs = $this->song_model->getAllSongsContaining($input);
        $amount_of_songs = $this->song_model->getAmountOfSongsContaining($input);

        if ($songs == null) { // if no results, load notfound page
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/notfound.php';
            require APP . 'view/_templates/footer.php';
        } else { // if results, load songs found
            require APP . 'view/_templates/header.php';
            require APP . 'view/songs/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
}
