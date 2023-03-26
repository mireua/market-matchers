<?php
namespace People;

class Account extends \db{

    /**
     * @return string
     */
    public function getFname(string $name): void
    {
        $sql = "SELECT * FROM accounts WHERE fname = '$name'";
        $result = $this->connection()->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo $row['fname']. " " .$row['lname']. " " . $row['email']. " ". "<br>";
            }
          } else {
            echo $name . " was not found!";
        }
    }

    /**
     * @param string $fname
     */
    public function setFname(string $fname, string $change): void
    {
        $sql = "UPDATE accounts set fname = '$change' WHERE fname = '$fname' ";
        $conn = $this->connection();
         
        if(mysqli_query($conn, $sql)){
            echo "First name changed successfully!";
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
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
