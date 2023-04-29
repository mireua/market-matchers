<?php
namespace People;
use PDO;

class Account{
    public function viewAccount($email){
        $db = new \db;
        $conn = $db->connection();
    
        $query = $conn->prepare("SELECT * FROM accounts where email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $account = $query->fetch(PDO::FETCH_ASSOC);
        $numrows = $query->rowCount();
    
        if ($numrows == 0) {
            echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Account not found.</div>';
        } else {
            echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Account found:</div>';
            echo '<table>';
            echo '<tr><th>Account ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>';
            echo '<tr><td>'.$account['userID'].'</td><td>'.$account['fname'].'</td><td>'.$account['lname'].'</td><td>'.$account['email'].'</td></tr>';
            echo '</table>';
        }
    }
    
    public function updateAccount($id, $fname, $lname, $email){
        $db = new \db;
        $conn = $db->connection();

        $select = $conn->prepare("SELECT * FROM accounts WHERE userID ='$id'");
        $select->execute();
        $numrows = $select->rowCount();
    
        $query = $conn->prepare("UPDATE accounts SET fname = :fname, lname = :lname, email = :email WHERE userID = '$id'");
        $query->bindParam(':fname', $fname);
        $query->bindParam(':lname', $lname);
        $query->bindParam(':email', $email);
    
        if ($numrows > 0 && $query->execute()) {
            echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Information Updated!</div>';
        } else {
            echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Account not found.</div>';
        }
    }

    public function deleteAccount($id){
        $db = new \db;
        $conn = $db->connection();
        
        $query = $conn->prepare("DELETE FROM accounts WHERE userID = $id");

    
        $query2 = $conn->prepare("SELECT * FROM accounts WHERE userID = $id");
        $query2->execute();
        $numrows = $query2->rowCount();

        $admincheck = $conn->prepare("SELECT * FROM admin WHERE userID = $id");
        $admincheck->execute();
        $numrows2 = $query2->rowCount();


        // Check if there are rows in the 'accounts' table where the 'userID' matches the provided $id, and if the delete query was successful
        if ($numrows2 > 0){
            $adminquery = $conn->prepare("DELETE FROM admin WHERE userID = $id");
            $adminquery->execute();
                if ($numrows > 0 && $query->execute()) {
                    // If the delete query was successful and there are matching rows, print a success message
                    echo '<div style="background-color: #4CAF50; color: white; text-align: center; padding: 10px;">Account Deleted!</div>';
                } else {
                    // If the delete query failed or there are no matching rows, print an error message
                    echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Account not found.</div>';
                }
        }
    }
}
