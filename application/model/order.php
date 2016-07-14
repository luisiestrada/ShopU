<?php

class Order
{
    public $buyerId;
    public $sellerId;
    public $itemId;
    public $totalPrice;
    public $orderDate;
    public $details;

    /**
     * Set the buyer for the order
     * @param type $buyer - the id of the registered user who is buyer
     */
    public function setBuyerId($buyer)
    {
        $buyerId = $buyer;
    }
    
    /**
     * Get the buyer for the order
     */
    public function getBuyerId()
    {
        return $buyerId;
    }
    
    /**
     * Set the seller for the order
     * @param type $seller - the id of the registered user who is seller
     */
    public function setSellerId($seller)
    {
        $sellerId = $seller;
    }
    
    /**
     * Get the seller for the order
     */
    public function getSellerId()
    {
        return $sellerId;
    }
    
    /**
     * Set the item for the order
     * @param type $item - the id of the item to be sold
     */
    public function setItemId($item)
    {
        $itemId = $item;
    }
    
    /**
     * Get the item for the order
     */
    public function getItemId()
    {
        return $itemId;
    }
    
    /**
     * Set the price for the order
     * @param type $price - the total dollar amount of the order
     */
    public function setPrice($price)
    {
        $totalPrice = $price;
    }
    
    /**
     * Get the price for the order
     */
    public function getPrice()
    {
        return $totalPrice;
    }
    
    /**
     * Set the date for the order
     * @param type $date - the date of the order
     */
    public function setDate($date)
    {
        $orderDate = $date;
    }
    
    /**
     * Get the date for the order
     */
    public function getDate()
    {
        return $orderDate;
    }
}
