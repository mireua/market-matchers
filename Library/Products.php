<?php
namespace Library;
use PDO;

class Products{

    public string $itemName;
    public string $itemPrice;
    public Store_Name $store_Name;
    public bool $isAddedTolist;
    public string $description;
    
    public function createItem($name, $price, $description, $store, $type, $image, $category) {
        $db = new \db;
        $conn = $db->connection();

        $query2 = $conn->prepare("SELECT * FROM products WHERE store = '$store' AND itemName = '$name'");
        $query2->execute();
        $numrows = $query2->rowCount();

        $categorysearch = $conn->prepare("SELECT * from categories WHERE categoryName = '$category'");
        $categorysearch->execute();
        $fetchcategory = $categorysearch->fetch();
        $categoryresult = $fetchcategory['categoryID'];

        
    if ($numrows == 0){
        if($type == "food"){
            
            $query = $conn->prepare("INSERT INTO products VALUES (null, '$name','$price', '$description', '$image', '$store','$categoryresult')");
            $query->execute();
            
            $select = $conn->prepare("SELECT * FROM products WHERE itemName = '$name' AND store = '$store'");
            $select->execute();
            $fetch = $select->fetch();
            $result = $fetch['itemID'];

            $foodquery = $conn->prepare("INSERT INTO food VALUES ($result)");
            if ($foodquery->execute()){
                echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Food Product Created!</div>';
            }
        } else {
            
            $query = $conn->prepare("INSERT INTO products VALUES (null, '$name','$price', '$description', '$image', '$store','$categoryresult')");
            $query->execute();
            
            $select = $conn->prepare("SELECT * FROM products WHERE itemName = '$name' AND store = '$store'");
            $select->execute();
            $fetch = $select->fetch();
            $result = $fetch['itemID'];

            $foodquery = $conn->prepare("INSERT INTO nonfood VALUES ($result)");
            if ($foodquery->execute()){
                echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Item Created!</div>';
            }
        } 
    } else {
        echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">An item with this name and store already exists!</div>';
    }
    }
    
    public function getItemNames($itemName){
        
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("SELECT * FROM products WHERE itemName = '$itemName'");
        $query->execute();
        $numrows = $query->rowCount();

        $result = $query->fetchAll();

        if ($numrows > 0) {
            echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Item(s) Found:</div>';
            echo '<table>';
            echo '<tr><th>Item ID</th><th>Item Name</th><th>Item Price</th><th>Description</th><th>Store</th></tr>';
            foreach ($result as $row) {
    
                echo '<tr><td>'.$row['itemID'].'</td><td>'.$row['itemName'].'</td><td>'.$row['itemPrice'].'</td><td>'.$row['description'].'</td><td>'.$row['store'].'</td></tr>';
            }
            echo '</table>';
            } else {
                echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">The item was not found!</div>';
            }
            $conn = null;
    }

    public function setItem($id, $name, $price, $desc){
        
        $db = new \db;
        $conn = $db->connection();

        $sql = $conn->prepare("UPDATE products SET itemName = '$name', itemPrice = '$price', description = '$desc' WHERE itemID = '$id' ");

        $select = $conn->prepare("SELECT * FROM products WHERE itemID = '$id'");
        $select->execute();
        $numrows = $select->rowCount();

        if ($numrows == 1 && $sql->execute()) {
            echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Item Updated!</div>';
        } else {
            echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">There was an error updating/finding your record!</div>';
        }
    }

     public function deleteItem($id){
    
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("DELETE FROM products WHERE itemID = '$id'");

    
        $query2 = $conn->prepare("SELECT * FROM products WHERE itemID = '$id'");
        $query2->execute();
        $numrows = $query2->rowCount();

        $foodcheck = $conn->prepare("SELECT * FROM food WHERE itemID = '$id'");
        $foodcheck->execute();
        $foodnumrows = $foodcheck->rowCount();

        $nonfoodcheck = $conn->prepare("SELECT * FROM nonfood WHERE itemID = '$id'");
        $nonfoodcheck->execute();
        $nonfoodnumrows = $nonfoodcheck->rowCount();


        
        if ($foodnumrows > 0){
            $foodquery = $conn->prepare("DELETE FROM food WHERE itemID = '$id'");
            $foodquery->execute();
                if ($numrows > 0 && $query->execute()) {
                    echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Food product was deleted!</div>';
                } else {
                    echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Item was not found.</div>';
                }
        } else {
            $nonfoodcheck = $conn->prepare("DELETE FROM nonfood WHERE itemID = '$id'");
            $nonfoodcheck->execute();
                if ($numrows > 0 && $query->execute()) {
                    echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Item was deleted!</div>';
                } else {
                    echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Item was not found.</div>';
                }
        }
     }

    public function getAllProducts(){
        $db = new \db;
        $conn = $db->connection();

        $query = $conn->prepare('SELECT * FROM categories');
        $query->execute();

        // Output HTML for each product
        while ($row = $query->fetch()) {
            $prodName = $row['categoryName'];
            $prodIMG = $row['categoryImage'];

            echo '<div class="product">';
            echo '<img src="' . $prodIMG .'" alt="' . $prodName . ' . "width=200" . "height= 200" ">';
            echo '<h2>' . $prodName . '</h2>';
            echo '<a href="comparepage.php?'.$prodName.'"><button>Compare</button></a> ';
            echo '</div>';
        }
    }

    public function getProductComparisons($product){
        $db = new \db;
        $conn = $db->connection();
    
        $catquery = $conn->prepare("SELECT categoryID FROM categories WHERE categoryName = '$product'");
        $catquery->execute();
        $result = $catquery->fetch();
        $id = $result['categoryID'];
    
        $query = $conn->prepare("SELECT * FROM products WHERE category = $id ORDER BY itemPrice");
        $query->execute();
        
    
        while($row = $query->fetch()){
            echo '<tr>';
                echo '<td>' .$row['itemName']. '</td>';
                echo '<td>€' .$row['itemPrice']. '</td>';
                echo '<td>' .$row['store']. '</td>';
                echo '<td>' .$row['description']. '</td>';
                echo '<td><a href="mylist.php?id=' . urlencode($row['itemID']). '"><button type="button" style="padding: 10px 20px; background-color: grey; color: white; border: none; border-radius: 5px; font-size: 16px;">Add to List</button></a></td>';
            echo '</tr>';
        }
    }
}