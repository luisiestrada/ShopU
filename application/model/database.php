<?php

/**
 * class Database is the only class that performs queries to the db
 */
class Database
{   
    /**
     * @var null PDO Database Connection
     */
    public $db = null;
    
    /**
     * Connect to the database
     */
    function __construct()
    {
        try {
            $this->openDatabaseConnection();
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }
    
    /////////////////////////////////// ITEMS //////////////////////////////////
    
    /**
     * Get an item by its id
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
     * Get all items from database (no category)
     */
    public function getAllItems($items_per_page, $range)
    {
        $sql = "SELECT * FROM item LIMIT :limit, :items_per_page";
        $query = $this->db->prepare($sql);
        $query->bindParam(':items_per_page', $items_per_page, PDO::PARAM_INT);
        $query->bindParam(':limit', $range, PDO::PARAM_INT);
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
     * Get all items containing a certain keyword
     * @param type $value - the keyword user searched for
     */
    public function getItemsContaining($value, $category, $items_per_page, $range)
    {
        // There are 2 possible queries that are performed here:
        // if category is 'All': SELECT ... WHERE (title LIKE ...)
        // else: SELECT ... WHERE category = $category AND (title LIKE ...)
        $category_statement = ($category == 'All') ? "" : "category = '$category' AND ";

        // Check if $value is a category; if so, convert it to its categoryId
        // for proper search results
        // First get the categories from the db...
        $sql = "SELECT id, category FROM categories";
        $query = $this->db->prepare($sql);
        $query->execute();
        $categories = $query->fetchAll();
        $catId = -1;

        // ...Then check each category against the search value. 
        // If a match, update $catId for search
        foreach ($categories as $theCat) {
            if ((strtolower($theCat->category) == strtolower($value))
                    || (strtolower($theCat->category) == strtolower($value) . "s")) {
                $catId = $theCat->id;
            }
        }

        // If search value contains apostrophes, add one to them so SQL can read it properly ('')
        $argLength = strlen($value);
        for ($i = 0; $i < $argLength; $i++) {
            if (substr($value, $i, 1) == "'") {
                $value = substr($value, 0, $i+1) . "'" .
                         substr($value, $i+1, $argLength-$i+1);
                // Increment the length and index to account for new apostrophe
                $argLength++;
                $i++;
            }
        }
        
        $sql = "SELECT * FROM item WHERE "
                . $category_statement
                . "(title LIKE '%$value%' "
                . "OR category = " . $catId . " "
                . "OR description LIKE '%$value%' "
                . "OR keywords LIKE '%$value%') "
                . "LIMIT :limit, :items_per_page";
        $query = $this->db->prepare($sql);
        $query->bindParam(':items_per_page', $items_per_page, PDO::PARAM_INT);
        $query->bindParam(':limit', $range, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetchAll();
    }
    
    /**
     * Get amount of items containing a certain keyword
     * @param type $value - the keyword user searched for
     */
    public function getAmountOfItemsContaining($value, $category)
    {
        // There are 2 possible queries that are performed here:
        // if category is 'All': SELECT ... WHERE (title LIKE ...)
        // else: SELECT ... WHERE category = $category AND (title LIKE ...)
        $category_statement = ($category == 'All') ? "" : "category = '$category' AND ";
        
        // Check if $value is a category; if so, convert it to its categoryId
        // for proper search results
        // First get the categories from the db...
        $sql = "SELECT id, category FROM categories";
        $query = $this->db->prepare($sql);
        $query->execute();
        $categories = $query->fetchAll();
        $catId = -1;
        
        // ...Then check each category against the search value. 
        // If a match, update $catId for search
        foreach ($categories as $theCat) {
            if ((strtolower($theCat->category) == strtolower($value))
                    || (strtolower($theCat->category) == strtolower($value) . "s")) {
                $catId = $theCat->id;
            }
        }
        
        // If search value contains apostrophes, add one to them so SQL can read it properly ('')
        $argLength = strlen($value);
        for ($i = 0; $i < $argLength; $i++) {
            if (substr($value, $i, 1) == "'") {
                $value = substr($value, 0, $i+1) . "'" .
                         substr($value, $i+1, $argLength-$i+1);
                // Increment the length and index to account for new apostrophe
                $argLength++;
                $i++;
            }
        }
        
        $sql = "SELECT COUNT(id) AS amount_of_items FROM item WHERE "
                . $category_statement
                . "(title LIKE '%$value%' "
                . "OR category = $catId "
                . "OR description LIKE '%$value%' "
                . "OR keywords LIKE '%$value%')";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch()->amount_of_items;
    }
    
    /**
     * Get all items from database in a certain category
     */
    public function getAllItemsFromCategory($category, $items_per_page, $range)
    {
        if ($category == 'All') {
            $sql = "SELECT * FROM item LIMIT :limit, :items_per_page";
        } else {
            $sql = "SELECT * FROM item WHERE category = '$category' LIMIT :limit, :items_per_page";
        }
        $query = $this->db->prepare($sql);
        $query->bindParam(':items_per_page', $items_per_page, PDO::PARAM_INT);
        $query->bindParam(':limit', $range, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
    
    /**
     * Get amount of items from database in a certain category
     */
    public function getAmountOfItemsFromCategory($category)
    {
        if ($category == 'All') {
            $sql = "SELECT COUNT(id) as amount_of_items FROM item";
        } else {
            $sql = "SELECT COUNT(id) as amount_of_items FROM item WHERE category = '$category'";
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch()->amount_of_items;
    }
    
    /**
     * Add item to the database
     */
    public function addItem($title, $seller_id, $price, $category, $description, $keywords, $image)
    {
        $sql = "INSERT INTO item (title, seller_id, price, category, description, keywords, image) "
            . "VALUES (:title, :seller_id, :price, :category, :description, :keywords, :image)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':seller_id' => $seller_id, ':price' => $price,
            ':category' => $category, ':description' => $description, ':keywords' => $keywords,
            ':image' => $image);
        $query->execute($parameters);
    }
    
    //////////////////////////////// CATEGORIES ////////////////////////////////
    
    /**
     * Get all categories from database
     */
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
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
        $sql = "SELECT * FROM categories WHERE id = '$categoryId'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch()->category;
    }

    /**
     * Get a category's key from the database; 
     * returns -1 if category not found
     * @param type $category - the text category whose key is to be returned
     */
    public function getCategoryKey($category)
    {
        $key = -1; // The resulting key to return (or -1 if not found)
        
        $sql = "SELECT * FROM categories";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        $categories = $query->fetchAll();
        
        foreach ($categories as $theCat) {
            if ($theCat->category == $category) {
                $key = $theCat->id;
                break;
            }
        }
        
        return $key;
    }
    
    /////////////////////////////////// USERS //////////////////////////////////
    
    /**
     * Get a user by their id from database
     * @param type $userId - the id of the registered user
     */
    public function getUser($userId)
    {
        $sql = "SELECT * FROM users WHERE id = '$userId'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch();
    }
    
    /**
     * Get all users from database
     */
    public function getAllUsers()
    {
        $sql = "SELECT id, student_id, username, email, image FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }
    
    /**
     * Add user to the database
     */
    public function addUser($student_id, $username, $email, $password, $image)
    {
        $sql = "INSERT INTO users (student_id, username, email, password, image) "
            . "VALUES (:student_id, :username, :email, :password, :image)";
        $query = $this->db->prepare($sql);
        $parameters = array(':student_id' => $student_id, ':username' => $username,
            ':email' => $email, ':password' => $password, ':image' => $image);
        $query->execute($parameters);
    }
    
    /**
     * Returns whether or not user exists in the db with given username
     * @param type $username
     * @return type boolean
     */
    public function userExists($username)
    {
        $sql = "SELECT COUNT(id) AS num_users FROM users WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        // since usernames are unique in the db, there can only be
        // either 0 or 1 users with a given username
        return ($query->fetch()->num_users == 1) ? true : false;
    }
    
    /**
     * Returns whether or not username/password match a user in the db
     * @param type $username - username given by user when signing in
     * @param type $password - password given by user when signing in
     * @return type boolean - success of matching user with supplied username/password
     */
    public function correctCredentials($username, $password)
    {
        if (Database::userExists($username)) {
            $hashed_password = Database::getPasswordFromUsername($username);
            return password_verify($password, $hashed_password);
        } else {
            return false;
        }
    }
    
    /**
     * Returns hashed password in database from a given username
     * @param type $username
     * @return - password from db
     */
    public function getPasswordFromUsername($username)
    {
        $sql = "SELECT password AS pass FROM users WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->pass;
    }
    
    /**
     * Return a user from their username
     * @param type $username
     * @return type user PDO
     */
    public function getUserFromUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    
    /**
     * Return a username from a user id
     */
    public function getUsernameFromUserId($id)
    {
        $sql = "SELECT username FROM users WHERE users.id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->username;
    }

    /**
     * Return an image from a user id
     */
    public function getImageFromUserId($id)
    {
        $sql = "SELECT image FROM users WHERE users.id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->image;
    }
}
