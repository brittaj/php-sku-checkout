<?php
/*
Author: Britta Alex
FileName: SKU.php
Feature: Implementation of the interface
Date: 31 Jan 2022
*/

class SKU implements InterfaceCheckout{

    //define products
    protected $products = [
         'A' => 0,
         'B' => 0,
         'C' => 0,
         'D' => 0,
         'E' => 0
    ];
    //define unit price
     protected $products_unit_price = [
         'A' => 50,
         'B' => 30,
         'C' => 20,
         'D' => 15,
         'E' => 5
     ];
     //define discounts
     protected $discounted_price = [
         'A'=>[
             'quantity' => 3,
             'price'=> 130,
             'product'=> ''
         ],
         'B' => [
             'quantity' => 2,
              'price' => 45,
              'product'=> ''
         ],
         'C' => [
            'quantity' => 2,
             'price' => 38,
             'product'=> ''
         ],
        'D' => [
            'offer' =>['quantity' => 0,
             'price' => 5,
             'product' => 'A']
        ]
    ];

    protected $bill = [];
    //function for scanning the items during checkout
    public function scanItems( string $item){

        //return error if the item doesn't exist in the pre-defined array
        if(!array_key_exists($item,$products)){
            return "Item not found. Please contact the sales person.";
        }
        //if found, add the item and set the no. of item and its unit price 
        $this->products[$item] = $this->products[$item] + 1;
        
        $this->bill[] = [
            'product' => $products,
            'price' => $this->products_unit_price[$item]
        ];
    }

    // function for getting the total bill for the items
    public function billItems(): float {

        //set the total price based on the unit price
        $totalPrice = array_reduce($this->bill,billTotalForUnitPrice($total,$products));
        $totalDiscount = 0;
        //calculate the discounted price
        foreach($this->discounted_price as $item => $discount){
            //if the discount is associated with any product
            if(array_key_exists('product',$discount) && $discount['product'] != "" ){
                //check if combo product is in the product item list
                if(array_key_exists($discount['product'],$this->products)){
                    $totalDiscount = $this->products[$discount['product']] * $discount['price'];
                }
            }else{
                //if discount is associated with the quantity
                if($this->products[$tem] >=  $discount['quantity']){
                    $totQtty = floor($this->products[$tem]/$discount['quantity']);
                    $totalDiscount = $totQtty * $discount['price'];
                }
            }
           
        }
        //calculate and return the actual amount
        return StotalPrice -  $totalDiscount;
    }
    // function to calculate the total price in the array_reduce of billItems(): float
    public function billTotalForUnitPrice($tot, array $items){

        $tot = 0;
        $tot += $items['price'];
        return $tot;
    }

}
?>