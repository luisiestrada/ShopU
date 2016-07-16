<?php

class RegisteredUser
{
    private $username;
    private $emailAddress;
    private $studentId;
    private $profilePic;
    private $password;
    private $items;

    /**
     * Set the username
     * @param type $name - the username of the new registered user
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
     * @param type $id - the id of the new registered user (a valid SFSU ID)
     */
    public function setId($id)
    {
        $studentId = $id;
    }
    
    /**
     * Get the id of the registered user
     */
    public function getId()
    {
        return $studentId;
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
     * Get the email address of the registered user
     */
    public function getEmail()
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
     * Get the password of the registered user
     */
    public function getPassword()
    {
        return $password;
    }
    
    /**
     * Set the profile picture
     * @param type $image - the profile picture filename uploaded by the registered user
     */
    public function setProfilePic($image)
    {
        $profilePic = $image;
    }
    
    /**
     * Get the profile picture filename
     */
    public function getProfilePic()
    {
        return $profilePic;
    }
    
    /**
     * Add an item to registered user’s array of items sell
     * @param type $itemId - the id of the item on the seller's list
     */
    public function addItemIdToSell($itemId)
    {
        array_push($items, $itemId);
    }
    
    /**
     * Remove an item from registered user's array of items to sell
     * @param type $itemId - the id of the item on the seller's list
     */
    public function removeItemIdToSell($itemId)
    {
        $index;                 // Index of item to be removed
        $length = count($items);
        
        // Find the item to remove
        for($i = 0; $i < $length; $i++) 
        {
            if ($items[$i] == $itemId)
            {
                $index = $i;
                break;
            }
        }
        
        // Remove the item and shift the array
        array_splice($items, $index, 1);
    }
    
    /**
     * Get an item from registered user's array of items to sell, based on index
     * @param type $index - the index of the items array holding an item id
     */
    public function getItemIdToSell($index)
    {
        return items[$index];
    }
}
