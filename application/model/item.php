<?php

class Item extends Model
{
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
    public function getAllItemsContaining($value)
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
    public function getAllItemsContainingInCategory($value, $category)
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
}
