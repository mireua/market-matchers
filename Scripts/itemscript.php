<?php

use Library\Food;

include "db.php";
require '../Library/Food.php';

$food = new Food();

// Get the variables from the HTML form submitted via POST method
$itemName = $_REQUEST['item_name'];
$itemPrice = $_REQUEST['item_price'];
$description = $_REQUEST['description'];
$macros = $_REQUEST['macros'];
$image = $_REQUEST['image'];

$food->createFood($itemName,$itemPrice,$description,$macros,$image)


?>