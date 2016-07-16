<?php

class Admin
{
    private $username;
    private $adminId;
    private $emailAddress;
    private $password;

    /**
     * Admin class constructor
     * @param type $name - the username of the admin
     * @param type $id - the id of the admin
     * @param type $email - the email address of the admin
     * @param type $pwd - the password of the admin
     */
    public function __construct($name, $id, $email, $pwd)
    {
        $username = $name;
        $adminId = $id;
        $emailAddress = $email;
        $password = $pwd;
    }

    /**
     * Get the username
     */
    public function getUsername()
    {
        return $username;
    }

    /**
     * Get the id of the admin
     */
    public function getId()
    {
        return $adminId;
    }
    
    /**
     * Update email address
     * @param type $email - the new email address
     */
    public function updateEmail($email)
    {
        $emailAddress = $email;
    }
    
    /**
     * Get the email address of the admin
     */
    public function getEmailAddress()
    {
        return $emailAddress;
    }
    
    /**
     * Update password
     * @param type $pwd - the new password
     */
    public function updatePassword($pwd)
    {
        $password = $pwd;
    }
    
    /**
     * Get the password of the admin
     */
    public function getPassword()
    {
        return $password;
    }
    
    /**
     * Remove item from the database
     * @param type $itemId - the id of the item to remove
     */
    public function removeItem($itemId)
    {
        $this->db_model->removeItem($itemId)
    }
    
    /**
     * Remove registered user from the database
     * @param type $userId - the id of the registered user to remove
     */
    public function removeRegUser($userId)
    {
        $this->db_model->removeRegUser($userId)
    }
}
