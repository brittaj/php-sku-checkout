# php-sku-checkout
SKU Checkout


* Implemented the interface to checkout CheckoutInterface.php
* 
   Methods defined in interface
   - scanItems => to get the list of scanned items for billing
   - billItems => to get the total bill for the scanned items


* Implemented the class file for the interface SKU.php

  Methods implemented in SKU.php
    - scanItems => Identify and calculate the total quanity of the item and unit price of the item
    - billItems => Calculate the total price bad on the unit price and identify the discounted items based on quantity or product and calculate the discount price and apply the discount on the total price and return the final price.
