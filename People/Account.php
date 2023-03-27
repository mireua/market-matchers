<?php
namespace People;

class Account extends \db{

    public function getFname(string $name): void
    {
    // Construct a SQL query to retrieve all rows in the 'accounts' table where the 'fname' column matches the provided name
    $sql = "SELECT * FROM accounts WHERE fname = '$name'";

    // Execute the SQL query using the established database connection
    $result = $this->connection()->query($sql);

    // Check if any rows were returned from the SQL query
    if ($result->num_rows > 0) {
        // If there are rows, loop through each row and print out the first name, last name, and email address
        while($row = $result->fetch_assoc()) {
        echo $row['fname']. " " .$row['lname']. " " . $row['email']. " ". "<br>";
        }
        } else {
        // If no rows were returned from the SQL query, print out a message indicating that the provided name was not found
            echo $name . " was not found!";
        }
    }

    public function setFname(string $fname, string $change): void
    {
    // Construct a SQL query to update the 'fname' column in the 'accounts' table where the 'fname' matches the provided $fname
    $sql = "UPDATE accounts SET fname = '$change' WHERE fname = '$fname' ";

    // Construct a SQL query to select all rows in the 'accounts' table where the 'fname' matches the provided $fname
    $select = "SELECT * FROM accounts WHERE fname = '$fname'";

    // Get the database connection object
    $conn = $this->connection();
     
    // Check if there are rows in the 'accounts' table where the 'fname' matches the provided $fname, and if the update query was successful
    if ($conn->query($select)->num_rows > 0 && $conn->query($sql)) {
        // If the update query was successful and there are matching rows, print a success message
        echo "Record for first name changed from '$fname' to '$change' updated successfully!";
    } else {
        // If the update query failed or there are no matching rows, print an error message
        echo "There was an error updating a record!";
    }
    }

    public function deleteAccount(int $id): void
    {
        // Construct a SQL query to delete the row in the 'accounts' table where the 'userID' column matches the provided $id
        $sql = "DELETE FROM accounts WHERE userID = $id";

        // Construct a SQL query to select all rows in the 'accounts' table where the 'userID' column matches the provided $id
        $select = "SELECT * FROM accounts WHERE userID = $id";

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

    /**
     * @return string
     */
    public function getLname(): string
    {
        return $this->lname;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @param string $lname
     */
    public function setLname(string $lname): void
    {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function __toString()
    {
        return "Name = " . $this->fname . " " . $this->lname . " Email: " . $this->email;
    }


}
