<?php
namespace People;
use PDO;

class Account extends \db{

    public function getFname(string $name): void
    {
    
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("SELECT * FROM accounts WHERE fname = '$name'");
        $query->execute();
        $numrows = $query->rowCount();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
            
        // Check if any rows were returned from the SQL query
        if ($numrows > 0) {
            // If there are rows, loop through each row and print out the first name, last name, and email address
            foreach ($result as $row) {
                echo $row['fname']. " " .$row['lname']. " " . $row['email']. " ". "<br>";
            }
            } else {
            // If no rows were returned from the SQL query, print out a message indicating that the provided name was not found
                echo $name . " was not found!";
            }
            $conn = null;
    }

    public function setFname(string $fname, string $change): void
    {
        $db = new \db;
        $conn = $db->connection();

        $query2 = $conn->prepare("SELECT * FROM accounts WHERE fname = '$fname'");
        $query2->execute();
        $numrows = $query2->rowCount();

        $query = $conn->prepare("UPDATE accounts SET fname = '$change' WHERE fname = '$fname'");
     
        // Check if there are rows in the 'accounts' table where the 'fname' matches the provided $fname, and if the update query was successful
        if ($numrows > 0 && $query->execute()) {
            // If the update query was successful and there are matching rows, print a success message
            echo "Record for first name changed from '$fname' to '$change' updated successfully!";
        } else {
            // If the update query failed or there are no matching rows, print an error message
            echo "There was an error updating a record!";
        }
        $conn = null;
    }

    public function deleteAccount(int $id): void
    {
        $db = new \db;
        $conn = $db->connection();
        // Construct a SQL query to delete the row in the 'accounts' table where the 'userID' column matches the provided $id
        $query = $conn->prepare("DELETE FROM accounts WHERE userID = $id");

        // Construct a SQL query to select all rows in the 'accounts' table where the 'userID' column matches the provided $id
        $query2 = $conn->prepare("SELECT * FROM accounts WHERE userID = $id");
        $query2->execute();
        $numrows = $query2->rowCount();


        // Check if there are rows in the 'accounts' table where the 'userID' matches the provided $id, and if the delete query was successful
        if ($numrows > 0 && $query->execute()) {
            // If the delete query was successful and there are matching rows, print a success message
            echo "The row entry has been deleted successfully!";
        } else {
            // If the delete query failed or there are no matching rows, print an error message
            echo "There was an error deleting your record!";
        }
    }


    public function __toString()
    {
        return "Name = " . $this->fname . " " . $this->lname . " Email: " . $this->email;
    }


}
