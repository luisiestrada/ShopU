<?php

class Item
{
    private $itemName;
    private $itemId;
    private $sellerId;
    private $price;
    private $details;
    private $category;
    private $itemPictures;
    
    /**
     * Set the item name
     * @param type $name - the name of the item
     */
    public function setItemName($name)
    {
        $itemName = $name;
    }
    
    /**
     * Get the item name
     */
    public function getItemName()
    {
        return $itemName;
    }
    
    /**
     * Set the item id
     * @param type $name - the name of the item
     */
    public function setItemId($id)
    {
        $itemId = $id;
    }
    
    /**
     * Get the item id
     */
    public function getItemId()
    {
        return $itemId;
    }
    
    /**
     * Set the item's seller id
     * @param type $id - the id of the registered user who is selling this item
     */
    public function setSellerId($id)
    {
        $sellerId = $id;
    }
    
    /**
     * Get the item's seller id
     */
    public function getSellerId()
    {
        return $sellerId;
    }
    
    /**
     * Set the item's price
     * @param type $pr - the price of the item in dollars
     */
    public function setPrice($pr)
    {
        $price = $pr;
    }
    
    /**
     * Get the item's price
     */
    public function getPrice()
    {
        return $price;
    }
    
    /**
     * Set the item details
     * @param type $dt - the item's details as specified by the seller
     */
    public function setDetails($dt)
    {
        $details = $dt;
    }
    
    /**
     * Get the item details
     */
    public function getDetails()
    {
        return $details;
    }
    
    /**
     * Set the item's category
     * @param type $cat - the category the item belongs in as specified by the seller
     */
    public function setCategory($cat)
    {
        $category = $cat;
    }
    
    /**
     * Get the item's category
     */
    public function getCategory()
    {
        return $category;
    }
    
    /**
     * Set one of the item's 3 pictures
     * @param type $index - the index of the picture to add/replace
     * @param type $image - the image of the picture to add/repace
     */
    public function setPicture($index, $image)
    {
        $itemPictures[$index] = $image;
    }
    
    /**
     * Get one of the item's 3 pictures
     * @param type $index - the index of the picture to get
     */
    public function getPicture($index)
    {
        return $itemPictures[$index];
    }
    
    /**
     * Remove one of the item's 3 pictures
     * @param type $index - the index of the picture to remove
     */
    public function removePicture($index)
    {
        $itemPictures[$index] = "";
    }
}
