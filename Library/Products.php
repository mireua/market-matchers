<?php
namespace Library;

 abstract class Products extends \products {

     public function getItemName(string $itemName): void
     {
         // Construct a SQL query to retrieve all rows in the 'products' table where the 'itemName' column matches the provided name
         $sql = "SELECT * FROM products WHERE itemName = '$itemName'";

         // Execute the SQL query using the established database connection
         $result = $this->connection()->query($sql);

         // Check if any rows were returned from the SQL query
         if ($result->num_rows > 0) {
             // If there are rows, loop through each row and print out the first name, last name, and email address
             while($row = $result->fetch_assoc()) {
                 echo$row['itemID']. " " .$row['itemName']. " " .$row['itemPrice']. " " . $row['description']. " ". "<br>";
             }
         } else {
             // If no rows were returned from the SQL query, print out a message indicating that the provided name was not found
             echo $itemName . " was not found!";
         }
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

     public function deleteAccount(int $id): void
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


     public string $itemName;
    public string $itemPrice;
    public Store_Name $store_Name;
    public bool $isAddedTolist;
    public string $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */

   /* public function getItemName(): string
    {
        return $this->itemName;
    }


    /**
     * @param string $itemName
     /
    public function setItemName(string $itemName): void
    {
        $this->itemName = $itemName;
    }
    */

    /**
     * @return string
     */
    public function getItemPrice(): string
    {
        return $this->itemPrice;
    }

    /**
     * @param string $itemPrice
     */
    public function setItemPrice(string $itemPrice): void
    {
        $this->itemPrice = $itemPrice;
    }

    /**
     * @return Store_Name
     */
    public function getStoreName(): Store_Name
    {
        return $this->store_Name;
    }

    /**
     * @param Store_Name $store_Name
     */
    public function setStoreName(Store_Name $store_Name): void
    {
        $this->store_Name = $store_Name;
    }

    /**
     * @return bool
     */
    public function isAddedTolist(): bool
    {
        return $this->isAddedTolist;
    }

    /**
     * @param bool $isAddedTolist
     */
    public function setIsAddedTolist(bool $isAddedTolist): void
    {
        $this->isAddedTolist = $isAddedTolist;
    }

    public function __toString(): string
    {
        return "Item Name: " . $this->itemName . " Item Price: " . " Store Location: " . $this->store_Name;
    }


}