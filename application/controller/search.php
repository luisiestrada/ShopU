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
            $input = trim($_POST['searchbar']);
            
            // redirect to homepage if user types whitespace only
            if ($input == "") {
                header('location: ' . URL . 'home/index');
            }
            
            // check what category on the searchbar is chosen by user
            if ($category == 'All') {
                Search::all($input);
            } else {
                Search::specific_category($input, $category);
            }
            
        } else {
            // go to homepage if user visits search/form manually
            header('location: ' . URL . 'home/index');
        }
    }
    
    /**
     * This method deals with searches within the 'all' category
     * @param type $input - user input
     */
    public function all($input) {        
        $items = $this->item_model->getAllItemsContaining($input);

        if ($items == null) { // if no results, load notfound page
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/notfound.php';
            require APP . 'view/_templates/footer.php';
        } else { // if results, load items found
            require APP . 'view/_templates/header.php';
            require APP . 'view/items/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    /**
     * This method deals with searches within every other category
     * @param type $input - user input
     * @param type $category - category on searchbar
     */
    public function specific_category($input, $category)
    {
        $items = $this->item_model->getAllItemsContainingInCategory($input, $category);

        if ($items == null) { // if no results, load notfound page
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/notfound.php';
            require APP . 'view/_templates/footer.php';
        } else { // if results, load items found
            require APP . 'view/_templates/header.php';
            require APP . 'view/items/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
}
