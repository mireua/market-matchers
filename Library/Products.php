<?php
namespace Library;
use PDO;

class Products{

    public string $itemName;
    public string $itemPrice;
    public Store_Name $store_Name;
    public bool $isAddedTolist;
    public string $description;
    
    public function createItem($name, $price, $description) {
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("INSERT INTO products VALUES (null, '$name','$price', '$description')");

        $query2 = $conn->prepare("SELECT * FROM products WHERE itemName = '$name'");
        $query2->execute();
        $numrows = $query2->rowCount();

        if ($query->execute() && $numrows == 0){
            echo "Your item has beeen created.";
        } else if ($query->execute() && $numrows > 0){
            echo "There is an existing item with this name already!";
        } else {
            echo "There was error creating your item!";
        }
    }
    
    public function getItemName(string $itemName): void
    {
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("SELECT * FROM products WHERE itemName = '$itemName'");
        $query->execute();
        $numrows = $query->rowCount();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($numrows > 0) {
            foreach ($result as $row) {
                echo $row['fname']. " " .$row['lname']. " " . $row['email']. " ". "<br>";
            }
            } else {
            echo $itemName . " was not found!";
            }
            $conn = null;
    }

     public function setItemName(string $itemName, string $change): void
     {
         // Construct a SQL query to update the 'fname' column in the 'accounts' table where the 'fname' matches the provided $fname
         $sql = "UPDATE products SET itemName = '$change' WHERE itemName = '$itemName' ";

         // Construct a SQL query to select all rows in the 'accounts' table where the 'fname' matches the provided $fname
         $select = "SELECT * FROM products WHERE itemName = '$itemName'";

         // Get the database connection object
         $conn = $this->connection();

         // Check if there are rows in the 'accounts' table where the 'fname' matches the provided $fname, and if the update query was successful
         if ($conn->query($select)->num_rows > 0 && $conn->query($sql)) {
             // If the update query was successful and there are matching rows, print a success message
             echo "Record for first name changed from '$itemName' to '$change' updated successfully!";
         } else {
             // If the update query failed or there are no matching rows, print an error message
             echo "There was an error updating a record!";
         }
     }

     public function deleteItem(int $id): void
     {
         // Construct a SQL query to delete the row in the 'accounts' table where the 'userID' column matches the provided $id
         $sql = "DELETE FROM products WHERE itemID = $id";

         // Construct a SQL query to select all rows in the 'accounts' table where the 'userID' column matches the provided $id
         $select = "SELECT * FROM products WHERE itemID = $id";

         // Get the database connection object
         $conn = $this->connection();

         // Check if there are rows in the 'accounts' table where the 'userID' matches the provided $id, and if the delete query was successful
         if ($conn->query($select)->num_rows > 0 && $conn->query($sql)) {
             // If the delete query was successful and there are matching rows, print a success message
             echo "The row entry has been deleted successfully!";
         } else {
             // If the delete query failed or there are no matching rows, print an error message
             echo "There was an error deleting your record!";
         }
     }

     public function getAllProducts(){
        $db = new \db;
        $conn = $db->connection();

        $query = $conn->prepare('SELECT * FROM products');
        $query->execute();

        // Output HTML for each product
        while ($row = $query->fetch()) {
            $prodName = $row['itemName'];
            $prodPrice = $row['itemPrice'];
            $prodIMG = $row['image'];

            echo '<div class="product">';
            echo '<img src="' . $prodIMG .'" alt="' . $prodName . ' . "width=200" . "height= 200" ">';
            echo '<h2>' . $prodName . '</h2>';
            echo '<button>Compare</button>';
            echo '</div>';
        }
    }

    public function __toString(): string
    {
        return "Item Name: " . $this->itemName . " Item Price: " . " Store Location: " . $this->store_Name;
    }


}