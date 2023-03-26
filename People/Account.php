<?php
namespace People;

class Account extends \db{

    public function getFname(string $name): void
    {
        $sql = "SELECT * FROM accounts WHERE fname = '$name'";
        $result = $this->connection()->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo $row['fname']. " " .$row['lname']. " " . $row['email']. " ". "<br>";
            }
        } else {
            echo $name . " was not found!";
        }
    }

    public function setFname(string $fname, string $change): void
    {
        $sql = "UPDATE accounts SET fname = '$change' WHERE fname = '$fname' ";
        $select = "SELECT * FROM accounts WHERE fname = '$fname'";
        $conn = $this->connection();
         
        if ($conn->query($select)->num_rows > 0 && $conn->query($sql)) {
            echo "Record for first name changed from '$fname' to '$change' updated successfully!";
        } else {
            echo "There was an error updating a record!";
        }
         
    }

    public function deleteAccount(int $id): void
    {
        $sql = "DELETE FROM accounts WHERE userID = $id";
        $select = "SELECT * FROM accounts WHERE userID = $id";
        $conn = $this->connection();

        if ($conn->query($select)->num_rows > 0 && $conn->query($sql)) {
            echo "The row entry has been deleted successfully!";
        } else {
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
