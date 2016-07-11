<?php

/**
 * Class Search - deals with all search data
 */
class Search extends Controller
{    
    /**
     * This method works with form input to load data to a user
     * 
     * Note: It's named 'index' to avoid problems with MINI's unique
     * way of matching URLs to controller names and their methods
     */
    public function index()
    {
        if (isset($_GET["submit_search"])) {

            $category = $_GET['category'];
            $input = trim($_GET['searchbar']);
            
            // redirect to homepage if user types whitespace only
            if ($input == "") {
                header('location: ' . URL . 'home/index');
            }
            
            // interact with Item model to get the data, to see if there's a match
            if ($category == 'All') {
                $items = $this->item_model->getItemsContaining($input);
            } else {
                $items = $this->item_model->getItemsContainingInCategory($input, $category);
            }
        
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
            // redirect to homepage if user visits /search or /search/index
            header('location: ' . URL . 'home/index');
        }
    }
}
