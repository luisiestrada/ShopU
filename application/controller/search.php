<?php

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
        if (isset($_GET["submit_search"])) {
            
            $input = trim($_GET['searchbar']);
            $category = $_GET['category'];
            
            // interact with db model to get the data, to see if there's a match
            $items = $this->db_model->getItemsContaining($input, $category);
            
            // load the views depending on whether or not there was a match
            if ($items == null) { // if no results, load notfound page
                require APP . 'view/_templates/header.php';
                require APP . 'view/errors/notfound.php';
                require APP . 'view/_templates/footer.php';
            } else { // if results, load items found
                require APP . 'view/_templates/header.php';
                require APP . 'view/items/index.php';
                require APP . 'view/_templates/footer.php';
            }
            
        } else {
            // redirect to homepage if user visits /search/form without
            // actually searching for an item through the search bar
            header('location: ' . URL . 'home/index');
        }
    }
    
}
