<?php
/*
Author: Britta
Name: Checkout.php
Feature: Checkout Interface methods defined for SKU
Date: 31 Jan 2022
*/
interface InterfaceCheckout{
    // scan the items for the checkout
    public function scanItems(string $product);

    // Calculate the total bill for the items
    public function billItems(): float;

}
?>