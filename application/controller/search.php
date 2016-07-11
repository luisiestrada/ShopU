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
            
            Search::searchCategory($input, $category);
            
        } else {
            // go to homepage if user visits search/form manually
            header('location: ' . URL . 'home/index');
        }
    }
    
    /**
     * This method deals with searches made within a category
     * @param type $input - user input
     * @param type $category - category on searchbar
     */
    public function searchCategory($input, $category)
    {
        if ($category == 'All') {
            $items = $this->item_model->getItemsContaining($input, $category);
        } else {
            $items = $this->item_model->getItemsContainingInCategory($input, $category);
        }

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
