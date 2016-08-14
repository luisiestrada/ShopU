<?php

require APP . 'model/database.php';

/**
 * class Item interacts with the Database class
 */
class Item
{   
    /**
     * connection to the Database class
     * @var type connection to the Database class
     */
    private $db_model = null;
    
    function __construct()
    {
        $this->db_model = new Database();
    }
    
    /**
     * Get an item by its id
     */
    public function getItem($item_id)
    {
        return $this->db_model->getItem($item_id);
    }
    
    /**
     * Get all items from database (no category)
     */
    public function getAllItems($items_per_page, $range)
    {
        return $this->db_model->getAllItems($items_per_page, $range);
    }
    
    /**
     * Get amount of items in the database
     */
    public function getAmountOfItems()
    {
        return $this->db_model->getAmountOfItems();
    }
    
    /**
     * Get all items containing a certain keyword
     * @param type $value - the keyword user searched for
     */
    public function getItemsContaining($value, $category, $items_per_page, $range)
    {
        return $this->db_model->getItemsContaining($value, $category, $items_per_page, $range);
    }
    
    /**
     * Get amount of items containing a certain keyword
     * @param type $value - the keyword user searched for
     */
    public function getAmountOfItemsContaining($value, $category)
    {
        return $this->db_model->getAmountOfItemsContaining($value, $category);
    }
    
    /**
     * Get all items from database in a certain category
     */
    public function getAllItemsFromCategory($category, $items_per_page, $range)
    {
        return $this->db_model->getAllItemsFromCategory($category, $items_per_page, $range);
    }
    
    /**
     * Get amount of items from database in a certain category
     */
    public function getAmountOfItemsFromCategory($category)
    {
        return $this->db_model->getAmountOfItemsFromCategory($category);
    }
    
    /**
     * Add item to the database
     */
    public function addItem($title, $seller_id, $price, $category, $description, $keywords, $image)
    {
        $this->db_model->addItem($title, $seller_id, $price, $category, $description, $keywords, $image);
    }
    
    //////////////////////////////// CATEGORIES ////////////////////////////////
    
    /**
     * Get all categories from database
     */
    public function getAllCategories()
    {
        return $this->db_model->getAllCategories();
    }
    
    /**
     * Get a specified category from the database by key
     * @param type $categoryId - the id or key of the category
     *                           1 - Books
     *                           2 - Clothes
     *                           3 - Electronics
     *                           4 - Furniture
     *                           5 - Transportation
     *                          99 - Other
     */
    public function getCategory($categoryId)
    {
        return $this->db_model->getCategory($categoryId);
    }
    
    /**
     * Get a category's key from the database; 
     * returns -1 if category not found
     * @param type $category - the text category whose key is to be returned
     */
    public function getCategoryKey($category)
    {
        return $this->db_model->getCategoryKey($category);
    }
}
