<?php

class Admin
{
    private $username;
    private $emailAddress;
    private $adminId;
    private $password;

    /**
     * Set the username
     * @param type $name - the username of the new admin
     */
    public function setUsername($name)
    {
        $username = $name;
    }
    
    /**
     * Get the username
     */
    public function getUsername()
    {
        return $username;
    }
    
    /**
     * Set the id
     * @param type $id - the id of the new admin
     */
    public function setId($id)
    {
        $adminId = $id;
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
