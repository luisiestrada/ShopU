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
        // check if search bar form was submitted
        if (isset($_GET["submit_search"])) {
            
            // get user input & category from search bar
            $input = trim($_GET['searchbar']);
            $category = $_GET['category'];
            
            // interact with db model to see if there's a match in the database
            // with the provided input & category, and if so, store into $items
            $items = $this->db_model->getItemsContaining($input, $category);
            
            if ($items == null) {
                // if no match found, load errors/notfound view
                require APP . 'view/_templates/header.php';
                require APP . 'view/_templates/navigation.php';
                require APP . 'view/errors/notfound.php';
                require APP . 'view/_templates/footer.php';
            } else {
                // if match found, load items/index, which has access to $items
                header('location: ' . URL . 'items/index');
            }
            
        } else {
            // redirect to homepage if user visits /search/form without
            // actually searching for an item through the search bar
            header('location: ' . URL . 'home/index');
        }
    }
    
}
