<?php

class shoppingList{
    public int $listQuantity;
    public float $totalCost;

    public function addtoList(){
        $cid = urldecode($_GET['id']);
    
        array_push($_SESSION["list"],$cid);
    }

    public function getProductComparisons(){
        $listnumber = count($_SESSION['list']);
        var_dump($_SESSION['list']);
        /* for ($i = 0; $i < $listnumber; $i++){

        }  */  
    }
}