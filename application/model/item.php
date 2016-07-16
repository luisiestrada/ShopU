<?php

class Item
{
    private $itemName;
    private $itemId;
    private $sellerId;
    private $price;
    private $category;
    private $details;
    private $itemImages;
    
    /**
     * Item class constructor
     * @param type $name - the name of the item
     * @param type $id - the id of the item
     * @param type $seller - the id of the registered user selling the item
     * @param type $pr - the price of the item
     * @param type $cat - the category the item belongs to
     * @param type $dt - the details of the item as specified by the seller
     * @param type $imgs - the images array of the images representing the item
     */
    public function __construct($name, $id, $seller, $pr, $cat, $dt, $imgs)
    {
        $itemName = $name;
        $itemId = $id;
        $sellerId = $seller;
        $price = $pr;
        $category = $cat;
        $details = $dt;
        $itemImages = $imgs;
    }
    
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
     * Get the item id
     */
    public function getItemId()
    {
        return $itemId;
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
     * Set one of the item's 3 images
     * @param type $index - the index of the image to add/replace
     * @param type $image - the image filename of the image to add/repace
     */
    public function setImage($index, $image)
    {
        $itemImages[$index] = $image;
    }
    
    /**
     * Get one of the item's 3 images
     * @param type $index - the index of the image to get
     */
    public function getImage($index)
    {
        return $itemImages[$index];
    }
    
    /**
     * Remove one of the item's 3 images
     * @param type $index - the index of the image to remove
     */
    public function removeImage($index)
    {
        $itemImages[$index] = "";
    }
}
