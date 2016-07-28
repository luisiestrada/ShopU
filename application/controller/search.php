<?php

session_start();

/**
 * Class Search - deals with all search data
 */
class Search extends Controller
{    
    /**
     * Redirect to homepage if user visits /search or /search/index since view
     * doesn't exist! Search controller is only meant to deal with searches.
     */
    public function index()
    {
        header('location: ' . URL . 'home/index');
    }
    
    /**
     * This method works with form input to load data to a user
     */
    public function form()
    {
        // check if search bar form was submitted
        if (isset($_GET["submit_search"])) {
            
            // get user input & category from search bar
            $input = trim($_GET['searchbar']);
            $category = $_GET['category'];
            
            // if user searches with blank input, get all items
            // else, get all items containing keyword
            if ($input == "") {
                $items = $this->db_model->getAllItemsFromCategory($category);
            } else {
                $items = $this->db_model->getItemsContaining($input, $category);
            }
            
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            
            if ($items == null) {
                require APP . 'view/errors/notfound.php';
            } else {
                require APP . 'view/items/index.php';
            }
            
            require APP . 'view/_templates/footer.php';
            
        } else {
            // redirect to homepage if user visits /search/form without
            // actually searching for an item through the search bar
            header('location: ' . URL . 'home/index');
        }
    }
    
}
