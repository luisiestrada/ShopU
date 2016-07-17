<?php

/**
 * Class Items
 */
class Items extends Controller
{   
    /**
     * Show all items
     */
    public function index()
    {
        $items = $this->db_model->getAllItems();
        require APP . 'view/_templates/header.php';
        require APP . 'view/items/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * Display view to sell items
     */
    public function sellItem()
    {   require APP . 'view/_templates/header.php';
        require APP . 'view/items/sell_item.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Add item to database
     */
    public function addItem()
    {
        if (isset($_POST['submit_add_item'])) {
            
            // store reference to the file uploaded into $file
            $file = $_FILES["image"]["tmp_name"];
            
            // if returns false, not an image or no image selected
            if ($file != null && getimagesize($file)) {
                
                // resize image (destroys original)
                parent::resizeImage($file);
                $image = file_get_contents($file);
                
                // add item to database with image
                $this->db_model->addItemWithImage($_POST["title"], $_POST["price"],
                    $_POST["category"], $_POST["description"], $_POST["keywords"], $image);
        
            } else {
                // add item to database without an image
                $this->db_model->addItem($_POST["title"], $_POST["price"],
                    $_POST["category"], $_POST["description"], $_POST["keywords"]);
            }
            
            // where to go after item is added
            header('location: ' . URL . 'items/index');
            
        } else {
            // redirect to sell item page if user visits /item/additem manually
            header('location: ' . URL . 'items/sellitem');
        }
    }
}
