<?php

class Item extends Model
{
    public $itemName;
    public $itemId;
    public $sellerId;
    public $price;
    public $details;
    public $category;
    
    /**
     * Get all items from database
     */
    public function getAllItems()
    {
        $sql = "SELECT id, title, price, category, description, keywords FROM item";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
    
    /**
     * Get all items containing a certain keyword
     * @param type $value - keyword to look for
     */
    public function getItemsContaining($value)
    {
        $sql = "SELECT id, title, price, category, description, keywords FROM item "
                . "WHERE title LIKE '%" .$value. "%' "
                . "OR category LIKE '%" .$value. "%' "
                . "OR description LIKE '%" .$value. "%' "
                . "OR keywords LIKE '%" .$value. "%'";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
    
    /**
     * Get all items of a category containing a keyword
     * @param type $value - keyword to look for
     * @param type $category - category to search through
     */
    public function getItemsContainingInCategory($value, $category)
    {
        $sql = "SELECT id, title, price, category, description, keywords FROM item "
                . "WHERE category = '" .$category. "' "
                . "AND (title LIKE '%" .$value. "%' "
                . "OR category LIKE '%" .$value. "%' "
                . "OR description LIKE '%" .$value. "%' "
                . "OR keywords LIKE '%" .$value. "%')";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
    
    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/items.php for more)
     */
    public function getAmountOfItems()
    {
        $sql = "SELECT COUNT(id) AS amount_of_items FROM item";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_items;
    }
}
