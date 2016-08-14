<?php

/**
 * class RegisteredUser interacts with the Database class
 */
class RegisteredUser
{
    private $db_model = null;
    
    public function __construct()
    {
        $this->db_model = new Database();
    }
    
    /**
     * Get a user by their id from database
     * @param type $userId - the id of the registered user
     */
    public function getUser($userId)
    {
        return $this->db_model->getUser($userId);
    }
    
    /**
     * Get all users from database
     */
    public function getAllUsers()
    {
        return $this->db_model->getAllUsers();
    }
    
    /**
     * Add user to the database
     */
    public function addUser($student_id, $username, $email, $password, $image)
    {
        $this->db_model->addUser($student_id, $username, $email, $password, $image);
    }
    
    /**
     * Returns whether or not user exists in the db with given username
     * @param type $username
     * @return type boolean
     */
    public function userExists($username)
    {
        return $this->db_model->userExists($username);
    }
    
    /**
     * Returns whether or not username/password match a user in the db
     * @param type $username - username given by user when signing in
     * @param type $password - password given by user when signing in
     * @return type boolean - success of matching user with supplied username/password
     */
    public function correctCredentials($username, $password)
    {
        return $this->db_model->correctCredentials($username, $password);
    }
    
    /**
     * Returns hashed password in database from a given username
     * @param type $username
     * @return - password from db
     */
    public function getPasswordFromUsername($username)
    {
        return $this->db_model->getPasswordFromUsername($username);
    }
    
    /**
     * Return a user from their username
     * @param type $username
     * @return type user PDO
     */
    public function getUserFromUsername($username)
    {
        return $this->db_model->getUserFromUsername($username);
    }
    
    /**
     * Return a username from a user id
     */
    public function getUsernameFromUserId($id)
    {
        return $this->db_model->getUsernameFromUserId($id);
    }

    /**
     * Return an image from a user id
     */
    public function getImageFromUserId($id)
    {
        return $this->db_model->getImageFromUserId($id);
    }
}
