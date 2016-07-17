<?php

/**
 * class Database will handle all kinds of queries to the database
 */
class Database
{
    /**
     * Connect to the database
     * @param object $db - A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    /////////////////////////////////// ITEMS //////////////////////////////////
    
    /**
     * Get an item by its id
     * @param type $item_id
     */
    public function getItem($item_id)
    {   
        $sql = "SELECT * FROM item WHERE id = '$item_id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        // fetch() is the PDO method that gets exactly one result
        return $query->fetch();
    }
    
    /**
     * Get all items from database
     */
    public function getAllItems()
    {
        $sql = "SELECT id, title, price, category, description, keywords, image FROM item";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
    
    /**
     * Get all items containing a certain keyword
     * @param type $value - the keyword user searched for
     * @param type $category - the search bar category
     */
    public function getItemsContaining($value, $category)
    {
        // redirect to homepage if user typed whitespace only
        if ($value == "") {
            header('location: ' . URL . 'home/index');
        }
        
        // There are 2 possible queries that are performed here:
        // if category is 'All': SELECT ... WHERE (title LIKE ...)
        // else: SELECT ... WHERE category = $category AND (title LIKE ...)
        $category_statement = ($category == 'All') ? "" : "category = '$category' AND ";
        
        $sql = "SELECT id, title, price, category, description, keywords, image FROM item WHERE "
                . $category_statement
                . "(title LIKE '%$value%' "
                . "OR category LIKE '%$value%' "
                . "OR description LIKE '%$value%' "
                . "OR keywords LIKE '%$value%')";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }
    
    /**
     * Get amount of items in the database
     */
    public function getAmountOfItems()
    {
        $sql = "SELECT COUNT(id) AS amount_of_items FROM item";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch()->amount_of_items;
    }
    
    /**
     * Add item to the database without an image
     */
    public function addItem($title, $price, $category, $description, $keywords)
    {
        $sql = "INSERT INTO item (title, price, category, description, keywords) "
            . "VALUES (:title, :price, :category, :description, :keywords)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':price' => $price, ':category' => $category,
            ':description' => $description, ':keywords' => $keywords);
        $query->execute($parameters);
    }
    
    /**
     * Add item to the database with image
     */
    public function addItemWithImage($title, $price, $category, $description, $keywords, $image)
    {
        $sql = "INSERT INTO item (title, price, category, description, keywords, image) "
            . "VALUES (:title, :price, :category, :description, :keywords, :image)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':price' => $price, ':category' => $category,
            ':description' => $description, ':keywords' => $keywords, ':image' => $image);
        $query->execute($parameters);
    }
    
    /////////////////////////////////// USERS //////////////////////////////////
    
    /**
     * Get a user by their id from database
     * @param type $userId - the id of the registered user
     */
    public function getUser($userId)
    {
        $sql = "SELECT * FROM user WHERE id = '$userId'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch();
    }
    
    /**
     * Get all users from database
     */
    public function getAllUsers()
    {
        $sql = "SELECT id, student_id, username, email, image FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }
    
    /**
     * Add user to the database
     */
    public function addUser($student_id, $username, $email, $password)
    {
        $sql = "INSERT INTO user (student_id, username, email, password) "
            . "VALUES (:student_id, :username, :email, :password)";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id, ':username' => $username,
            ':email' => $email, ':password' => $password);
        $query->execute($parameters);
    }
    
    /**
     * Add user to the database with profile picture
     * @param type $image - profile picture
     */
    public function addUserWithImage($student_id, $username, $email, $password, $image)
    {
        $sql = "INSERT INTO user (student_id, username, email, password, image) "
            . "VALUES (:student_id, :username, :email, :password, :image)";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id, ':username' => $username,
            ':email' => $email, ':password' => $password, ':image' => $image);
        $query->execute($parameters);
    }
    
    ////////////////////////////////// ADMINS /////////////////////////////////
    
    /**
     * Get an admin
     * @param type $adminId - the id of the admin
     */
    public function getAdmin($adminId)
    {
        $sql = "SELECT * FROM admin WHERE id = '$adminId'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch();
    }
    
    /**
     * Get all admins from database
     */
    public function getAllAdmins()
    {
        $sql = "SELECT id, username, email, password, image FROM admin";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }
}
