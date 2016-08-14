<?php

session_start();

/**
 * Class Items
 */
class Items extends Controller
{
    public $categories; // List of all categories for categories
                        // section in sell items page (loaded from db)

    /**
     * If user visits /items/index or /items via URL, redirect to homepage
     */
    public function index()
    {
        header('location: ' . URL . 'home/index');
    }
    
    /**
     * This method works with form input to load data to a user
     * 
     * Reference for pagination:
     * http://code.runnable.com/VSpZzVic6P4hfniR/php-pdo-pagination-example-for-mysql
     */
    public function search()
    {
        // check if search bar form was submitted
        if (isset($_GET["submit_search"])) {
            
            // get user input & category from search bar
            $input = trim($_GET['searchbar']);
            $category = $_GET['category'];
            
            // pull categories from database
            $categories = $this->item_model->getAllCategories();
            $search = $input;
            
            // if a category is selected, convert the category selection to its key for db storage
            // otherwise, pass 'All' to search all categories
            $categoryId = ($category != 'All') ? $this->item_model->getCategoryKey($category) : $category;
            
            // if no input from search, get all items; otherwise, search for input
            $num_items = (empty($input)) ? $this->item_model->getAmountOfItemsFromCategory($categoryId)
                                         : $this->item_model->getAmountOfItemsContaining($input, $categoryId);
            
            $items_per_page = 5;
            $num_pages = ceil($num_items / $items_per_page);
            
            // get page user visits (1 by default)
            $get_page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            // validate page number input, making sure it's within [1, num_pages]
            $data = array( 'options' => array('default' => 1, 'min_range' => 1, 'max_range' => $num_pages) );
            $current_page = filter_var(trim($get_page), FILTER_VALIDATE_INT, $data);
            
            // get all items per page
            $range  = $items_per_page * ($current_page - 1);
            
            // if user searches with blank input, get all items
            // else, get all items containing keyword
            $items = (empty($input)) ? $this->item_model->getAllItemsFromCategory($categoryId, $items_per_page, $range)
                                     : $this->item_model->getItemsContaining($input, $categoryId, $items_per_page, $range);
            
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require ($items == null) ? APP . 'view/errors/notfound.php' : APP . 'view/items/index.php';
            require APP . 'view/_templates/footer.php';
            
        } else {
            // redirect to items index if user visits /items/search without
            // actually searching for an item through the search bar
            header('location: ' . URL . 'home/index');
        }
    }

    /**
     * If user not signed in, redirect to sign in page
     * Else, display view to sell an item
     */
    public function sellItem()
    {
        $categories = $this->item_model->getAllCategories();

        if (!isset($_SESSION['user_id'])) {
            $error = 'You must be signed in to be able to sell items!';
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/errorbox.php';
            require APP . 'view/users/signin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/items/sell_item.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * Get an item by its id
     * @param type $id
     */
    public function getItem($id)
    {
        $item = $this->item_model->getItem($id);
        $seller = $this->user_model->getUsernameFromUserId($item->seller_id);
        $sellerImage = $this->user_model->getImageFromUserId($item->seller_id);
        $categories = $this->item_model->getAllCategories();
        $search = null;
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/items/item.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * This function is used to show user the order confirmation.
     * Users can review their ordered item before they buy it
     * @param type $id
     */
    public function orderConfirm($id)
    {
        if (!isset($_SESSION['user_id'])) {
            // redirect to items index if unregistered user manually
            // attempts to purchase an item through the URL
            header('location: ' . URL . 'home/index');
        } else {
            $item = $this->item_model->getItem($id);
            $categories = $this->item_model->getAllCategories();
            $search = null;
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require APP . 'view/items/item_confirmation.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * This function is used to inform user of the message of successful order
     * @param type $id
     */
    public function orderSuccess($id)
    {
        if (!isset($_SESSION['user_id'])) {
            // redirect to items index if unregistered user manually
            // attempts to purchase an item through the URL
            header('location: ' . URL . 'home/index');
            
        } else {
            $item = $this->item_model->getItem($id);
            $categories = $this->item_model->getAllCategories();
            $search = null;
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require APP . 'view/items/success.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * Add item to database
     */
    public function addItem()
    {
        if (isset($_POST['submit_add_item'])) {

            // store reference to the file uploaded into $file
            $file = $_FILES["image"]["tmp_name"];

            // Convert the category selection to its key for db storage
            $categoryId = $this->item_model->getCategoryKey($_POST["category"]);
            
            $image = null; // image null by default
            
            // if returns false, not an image or no image selected
            if ($file != null && getimagesize($file)) {
                parent::resizeImage($file);
                $image = file_get_contents($file);
            }
            
            $this->item_model->addItem($_POST["title"], $_SESSION["user_id"], $_POST["price"],
                    $categoryId, $_POST["description"], $_POST["keywords"], $image);

            // where to go after item is added
            header('location: ' . URL . 'home/index');
        } else {
            // redirect to sell item page if user visits /item/additem manually
            header('location: ' . URL . 'items/sellitem');
        }
    }
    
    /**
     * This function deals with buttons selected from the homepage
     */
    public function buttonCategories() 
    {
        $categories = $this->item_model->getAllCategories();
        
        // check submit from button
        if (isset($_GET['buttons'])) {
            $category = $_GET['buttons'];
            $categoryId = $this->item_model->getCategoryKey($category);
            $search = null;
            
            $num_items = $this->item_model->getAmountOfItemsFromCategory($categoryId);
            $items_per_page = 5;
            $num_pages = ceil($num_items / $items_per_page);
            
            // get page user visits (1 by default)
            $get_page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            // validate page number input, making sure it's within [1, num_pages]
            $data = array( 'options' => array('default' => 1, 'min_range' => 1, 'max_range' => $num_pages) );
            $current_page = filter_var(trim($get_page), FILTER_VALIDATE_INT, $data);
            
            // get all items per page
            $range  = $items_per_page * ($current_page - 1);
            
            $items = $this->item_model->getAllItemsFromCategory($categoryId, $items_per_page, $range);
            
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require ($items == null) ? APP . 'view/errors/notfound.php' : APP . 'view/items/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'home/index');
        }
    }
}
