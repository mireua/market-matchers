<?php

namespace Library;
class shoppingList{
    public int $listQuantity;
    public float $totalCost;

    public function addtoList(){
        session_start();
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);
        if(urldecode($_GET['id']) == null){

        } else {
            $cid = urldecode($_GET['id']);
            if(isset($_SESSION["list"])){
                array_push($_SESSION["list"],$cid);
            } else {
                $_SESSION["list"] = array($cid);
            }
        }    
    }

    public function getProductComparisons(){
        $listcount = count($_SESSION['list']);
        $list = $_SESSION['list'];

        $db = new \db;
        $conn = $db->connection();
        
        if($listcount == 0){
            echo '<div style="background-color: darkgray; color: white; text-align: center; padding: 10px;">You do not have any items in your list.</div>';
        } else {
            for ($i = 0; $i < $listcount; $i++){
                $query = $conn->prepare("SELECT * FROM products WHERE itemID = $list[$i]");
                $query-> execute();
                $result = $query->fetch();

                echo '<tr>';
                    echo '<td>' .$result['itemName']. '</td>';
                    echo '<td>' .$result['store']. '</td>';
                    echo '<td>€' .$result['itemPrice']. '0</td>';
                echo '</tr>';
                
            }
        }    
    }

}