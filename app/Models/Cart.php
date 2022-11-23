<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    //Function which allows creation of new item
    public function add($menuItem, $id) {
        //Create an array of the item i want to store
        $storedItem = ['qty' => 0, 'price' => $menuItem->price, 'menuItem' => $menuItem];

        if($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        
        $storedItem['qty']++;
        $storedItem['price'] = $menuItem->price * $storedItem['qty'];
        
        $this->items[$id] = $storedItem; 
        $this->totalQty++;
        $this->totalPrice += $menuItem->price;
    }
}