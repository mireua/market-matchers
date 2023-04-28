<?php
use Library\Products; // Importing the Account class from the People namespace

include "products.php"; // Including the database connection file
include "Library/Products.php"; // Including the Products class file

$product = new Products(); // Creating an instance of the Account class

// If the 'name' form field is submitted, get the first names of all accounts that match the provided name
if (isset($_POST['itemID']))
{
    $itemName = $_POST['itemID'];
    $product->getItemName($itemName);
}

if (isset($_POST['store name']))
{
    $store = $_POST['store name'];
    $product->getStoreName($store);
}


// If the 'namepre' and 'nameafter' form fields are submitted, update the first name of all accounts that match the provided 'namepre'
if (isset($_POST['namepre']) && isset($_POST['nameafter']))
{
    $namepre = $_POST['namepre'];
    $nameafter = $_POST['nameafter'];
    $product->setItemName($namepre, $nameafter);
}

// If the 'delete' form field is submitted, delete the account that matches the provided ID
if(isset($_POST['delete']))
{
    $id = $_POST['delete'];
    $product->deleteAccount((int)$id);
}

?>