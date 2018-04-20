<?php

namespace App;
/**
 *add iterms in
 */
class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        $storedItem = [
            'qty' => 0,
            'price' => $item->price,
            'item' => $item, //very smart ! only store the same item object one time , only change the quantity.
        ];

        if ($this->items) { //have any iterms?
            if (array_key_exists($id, $this->items)) { //added-item already in cart
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $storedItem['qty'] * $item->price;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id) {
        $this->items[$id]['qty'] --;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty --;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
