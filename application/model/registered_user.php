<?php

class RegisteredUser
{
    private $username;
    private $studentId;
    private $emailAddress;
    private $password;
    private $items;
    private $profileImage;
    
    /**
     * RegisteredUser class constructor
     * @param type $name - the username of the registered user
     * @param type $id - the id of the registered user
     * @param type $email - the email address of the registered user
     * @param type $pwd - the password of the registered user
     * @param type $itms - the items the registered user is selling (if any)
     * @param type $image - the profile image of the registered user (if any)
     */
    public function __construct($name, $id, $email, $pwd)
    {
        $username = $name;
        $studentId = $id;
        $emailAddress = $email;
        $password = $pwd;
        $items = $itms;
        $profileImage = $image;
    }

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
     * Set the profile image
     * @param type $image - the profile image filename uploaded by the registered user
     */
    public function setProfileImage($image)
    {
        $profileImage = $image;
    }
    
    /**
     * Get the profile image filename
     */
    public function getProfileImage()
    {
        return $profileImage;
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
