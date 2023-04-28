<?php

namespace Library;
use PDO;

class Food
{
    //info as in macros/calories
    public string $macros;

    public function createFood($name, $price, $description, $macros) {
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("INSERT INTO products VALUES (null, '$name','$price', '$description')");


        $query2 = $conn->prepare("SELECT * FROM products WHERE itemName = '$name'");
        $query2->execute();
        $numrows = $query2->rowCount();

        if ($numrows == 0){
            
            $query->execute();

            $query3 = $conn->prepare("SELECT itemID FROM products WHERE itemName = '$name'");
            $query3->execute();
            $result = $query3->fetchColumn();

            $query4 = $conn->prepare("INSERT INTO food VALUES ('$result', '$macros')");
            $query4->execute();

            echo "You have added your FOOD item!";

        } else if ($numrows > 0){
            echo "There is an existing item with this name already!";
        } else {
            echo "There was error creating your item!";
        }
    }

    public function __toString(): string
    {
        return " Macro Information: " . $this->macros;
    }


}